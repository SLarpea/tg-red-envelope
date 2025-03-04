import './bootstrap';
import './main';
import '../css/app.css';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
import { plugin as VueTippy } from 'vue-tippy';
import 'tippy.js/dist/tippy.css';

import toastr from 'toastr';
import 'toastr/build/toastr.css';
import 'aos/dist/aos.css';

import i18n from './i18n';

const appName = import.meta.env.VITE_APP_NAME || 'Hongbao';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .use(VueTippy)
            .use(VueSweetalert2)
            .use(toastr)
            .use(i18n)
            .mount(el);
    },
    progress: {
        delay: 250,
        color: '#512da8',
        includeCSS: true,
        showSpinner: true,
    },
});
