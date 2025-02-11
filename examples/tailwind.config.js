import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

export default {
    content: [
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './packages/nanodepo/gems-ui/src/resources/views/**/*.blade.php'
    ],

    theme: {
        colors: {
            transparent: 'transparent',
            current: 'currentColor',

            white: '#ffffff',
            black: '#000000',

            'background': 'rgb(var(--tg-theme-bg-color))',
            'on-background': 'rgb(var(--tg-theme-text-color))',

            'secondary': 'rgb(var(--tg-theme-secondary-bg-color))',

            'hint': 'rgb(var(--tg-theme-hint-color))',
            'link': 'rgb(var(--tg-theme-link-color))',
            'accent': 'rgb(var(--tg-theme-accent-text-color))',
            'subtitle': 'rgb(var(--tg-theme-subtitle-text-color))',
            'destructive': 'rgb(var(--tg-theme-destructive-text-color))',

            'button': 'rgb(var(--tg-theme-button-color))',
            'on-button': 'rgb(var(--tg-theme-button-text-color))',

            section: {
                'DEFAULT': 'rgb(var(--tg-theme-section-bg-color))',
                'header': 'rgb(var(--tg-theme-section-header-text-color))',
                'separator': 'rgb(var(--tg-theme-section-separator-color))',
            },
            'on-section': 'rgb(var(--tg-theme-section-text-color))',
        },

        extend: {
            fontFamily: {
                sans: ['Roboto', ...defaultTheme.fontFamily.sans]
            },
            spacing: {
                4.5: '18px',
            },
            width: {
                13: '3.25rem',
            },
            animation: {
                'loading': 'spin 1.6s linear infinite',
            }
        }
    },

    plugins: [
        forms,
        typography
    ]
}

