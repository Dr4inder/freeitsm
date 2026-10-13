# api/lms/tests.php

> API endpoint - 458 lines

LMS API: competency tests - tests, the question bank, candidates' sittings and the Competency tests settings tab. Every action sits behind Cap::LMS_TESTS (sensitive: candidates are people outside the organisation). The rules live in includes/lms/competency_tests.php; this file is the door.

GET  ?action=tests | test&id= | bank&... | skills | sittings[&test_id=] | sitting&id= | settings
  POST {action: save_test | delete_test | generate | add_questions | remove_question | move_question
                | save_question | set_status | delete_question
                | create_sitting | new_link | cancel_sitting | delete_sitting | save_notes
                | save_settings}

## The endpoint

| | |
|---|---|
| URL | `api/lms/tests.php` |
| Protected by | Module access: lms (requireModuleAccessJson); Permission: Cap::LMS_TESTS (requireCapabilityJson) |
| Reads | `GET action`, `GET id`, `GET q`, `GET status`, `GET test_id` |
| Called from | [assets/js/lms-tests.js](/code/files/assets/js/lms-tests.js.md) |

## Functions

| Function | Line | What it does |
|---|--:|---|
| [ctOut()](/code/functions/ctOut.md) | 33 | Echoes {success: true} merged with `$a` as JSON, then stops. |
| [ctFail()](/code/functions/ctFail.md) | 35 | Sends an HTTP status and {success: false, error}, then stops. |
| [ctSittingRow()](/code/functions/ctSittingRow.md) | 38 | A sitting row as the analyst pages see it - never the token hash. |
| [ctLoadSitting()](/code/functions/ctLoadSitting.md) | 62 | Loads one candidate sitting with its test's title, or answers 404 "Candidate not found" and stops. |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 64 | `ctLoadSitting` | read [lms_ct_sittings](/code/tables/lms_ct_sittings.md), read [lms_ct_tests](/code/tables/lms_ct_tests.md) |  |
| 79 |  | read [lms_ct_test_questions](/code/tables/lms_ct_test_questions.md), read [lms_ct_questions](/code/tables/lms_ct_questions.md), read [lms_ct_sittings](/code/tables/lms_ct_sittings.md), read [lms_ct_test_skills](/code/tables/lms_ct_test_skills.md), read [lms_ct_tests](/code/tables/lms_ct_tests.md) |  |
| 91 |  | read [lms_ct_tests](/code/tables/lms_ct_tests.md) |  |
| 95 |  | read [lms_ct_test_skills](/code/tables/lms_ct_test_skills.md) |  |
| 97 |  | read [lms_ct_sittings](/code/tables/lms_ct_sittings.md) |  |
| 118 |  | read [lms_ct_test_questions](/code/tables/lms_ct_test_questions.md), read [lms_ct_questions](/code/tables/lms_ct_questions.md) |  |
| 128 |  | read [lms_ct_questions](/code/tables/lms_ct_questions.md) |  |
| 137 |  | read [lms_ct_sittings](/code/tables/lms_ct_sittings.md), read [lms_ct_tests](/code/tables/lms_ct_tests.md) |  |
| 198 |  | **update** [lms_ct_tests](/code/tables/lms_ct_tests.md) (`title`, `role_description`, `time_limit_minutes`, `pass_mark`, `updated_datetime`) |  |
| 200 |  | read [lms_ct_tests](/code/tables/lms_ct_tests.md) |  |
| 204 |  | **insert** [lms_ct_tests](/code/tables/lms_ct_tests.md) (`title`, `role_description`, `time_limit_minutes`, `pass_mark`, `created_by_analyst_id`, `created_datetime`) |  |
| 212 |  | **update** [lms_ct_test_skills](/code/tables/lms_ct_test_skills.md) (`skill`, `difficulty`, `format`, `question_count`, `sort_order`) |  |
| 213 |  | **insert** [lms_ct_test_skills](/code/tables/lms_ct_test_skills.md) (`test_id`, `skill`, `difficulty`, `format`, `question_count`, `sort_order`) |  |
| 223 |  | **delete** [lms_ct_test_skills](/code/tables/lms_ct_test_skills.md) |  |
| 234 |  | read [lms_ct_sittings](/code/tables/lms_ct_sittings.md) |  |
| 237 |  | **update** [lms_ct_tests](/code/tables/lms_ct_tests.md) (`is_archived`, `updated_datetime`) |  |
| 240 |  | **delete** [lms_ct_test_questions](/code/tables/lms_ct_test_questions.md) |  |
| 241 |  | **delete** [lms_ct_test_skills](/code/tables/lms_ct_test_skills.md) |  |
| 242 |  | **delete** [lms_ct_tests](/code/tables/lms_ct_tests.md) |  |
| 251 |  | read [lms_ct_test_skills](/code/tables/lms_ct_test_skills.md), read [lms_ct_tests](/code/tables/lms_ct_tests.md) |  |
| 257 |  | read [lms_ct_test_questions](/code/tables/lms_ct_test_questions.md), read [lms_ct_questions](/code/tables/lms_ct_questions.md) |  |
| 265 |  | read [lms_ct_questions](/code/tables/lms_ct_questions.md), read [lms_ct_test_questions](/code/tables/lms_ct_test_questions.md) |  |
| 281 |  | read [lms_ct_questions](/code/tables/lms_ct_questions.md) |  |
| 291 |  | **update** [lms_ct_tests](/code/tables/lms_ct_tests.md) (`updated_datetime`) |  |
| 297 |  | read [lms_ct_tests](/code/tables/lms_ct_tests.md) |  |
| 305 |  | read [lms_ct_questions](/code/tables/lms_ct_questions.md) |  |
| 313 |  | **delete** [lms_ct_test_questions](/code/tables/lms_ct_test_questions.md) |  |
| 321 |  | **update** [lms_ct_test_questions](/code/tables/lms_ct_test_questions.md) (`sort_order`) |  |
| 332 |  | **update** [lms_ct_questions](/code/tables/lms_ct_questions.md) (`skill`, `difficulty`, `format`, `question_text`, `answers_json`, `explanation`, `status`, `updated_datetime`) |  |
| 349 |  | **update** [lms_ct_questions](/code/tables/lms_ct_questions.md) (`status`, `updated_datetime`) |  |
| 357 |  | **delete** [lms_ct_questions](/code/tables/lms_ct_questions.md) |  |
| 373 |  | read [lms_ct_tests](/code/tables/lms_ct_tests.md) |  |
| 378 |  | **insert** [lms_ct_sittings](/code/tables/lms_ct_sittings.md) (`test_id`, `candidate_name`, `candidate_email`, `token_hash`, `snapshot_json`, `time_limit_minutes`, `expires_datetime`, `created_by_analyst_id`, `created_datetime`) |  |
| 408 |  | **update** [lms_ct_sittings](/code/tables/lms_ct_sittings.md) (`token_hash`, `expires_datetime`) |  |
| 415 |  | **update** [lms_ct_sittings](/code/tables/lms_ct_sittings.md) (`is_cancelled`) |  |
| 420 |  | **delete** [lms_ct_sittings](/code/tables/lms_ct_sittings.md) |  |
| 427 |  | **update** [lms_ct_sittings](/code/tables/lms_ct_sittings.md) (`notes`) |  |

