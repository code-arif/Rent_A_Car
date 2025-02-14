import '../css/app.css';
import './Assets/css/bootstrap.min.css';
import './Assets/css/main.css';
import './Assets/css/style.css';
import './Assets/js/toast.js';
import Toastify from 'toastify-js';
import "toastify-js/src/toastify.css";
import NProgress from 'nprogress';

import { createInertiaApp, router } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { createApp, h } from 'vue';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';
import Vue3EasyDataTable from 'vue3-easy-data-table';
import 'vue3-easy-data-table/dist/style.css';

//asset for user
// import './Assets/User/css/style.css';

createInertiaApp({
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob('./Pages/**/*.vue'),
        ),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .use(Toastify)
            .component('EasyDataTable', Vue3EasyDataTable)
            .mount(el);
    },
    progress: {
        delay: 250,
        color: '#ff4500',
        includeCSS: false, // Disable default styles
        showSpinner: false,
    },
});

router.on('start', () => {
    NProgress.start();
});


router.on('progress', (event) => {
    if (event.detail.progress && event.detail.progress.percentage) {
        NProgress.set(event.detail.progress.percentage / 100);
    }
});

router.on('finish', () => {
    NProgress.done();
});
