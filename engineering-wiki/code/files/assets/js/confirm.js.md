# assets/js/confirm.js

> JavaScript - 277 lines

Global Confirmation Modal

One shared OK/Cancel dialog for the whole app. Look + behaviour modelled
on the calendar settings delete-category modal (#450). Auto-injects its
own markup + styles on first use so individual pages don't need any
HTML scaffolding — just call showConfirm({...}).

Usage:
  // Callback-style:
  showConfirm({
      title: 'Delete category?',
      message: 'This cannot be undone.',
      okLabel: 'Delete',
      okClass: 'danger',
      onConfirm: () => `doDelete()`
  });

  // Promise-style:
  const ok = await showConfirm({
      title: 'Delete category?',
      message: 'This cannot be undone.',
      okLabel: 'Delete',
      okClass: 'danger'
  });
  if (ok) `doDelete()`;

Options:
  title       - Modal heading text. Default: 'Confirm'.
  message     - Body text (plain text, not HTML).
  okLabel     - Label for the OK button. Default: 'OK'.
  okClass     - 'primary' | 'danger'. Drives the OK button colour. Default: 'primary'.
  cancelLabel - Label for the Cancel button. Default: 'Cancel'.
  onConfirm   - Callback fired when the user confirms. Receives { checked, text }.
  onCancel    - Callback fired when the user cancels (or dismisses).
  checkbox    - Optional extra opt-in inside the dialog, for a destructive
                action with a wider and a narrower reading:
                  checkbox: { label: 'Also delete unread', checked: false }
                Omit it entirely and the dialog is exactly as it always was.
  textarea    - Optional free-text box, for a question that wants a sentence
                rather than a yes (#142 — a one-off note on a closing ticket):
                  textarea: { placeholder: 'Have a nice day', label: 'Message' }
                The typed value arrives TRIMMED on onConfirm's `text`, so a
                box holding only spaces reads as empty for every caller.

Returns: Promise<boolean> — resolves true on confirm, false on cancel.

⚠️ THE RETURN TYPE IS A BOOLEAN AND MUST STAY ONE. 114 of the 129 call sites
do `if (await showConfirm(...))`. Resolving an object instead would make every
one of them treat a CANCEL as a confirm, because `{}` is truthy — a silent,
app-wide, destructive regression. So the checkbox state, AND the textarea's
text, are reported through onConfirm's argument rather than the promise.
Anything added here later must follow the same rule.

## Functions

| Function | Line | What it does |
|---|--:|---|
| `build()` | 122 |  |
| `handleConfirm()` | 185 |  |
| `handleCancel()` | 201 |  |
| `close()` | 209 |  |

## Loaded by

- [asset-management/users.php](/code/files/asset-management/users.php.md)
- [index.php](/code/files/index.php.md)
- [self-service/course.php](/code/files/self-service/course.php.md)
- [system/cost-centres/index.php](/code/files/system/cost-centres/index.php.md)
- [system/photo-album/index.php](/code/files/system/photo-album/index.php.md)
- [system/roles/index.php](/code/files/system/roles/index.php.md)
- [system/sso/carddav.php](/code/files/system/sso/carddav.php.md)
- [system/sso/provider.php](/code/files/system/sso/provider.php.md)

