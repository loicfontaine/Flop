import { createApp } from "vue";

import App from "./components/Countdown.vue";
import Chat from "./components/Chat.vue";

const myApp = createApp(App);
const myChat = createApp(Chat);

myApp.mount("#app");
myChat.mount("#chat");
