# x-ui::list.accordion

## Purpose
List component: accordion.

## Source
- View: `src/resources/views/components/list/accordion.blade.php`

## Props
| Name | Type | Required | Default | Notes |
|------|------|----------|---------|-------|
| active | boolean | no | False |  |
| disabled | boolean | no | False |  |
| icon | string | no | None |  |
| subtitle | string | no | None |  |
| title | string | no |  |  |

## Slots
- `default`: Default slot content.

## Attributes
- Pass-through attributes are supported via `$attributes`.

## Dependencies
- Icons: `nanodepo/apex` (referenced as `icon::<name>` via `x-dynamic-component`).
