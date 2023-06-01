import { createApp } from "vue";

import Countdown from "../js/components/Countdown.vue";

// Example data that come directly from the Laravel blade template
console.log("hello");

const app = createApp({});

app.component({
    Countdown,
});

app.mount("#app");
