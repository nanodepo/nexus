# x-ui::avatar

## Purpose
Blade UI component: avatar.

## Source
- View: `src/resources/views/components/avatar.blade.php`

## Props
| Name | Type | Required | Default | Notes |
|------|------|----------|---------|-------|
| icon | string | no | user |  |
| is_online | boolean | no | False |  |
| url | string | no | None |  |
| user | string | no |  |  |

## Slots
No explicit slots.

## Attributes
- Pass-through attributes are supported via `$attributes`.

## Dependencies
- Icons: `nanodepo/apex` (referenced as `icon::<name>` via `x-dynamic-component`).
