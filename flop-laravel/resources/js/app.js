import { createApp } from "vue";

import App from "./components/Countdown.vue";
import Chat from "./components/Chat.vue";
import TestForm from "./components/TestForm.vue";

const myApp = createApp(App);
const myChat = createApp(Chat);
const myTestForm = createApp(TestForm);

myApp.mount("#app");
myChat.mount("#chat");
myTestForm.mount("#test-form");