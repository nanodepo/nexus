# x-ui::banner

## Purpose
Blade UI component: banner.

## Source
- View: `src/resources/views/components/banner.blade.php`

## Props
| Name | Type | Required | Default | Notes |
|------|------|----------|---------|-------|
| color | string | no | primary |  |
| icon | string | no | None |  |
| primary | string | no |  |  |
| subtitle | string | no | None |  |
| title | string | no |  |  |

## Slots
- `default`: Default slot content.

## Attributes
- Pass-through attributes are supported via `$attributes`.

## Dependencies
- Icons: `nanodepo/apex` (referenced as `icon::<name>` via `x-dynamic-component`).
