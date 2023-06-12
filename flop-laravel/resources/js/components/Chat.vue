<template>

<h1 class="test">Activé</h1>

</template>

<script>

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
</script>

<style>

.test{
    color:red;
    text-align: center;
}

</style>