<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Todoリスト</h1>
                <ul>
                    <li v-for="task in tasks">{{ task['name'] }} // {{ task['user_id'] }}</li>
                </ul>
                <input type="text" v-model="newTask" @blur="addTodo">
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            user: {
                type: String,
            }, 
        },
        data() {
            return {
                tasks: [],
                newTask: '',
            }
        },
        mounted() {
            axios.get('/api/tasks').then(response => (this.tasks = response.data));
            
            window.Echo.channel('task-added-channel')
                        .listen('TaskAdded', response => {
                            this.tasks.push(response.task);
                        });
        },
        methods: {
            addTodo() {
                axios.post('/api/tasks', {
                    name: this.newTask,
                    user_id: this.user_id,
                })
                .then(response => this.tasks.push(response.data));
                
                this.newTask = '';
            }
        }
    }
</script>
