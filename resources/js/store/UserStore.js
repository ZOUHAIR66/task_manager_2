import { defineStore } from 'pinia'


export const UserStore = defineStore({
    id: 'UserStore',
    state: () => ({
        token: localStorage.getItem('token') || 0,
        user_id: localStorage.getItem('user_id'),
        name: localStorage.getItem('name'),
        tasks: [],
    }),
    getters: {
        getToken: state => state.token,
        getUserId: state => state.user_id,
        getUserName: state => state.name
    },
    actions: {
        async getTasks() {
            const response = await fetch('api/index/' + this.user_id)
                .then(response => this.tasks = response.json())
                .then(data => {
                    this.tasks = data
                    console.log("from", this.tasks)

                })
                .catch(error => console.log(error))
        },

        setToken: function (token) {
            this.token = token
            localStorage.setItem('token', token)
        },
        removeToken: function () {
            this.token = 0
            localStorage.removeItem('token')
        },

        setUserId: function (user_id) {
            this.user_id = user_id
            localStorage.setItem('user_id', user_id)
        },
        removeUserId: function () {
            this.user_id = null
            localStorage.removeItem('user_id')
        },

        setUserName: function (name) {
            this.name = name
            localStorage.setItem('name', name)
        },
        removeUserName: function () {
            this.name = null
            localStorage.removeItem('name')
        }
    },



})