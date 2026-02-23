# x-ui::circle

## Purpose
Blade UI component: circle.

## Source
- View: `src/resources/views/components/circle.blade.php`

## Props
| Name | Type | Required | Default | Notes |
|------|------|----------|---------|-------|
| color | string | no | primary |  |
| disabled | boolean | no | False |  |
| icon | string | no |  |  |
| primary | string | no |  |  |
| text | string | no |  |  |
| variant | string | no | text |  |

## Slots
No explicit slots.

## Attributes
- Pass-through attributes are supported via `$attributes`.

## Dependencies
- Icons: `nanodepo/apex` (referenced as `icon::<name>` via `x-dynamic-component`).
