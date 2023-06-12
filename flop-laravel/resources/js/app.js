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

// resources/assets/js/app.js

require('./bootstrap');

Vue.component('chat-messages', require('./components/ChatMessages.vue'));
Vue.component('chat-form', require('./components/ChatForm.vue'));

const chat = new Vue({
    el: "#chat",

    data: {
        messages: [],
    },

    created() {
        this.fetchMessages();

        Echo.private("chat").listen("MessageSent", (e) => {
            this.messages.push({
                message: e.message.message,
                user: e.user,
            });
        });
    },

    methods: {
        fetchMessages() {
            axios.get("/messages").then((response) => {
                this.messages = response.data;
            });
        },

        addMessage(message) {
            this.messages.push(message);

            axios.post("/messages", message).then((response) => {
                console.log(response.data);
            });
        },
    },
});
