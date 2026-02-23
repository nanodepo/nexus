# x-ui::nav.drawer.link

## Purpose
Navigation component: link.

## Source
- View: `src/resources/views/components/nav/drawer/link.blade.php`

## Props
| Name | Type | Required | Default | Notes |
|------|------|----------|---------|-------|
| active | boolean | no | False |  |
| icon | string | no |  |  |
| label | string | no |  |  |

## Slots
- `badge`: Named slot content.

## Attributes
- Pass-through attributes are supported via `$attributes`.

## Dependencies
- Icons: `nanodepo/apex` (referenced as `icon::<name>` via `x-dynamic-component`).
