# includes/lms/competency_tests.php

> PHP - 461 lines

LMS competency tests (3.0.0) - the rules, in one place.

A TEST describes a role and a list of skills, each with a difficulty, a
question count and a format. Its questions come from the QUESTION BANK
(lms_ct_questions): approved questions are reused first, and the AI is asked
only for the shortfall. Everything the AI writes lands as a DRAFT, and a test
cannot be sent while it holds a draft - a wrong "correct" answer is caught by
a person, not by a candidate.

A SITTING is one candidate's attempt. When it is created, the test is frozen
into snapshot_json - the questions, their answers in a shuffled order, and
the marks - so editing or hiding a bank question later never changes anybody's
result, and two candidates sent the same test are scored on identical papers.

TWO FORMATS
  choice - four options, one right (marks 1, the rest 0).
  graded - the ITIL-style scenario question: four defensible answers worth,
           by default, 5 / 3 / 1 / 0. The candidate picks ONE; they never see
           the marks.
Every question weighs the same in a result: each scores marks-chosen divided
by the best marks on offer, so a graded question cannot outweigh a choice one.

THE LINK is the credential (like a CSAT survey). Only its SHA-256 hash is
stored; the raw link exists once, when it is made. Lost it? Make a new one -
which works only until the candidate starts.

TIME is enforced by the server: the deadline is started + limit, answers saved
after it (plus a short grace for the last click in flight) are refused, and a
sitting left open past it is closed as "time up" with what was saved.

## Functions

