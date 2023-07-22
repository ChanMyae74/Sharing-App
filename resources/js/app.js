import './bootstrap';
import '../css/app.css';
import 'flowbite';
import('preline');

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';
import ViewUIPlus from 'view-ui-plus';
import JsonViewer from 'vue-json-viewer';
import locale from 'view-ui-plus/dist/locale/en-US';
import CKEditor from '@ckeditor/ckeditor5-vue';
import VueMarkdownEditor from '@kangc/v-md-editor';
import '@kangc/v-md-editor/lib/style/base-editor.css';
import VMdPreview from '@kangc/v-md-editor/lib/preview';
import '@kangc/v-md-editor/lib/style/preview.css';
import vuepressTheme from '@kangc/v-md-editor/lib/theme/vuepress.js';
import '@kangc/v-md-editor/lib/theme/style/vuepress.css';
import enUS from '@kangc/v-md-editor/lib/lang/en-US';
import Prism from 'prismjs';
import hljs from 'highlight.js';
import githubTheme from '@kangc/v-md-editor/lib/theme/github.js';
import '@kangc/v-md-editor/lib/theme/style/github.css';
VueMarkdownEditor.lang.use('en-US', enUS);
Prism.manual = true;
Prism.highlightAll();
VueMarkdownEditor.use(vuepressTheme, {
    Prism,
    Hljs: hljs,
});

const appName =
    window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob('./Pages/**/*.vue')
        ),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(JsonViewer)
            .use(VueMarkdownEditor)
            .use(VMdPreview)
            .use(ZiggyVue, Ziggy)
            .use(ViewUIPlus, {
                locale,
            })
            .use(CKEditor)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});

const HSThemeAppearance = {
    init() {
        const defaultTheme = 'default';
        let theme = localStorage.getItem('hs_theme') || defaultTheme;

        if (document.querySelector('html').classList.contains('dark')) return;
        this.setAppearance(theme);
    },
    _resetStylesOnLoad() {
        const $resetStyles = document.createElement('style');
        $resetStyles.innerText = `*{transition: unset !important;}`;
        $resetStyles.setAttribute('data-hs-appearance-onload-styles', '');
        document.head.appendChild($resetStyles);
        return $resetStyles;
    },
    setAppearance(theme, saveInStore = true, dispatchEvent = true) {
        const $resetStylesEl = this._resetStylesOnLoad();

        if (saveInStore) {
            localStorage.setItem('hs_theme', theme);
        }

        if (theme === 'auto') {
            theme = window.matchMedia('(prefers-color-scheme: dark)').matches
                ? 'dark'
                : 'default';
        }

        document.querySelector('html').classList.remove('dark');
        document.querySelector('html').classList.remove('default');
        document.querySelector('html').classList.remove('auto');

        document
            .querySelector('html')
            .classList.add(this.getOriginalAppearance());

        setTimeout(() => {
            $resetStylesEl.remove();
        });

        if (dispatchEvent) {
            window.dispatchEvent(
                new CustomEvent('on-hs-appearance-change', { detail: theme })
            );
        }
    },
    getAppearance() {
        let theme = this.getOriginalAppearance();
        if (theme === 'auto') {
            theme = window.matchMedia('(prefers-color-scheme: dark)').matches
                ? 'dark'
                : 'default';
        }
        return theme;
    },
    getOriginalAppearance() {
        const defaultTheme = 'default';
        return localStorage.getItem('hs_theme') || defaultTheme;
    },
};
HSThemeAppearance.init();

window
    .matchMedia('(prefers-color-scheme: dark)')
    .addEventListener('change', (e) => {
        if (HSThemeAppearance.getOriginalAppearance() === 'auto') {
            HSThemeAppearance.setAppearance('auto', false);
        }
    });

window.addEventListener('load', () => {
    const $clickableThemes = document.querySelectorAll(
        '[data-hs-theme-click-value]'
    );
    const $switchableThemes = document.querySelectorAll(
        '[data-hs-theme-switch]'
    );

    $clickableThemes.forEach(($item) => {
        $item.addEventListener('click', () =>
            HSThemeAppearance.setAppearance(
                $item.getAttribute('data-hs-theme-click-value'),
                true,
                $item
            )
        );
    });

    $switchableThemes.forEach(($item) => {
        $item.addEventListener('change', (e) => {
            HSThemeAppearance.setAppearance(
                e.target.checked ? 'dark' : 'default'
            );
        });

        $item.checked = HSThemeAppearance.getAppearance() === 'dark';
    });

    window.addEventListener('on-hs-appearance-change', (e) => {
        $switchableThemes.forEach(($item) => {
            $item.checked = e.detail === 'dark';
        });
    });
});
