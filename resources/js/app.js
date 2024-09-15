import './bootstrap.js';

import { createApp } from 'vue';
import Producers from './components/Producers.vue';
import Products from './components/Products.vue';

const app = createApp({
    data() {
        return {
            isOpen: false,
        };
    },
    methods: {
        toggleDropdown() {
            this.isOpen = !this.isOpen;
        },
    }
});
app.component("producers", Producers);
app.component("products", Products);
app.mount("#app");
