require("./bootstrap");

import { createApp, h } from "vue";
import { createInertiaApp, Link, Head } from "@inertiajs/inertia-vue3";
import { InertiaProgress } from "@inertiajs/progress";
import Layout from "./Pages/Shared/Layout";

createInertiaApp({
    resolve: async (name) => {
        let page = (await import(`./Pages/${name}.vue`)).default;

        // if page has no layout, set default
        if (page.layout === undefined) {
            page.layout = Layout;
        }

        return page;
    },
    setup({ el, app, props, plugin }) {
        return createApp({ render: () => h(app, props) })
            .use(plugin)
            .component("Link", Link)
            .component("Head", Head)
            .mixin({ methods: { route } })
            .mount(el);
    },

    title: (title) => "My App: " + title,
});

InertiaProgress.init({
    color: "#4B5563",
    showSpinner: true,
});
