<template>
    <div>
        <textarea placeholder="メッセージを入力" v-model="newMessage"></textarea>
        <button @click="sendMessage">送信</button>
    </div>
</template>

<script>
    export default {
        props: ['senderId', 'receiverId'],

        data() {
            return {
                newMessage: ''
            }
        },

        methods: {
            sendMessage() {
                axios.post('/api/chats/' + $this.receiverId, {
                    content: this.newMessage,
                    sender: this.senderId,
                    receiver: this.receiverId,
                })
                .then(response => this.tasks.push(response.data));

                this.newMessage = ''
            }
            
        }    
    }
</script>