| Function | Line | What it does |
|---|--:|---|
| [lmsCtSettings()](/code/functions/lmsCtSettings.md) | 53 | The settings, defaults applied. |
| [lmsCtSaveSetting()](/code/functions/lmsCtSaveSetting.md) | 74 |  |
| [lmsCtParseMarks()](/code/functions/lmsCtParseMarks.md) | 83 | '5,3,1,0' -> [5,3,1,0]: four whole numbers, best first, the best above zero. Null if unusable. |
| [lmsCtGradedMarks()](/code/functions/lmsCtGradedMarks.md) | 96 |  |
| [lmsCtValidateQuestion()](/code/functions/lmsCtValidateQuestion.md) | 106 | Check a question from the editor or the AI. Returns [`$clean`, null] or [null, 'why']. A choice question has exactly one answer worth anything (stored as 1); a graded one needs a best answer worth more than zero. |
| [lmsCtMaxMarks()](/code/functions/lmsCtMaxMarks.md) | 150 | The best marks a question offers - what a full score on it means. |
| [lmsCtDecodeQuestion()](/code/functions/lmsCtDecodeQuestion.md) | 158 | A bank row with its answers decoded. |
| [lmsCtInsertQuestion()](/code/functions/lmsCtInsertQuestion.md) | 167 | Insert a validated question into the bank. |
| [lmsCtTestQuestions()](/code/functions/lmsCtTestQuestions.md) | 181 | The questions on a test, in order, decoded. |
| [lmsCtNextSort()](/code/functions/lmsCtNextSort.md) | 193 | Next sort position on a test. |
| [lmsCtAttach()](/code/functions/lmsCtAttach.md) | 201 | Put bank questions on a test (already-there ones are skipped). Returns how many were added. |
| [lmsCtBuildSnapshot()](/code/functions/lmsCtBuildSnapshot.md) | 218 | Freeze a test into what a candidate will sit. Throws, with a sentence an analyst can act on, when the test is not ready: no questions, or any that are still drafts or have been hidden since they were added. |
| [lmsCtNewToken()](/code/functions/lmsCtNewToken.md) | 261 | A new raw token and its hash. The raw one is shown once and never stored. |
| [lmsCtLinkPath()](/code/functions/lmsCtLinkPath.md) | 267 |  |
| [lmsCtFindSitting()](/code/functions/lmsCtFindSitting.md) | 273 | The sitting a raw token opens, or null. Malformed tokens never reach the database. |
| [lmsCtDeadline()](/code/functions/lmsCtDeadline.md) | 282 | When a started sitting's time runs out (UTC unix time), or null if not started. |
| [lmsCtState()](/code/functions/lmsCtState.md) | 294 | Where a sitting stands: cancelled \| submitted \| expired (never started, link out of date) \| timeup (started, clock run out, not yet closed) \| ready \| in_progress. |
| [lmsCtScore()](/code/functions/lmsCtScore.md) | 310 | Score a snapshot against the candidate's answers ({question index: answer index}). Each question counts equally: marks chosen / best marks on offer. Unanswered scores 0. Returns [overall percent, per-skill breakdown]. |
| [lmsCtFinalise()](/code/functions/lmsCtFinalise.md) | 333 | Close a sitting and store its score. Only the first close counts. |
| [lmsCtFinaliseOverdue()](/code/functions/lmsCtFinaliseOverdue.md) | 347 | Close every sitting whose clock has run out. Cheap; called whenever results are read. |
| [lmsCtPurge()](/code/functions/lmsCtPurge.md) | 363 | Retention: candidates' details are personal data. A sitting that is over - submitted, cancelled, or a link never used and out of date - is deleted once it is older than the retention setting. At most once a day; 0 keeps everything. |
| [lmsCtGenerate()](/code/functions/lmsCtGenerate.md) | 383 | Ask the AI for `$count` questions on one skill. Returns validated DRAFTS (not saved). A graded question comes back best-to-worst and is given the install's marks in that order; the candidate sees them shuffled. |
| [lmsCtParseDrafts()](/code/functions/lmsCtParseDrafts.md) | 426 | The model's reply -> validated drafts. Separate from the call so the parsing can be tested against sample replies without spending anything. |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 65 | `lmsCtSettings` | read [system_settings](/code/tables/system_settings.md) |  |
| 76 | `lmsCtSaveSetting` | **insert** [system_settings](/code/tables/system_settings.md) (`setting_key`, `setting_value`, `updated_datetime`) |  |
| 169 | `lmsCtInsertQuestion` | **insert** [lms_ct_questions](/code/tables/lms_ct_questions.md) (`skill`, `difficulty`, `format`, `question_text`, `answers_json`, `explanation`, `status`, `source`, `role_context`, `created_by_analyst_id`, `created_datetime`) |  |
| 183 | `lmsCtTestQuestions` | read [lms_ct_test_questions](/code/tables/lms_ct_test_questions.md), read [lms_ct_questions](/code/tables/lms_ct_questions.md) |  |
| 195 | `lmsCtNextSort` | read [lms_ct_test_questions](/code/tables/lms_ct_test_questions.md) |  |
| 204 | `lmsCtAttach` | **insert** [lms_ct_test_questions](/code/tables/lms_ct_test_questions.md) (`test_id`, `question_id`, `sort_order`) |  |
| 220 | `lmsCtBuildSnapshot` | read [lms_ct_tests](/code/tables/lms_ct_tests.md) |  |
| 276 | `lmsCtFindSitting` | read [lms_ct_sittings](/code/tables/lms_ct_sittings.md) |  |
| 339 | `lmsCtFinalise` | **update** [lms_ct_sittings](/code/tables/lms_ct_sittings.md) (`submitted_datetime`, `finish_reason`, `score_percent`, `skills_json`) |  |
| 349 | `lmsCtFinaliseOverdue` | read [lms_ct_sittings](/code/tables/lms_ct_sittings.md) |  |
| 369 | `lmsCtPurge` | **delete** [lms_ct_sittings](/code/tables/lms_ct_sittings.md) |  |

## How it hangs together

**Includes:** [includes/ai_provider.php](/code/files/includes/ai_provider.php.md), [api/cmdb/_ai_helpers.php](/code/files/api/cmdb/_ai_helpers.php.md)

**Included by:** [api/lms/tests.php](/code/files/api/lms/tests.php.md), [api/lms/test_public.php](/code/files/api/lms/test_public.php.md), [lms/test.php](/code/files/lms/test.php.md)

**Calls:** [aiProviderChat()](/code/functions/aiProviderChat.md), [parseClaudeJson()](/code/functions/parseClaudeJson.md)

