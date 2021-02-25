<template>
    <div class="w-full">
        <div v-if="user">
            <h2 class="text-gray-900 text-2xl mb-8 font-medium title-font">Welcome, <span v-text="user.name"></span></h2>
            <div v-for="entry in entries" :id="entry.id">
                <h3 class="text-gray-900 mb-1 font-medium title-font" v-text="entry.title"></h3>
                <p class="text-gray-500 mb-1 font-normal" v-text="entry.content"></p>
            </div>
            <input
                type="text"
                disabled
                class="w-full my-4 bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                v-model="token"
            >
            <button
                class="text-white bg-indigo-500 border-0 py-2 px-6 mr-4 focus:outline-none hover:bg-indigo-600 rounded text-lg"
                @click="getEntries"
            >Get My Entries</button>
            <button
                class="text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg"
                @click="getToken"
            >Get A Token</button>
        </div>
        <div v-else>
            <div class="form">
                <div class="relative mb-4">
                    <label for="email" class="leading-7 text-sm text-gray-600">Email Address</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                        v-model="login.email"
                    >
                </div>
                <div class="relative mb-4">
                    <label for="password" class="leading-7 text-sm text-gray-600">Password</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                        v-model="login.password"
                    >
                </div>
                <button
                    class="text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg"
                    @click="handleLogin"
                >Sign In</button>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            user: null,
            login: {
                email: '',
                password: ''
            },
            entries: [],
            token: ''
        }
    },
    created() {
        this.getUser();
    },
    methods: {
        handleLogin() {
            axios.get('/sanctum/csrf-cookie').then(response => {
                axios.post('/login', this.login).then(response => {
                    this.getUser();
                });
            });
        },
        getUser() {
            axios.get('/user').then(response => {
                this.user = response.data;
            });
        },
        getEntries() {
            axios.get('/entries').then(response => {
                this.entries = response.data;
            });
        },
        getToken() {
            axios.post('/tokens/create', {
                token_name: 'My Token'
            }).then(response => {
                this.token = response.data.token;
            });
        }
    }
}
</script>
