# x-ui::button

## Purpose
Reusable button component that renders a `<button>` or `<a>` depending on the `href` prop.

## Source
- View: `src/resources/views/components/button.blade.php`
- Link view: `src/resources/views/components/link.blade.php`
- Class: `src/Views/Components/Button.php`
- Styles: `src/resources/css/uikit.css`

## Props
| Name | Type | Required | Default | Variants | Notes |
|------|------|----------|---------|----------|-------|
| variant | string | no | filled | filled, outlined, tonal, text | |
| color | string | no | primary | primary, secondary, tertiary, destructive, success | |
| before | string | no | | | Icon name rendered before label (prefixed with `icon::`). |
| after | string | no | | | Icon name rendered after label (prefixed with `icon::`). |
| href | string | no | | | When set, renders an `<a>` tag with `href`. |
| disabled | boolean | no | false | | For `<a>`, disabled is simulated via classes. |

## Slots
- `default`: Button label/content.

## Attributes
- Pass-through attributes are supported via `$attributes`.

## Events
- `click`

## Accessibility
- When `href` is set and `disabled=true`, the component renders `<a>` with `aria-disabled="true"` and `tabindex="-1"`.

## Usage
```html
<x-ui::button>Save</x-ui::button>

<x-ui::button before="plus" variant="outlined">Add</x-ui::button>

<x-ui::button href="/settings" color="secondary">Settings</x-ui::button>
```

## Notes
- The base class is `button`, and `color` + `variant` map to CSS in `uikit.css`.
- Icons are provided by package `nanodepo/apex` and referenced as `icon::<name>` with `x-dynamic-component`.