## How it hangs together

**Includes:** [config.php](/code/files/config.php.md), [includes/functions.php](/code/files/includes/functions.php.md), [includes/rbac.php](/code/files/includes/rbac.php.md), [includes/ai_settings.php](/code/files/includes/ai_settings.php.md), [includes/lms/competency_tests.php](/code/files/includes/lms/competency_tests.php.md), [includes/self_service_email.php](/code/files/includes/self_service_email.php.md), [includes/public_url.php](/code/files/includes/public_url.php.md)

**Calls:** [aiSettingsLoad()](/code/functions/aiSettingsLoad.md), [connectToDatabase()](/code/functions/connectToDatabase.md), [lmsCtAttach()](/code/functions/lmsCtAttach.md), [lmsCtBuildSnapshot()](/code/functions/lmsCtBuildSnapshot.md), [lmsCtFinaliseOverdue()](/code/functions/lmsCtFinaliseOverdue.md), [lmsCtGenerate()](/code/functions/lmsCtGenerate.md), [lmsCtGradedMarks()](/code/functions/lmsCtGradedMarks.md), [lmsCtInsertQuestion()](/code/functions/lmsCtInsertQuestion.md), [lmsCtLinkPath()](/code/functions/lmsCtLinkPath.md), [lmsCtNewToken()](/code/functions/lmsCtNewToken.md), [lmsCtParseMarks()](/code/functions/lmsCtParseMarks.md), [lmsCtPurge()](/code/functions/lmsCtPurge.md), [lmsCtSaveSetting()](/code/functions/lmsCtSaveSetting.md), [lmsCtSettings()](/code/functions/lmsCtSettings.md), [lmsCtState()](/code/functions/lmsCtState.md), [lmsCtTestQuestions()](/code/functions/lmsCtTestQuestions.md), [lmsCtValidateQuestion()](/code/functions/lmsCtValidateQuestion.md), [publicAbsoluteUrl()](/code/functions/publicAbsoluteUrl.md), [requireCapabilityJson()](/code/functions/requireCapabilityJson.md), [requireModuleAccessJson()](/code/functions/requireModuleAccessJson.md), [ssGetSendingMailbox()](/code/functions/ssGetSendingMailbox.md), [ssSendSystemEmail()](/code/functions/ssSendSystemEmail.md), [systemName()](/code/functions/systemName.md)

