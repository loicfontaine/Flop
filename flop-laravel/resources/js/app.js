import { createApp } from "vue";

import App from "./components/Countdown.vue";
import Chat from "./components/Chat.vue";
import emission from "./emission.vue";

const myApp = createApp(App);
const myChat = createApp(Chat);
const myEmission = createApp(emission);

myApp.mount("#app");
myChat.mount("#chat");
myEmission.mount("#emission");
