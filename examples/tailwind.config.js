import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

export default {
    content: [
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './vendor/nanodepo/gems-ui/src/resources/views/**/*.blade.php'
    ],

    theme: {
        colors: {
            transparent: 'transparent',
            current: 'currentColor',

            white: '#ffffff',
            black: '#000000',

            gray: 'var(--ndn-gray)',
            primary: 'var(--ndn-primary)',
            secondary: 'var(--ndn-secondary)',
            tertiary: 'var(--ndn-tertiary)',

            background: 'var(--ndn-background)',
            front: 'var(--ndn-front)',
            foreground: 'var(--ndn-foreground)',

            on: {
                background: 'var(--ndn-text)',
                section: 'var(--ndn-section-text)',
                primary: 'var(--ndn-primary-text)',
                secondary: 'var(--ndn-secondary-text)',
                tertiary: 'var(--ndn-tertiary-text)',
            },
            subtitle: 'var(--ndn-subtitle)',
            hint: 'var(--ndn-hint)',

            accent: 'var(--ndn-accent)',
            link: 'var(--ndn-link)',
            focus: 'var(--ndn-focus)',
            destructive: 'var(--ndn-destructive)',

            section: {
                DEFAULT: 'var(--ndn-section)',
                header: 'var(--ndn-section-header)',
                separator: 'var(--ndn-section-separator)',
            },

            gems: {
                diamond: '#20C1D7',
                ruby: '#DD2020',
                topaz: '#EEAB29',
                sapphire: '#2371E7',
                amethyst: '#B120E4',
                emerald: '#31DD8A',
            }

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
                'heart': 'heart 3s cubic-bezier(0.15,0.45,0.45,1) infinite'
            },
            boxShadow: {
                dropdown: '0 4px 16px -4px rgba(0, 0, 0, 0.4), 0 0 6px -2px rgb(0, 0, 0, 0.2)'
            },
            typography: ({ theme }) => ({
                DEFAULT: {
                    css: {
                        '--tw-prose-body': theme('colors.on-background'),
                        '--tw-prose-headings': theme('colors.on-section'),
                        '--tw-prose-lead': theme('colors.on-section'),
                        '--tw-prose-links': theme('colors.link'),
                        '--tw-prose-bold': theme('colors.on-section'),
                        '--tw-prose-counters': theme('colors.on-section'),
                        '--tw-prose-bullets': theme('colors.on-section'),
                        '--tw-prose-hr': theme('colors.section.separator'),
                        '--tw-prose-quotes': theme('colors.on-section'),
                        '--tw-prose-quote-borders': theme('colors.section.separator'),
                        '--tw-prose-captions': theme('colors.on-section'),
                        '--tw-prose-code': theme('colors.on-section'),
                        '--tw-prose-pre-code': theme('colors.section'),
                        '--tw-prose-pre-bg': theme('colors.on-section'),
                        '--tw-prose-th-borders': theme('colors.section.separator'),
                        '--tw-prose-td-borders': theme('colors.section.separator'),
                    },
                },
            })
        }
    },

    plugins: [
        forms,
        typography
    ]
}
