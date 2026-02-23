# x-ui::input.color-picker

## Purpose
Input component: color picker.

## Source
- View: `src/resources/views/components/input/color-picker.blade.php`

## Props
No explicit props.

## Slots
No explicit slots.

## Attributes
- Pass-through attributes are supported via `$attributes`.

## Dependencies
- Icons: `nanodepo/apex` (referenced as `icon::<name>` via `x-dynamic-component`).

## Notes
- Colors are sourced from `config('nexus.palette')`.
- Palette order is preserved as defined in the config.
- Renders a 7-column grid (14 colors shown as two rows by default).
