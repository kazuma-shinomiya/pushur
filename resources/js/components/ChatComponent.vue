<template>
    <div>
        <ul class="chat">
            <li class="left clearfix" v-for="message in messages">
                <div class="chat-body clearfix">
                    <div class="header">
                        <strong class="primary-font">
                        </strong>
                    </div>
                    <p v-if="senderId == message.sender" style="color:red">
                        {{ message.content }}
                    </p>
                    <p v-else>
                        {{ message.content }}
                    </p>
                </div>
            </li>
        </ul>
        <textarea placeholder="メッセージを入力" v-model="newMessage"></textarea>
        <button @click="sendMessage">送信</button>
    </div>
</template>

<script>
    export default {
        props: ['senderId', 'receiverId', 'endpoint'],

        data() {
            return {
                messages:[],
                newMessage: '',
            }
        },
        
        mounted() {
            axios.get(this.endpoint + '/fetch').then(response => (this.messages = response.data));
            window.Echo.channel('send-message.' + this.receiverId + this.senderId)
                        .listen('SendMessage', response => {
                            this.messages.push(response.message);
                        });
        },

        methods: {
            sendMessage() {
                axios.post(this.endpoint + '/send', {
                    content: this.newMessage,
                    sender: this.senderId,
                    receiver: this.receiverId,
                })
                .then(response => this.messages.push(response.data));

                this.newMessage = ''
            }
        }    
    }
</script>