import { createApp } from "vue";

import App from "./components/Countdown.vue";
import Chat from "./components/Chat.vue";
import TestForm from "./components/TestForm.vue";

const app = createApp(App);
const chatApp = createApp(Chat);
const testFormApp = createApp(TestForm);

app.mount("#app");
// Enregistrer les composants
app.component(
    "chat-messages",
    require("./components/ChatMessages.vue").default
);
app.component("chat-form", require("./components/ChatForm.vue").default);


chatApp.mount("#chat");
testFormApp.mount("#test-form");