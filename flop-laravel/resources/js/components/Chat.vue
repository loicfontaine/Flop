<template>

<h1 class="test">Activé (chat container)</h1>

</template>

<script>
export default {
        props: ['user'],

        data() {
            return {
                messages: []
            }
        },
        created() {
        this.fetchMessages();
    },
        methods: {
            fetchMessages() {
            axios.get('/messages').then(response => {
                this.messages = response.data;
            });
        },

        addMessage(message) {
            this.messages.push(message);

            axios.post('/messages', message).then(response => {
              console.log(response.data);
            });
        }
        }    
    }
</script>

<style>

.test{
    color:red;
    text-align: center;
}

</style>