<template>
    <div class="font-sans antialiased" id="app">
        <nav class="flex items-center justify-between flex-wrap bg-blue-700 p-3">
            <div class="flex items-center flex-no-shrink text-white mr-6">

                <svg width="25px" height="25px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">

                    <g id="SVGRepo_bgCarrier" stroke-width="0" />

                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />

                    <g id="SVGRepo_iconCarrier">
                        <path
                            d="M5.25 3C4.00736 3 3 4.00736 3 5.25V18.75C3 19.9926 4.00736 21 5.25 21H18.75C19.9926 21 21 19.9926 21 18.75V5.25C21 4.00736 19.9926 3 18.75 3H5.25ZM10.7803 8.78033L8.78033 10.7803C8.48744 11.0732 8.01256 11.0732 7.71967 10.7803L6.71967 9.78033C6.42678 9.48744 6.42678 9.01256 6.71967 8.71967C7.01256 8.42678 7.48744 8.42678 7.78033 8.71967L8.25 9.18934L9.71967 7.71967C10.0126 7.42678 10.4874 7.42678 10.7803 7.71967C11.0732 8.01256 11.0732 8.48744 10.7803 8.78033ZM16.75 8.5C17.1642 8.5 17.5 8.83579 17.5 9.25C17.5 9.66421 17.1642 10 16.75 10H13.25C12.8358 10 12.5 9.66421 12.5 9.25C12.5 8.83579 12.8358 8.5 13.25 8.5H16.75ZM12.5001 14.75C12.5001 14.3358 12.8358 14 13.2501 14H16.7499C17.1642 14 17.4999 14.3358 17.4999 14.75C17.4999 15.1642 17.1642 15.5 16.7499 15.5H13.2501C12.8358 15.5 12.5001 15.1642 12.5001 14.75ZM10.7803 13.2197C11.0732 13.5126 11.0732 13.9874 10.7803 14.2803L8.78033 16.2803C8.48744 16.5732 8.01256 16.5732 7.71967 16.2803L6.71967 15.2803C6.42678 14.9874 6.42678 14.5126 6.71967 14.2197C7.01256 13.9268 7.48744 13.9268 7.78033 14.2197L8.25 14.6893L9.71967 13.2197C10.0126 12.9268 10.4874 12.9268 10.7803 13.2197Z"
                            fill="#f7f7f7" />
                    </g>

                </svg>


                <span class="font-semibold text-xl tracking-tight pl-2">Task Manager</span>
            </div>
            <div class="block sm:hidden">
                <button @click="toggle"
                    class="flex items-center px-3 py-2 border rounded text-white border-teal-light hover:text-white hover:border-white">
                    <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <title>Menu</title>
                        <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                    </svg>
                </button>
            </div>
            <div :class="open ? 'block' : 'hidden'" class="w-full flex-grow sm:flex sm:items-center sm:w-auto">
                <div class="text-sm sm:flex-grow">
                    <router-link :to="{ name: 'Home' }" v-if="token == 0"
                        class="no-underline block mt-4 sm:inline-block sm:mt-0 text-white hover:text-teal-lighter mr-4">
                        Home
                    </router-link>
                    <router-link :to="{ name: 'Login' }" v-if="token == 0"
                        class="no-underline block mt-4 sm:inline-block sm:mt-0 text-white hover:text-teal-lighter mr-4">
                        Login
                    </router-link>
                    <router-link :to="{ name: 'Register' }" v-if="token == 0"
                        class="no-underline block mt-4 sm:inline-block sm:mt-0 text-white hover:text-teal-lighter mr-4">
                        Register
                    </router-link>
                    <router-link :to="{ name: 'Dashboard' }" v-if="token != 0"
                        class="no-underline block mt-4 sm:inline-block sm:mt-0 text-white hover:text-teal-lighter">
                        Dashboard
                    </router-link>
                </div>
                <div>
                    <button @click="logout" v-if="token != 0"
                        class="no-underline block mt-4 sm:inline-block sm:mt-0 text-white  text-sm  py-2   hover:text-teal-lighter mt-4 ">Log
                        out</button>
                </div>
            </div>
        </nav>
    </div>
</template>
<script>
import { ref } from 'vue'
import { useRouter } from 'vue-router';
import { UserStore } from '../store/UserStore.js';
import { mapState } from 'pinia';

export default {
    computed: {
        ...mapState(UserStore, ['token'])
    },
    setup() {
        const store = UserStore()
        const router = useRouter()
        const logout = async () => {
            store.removeUserName()
            store.removeToken()
            store.removeUserId()
            router.push({ name: 'Home' })

        }
        let open = ref(false)

        const toggle = () => {
            open.value = !open.value
        }
        return {
            open,
            toggle,
            logout
        }
    }
}
</script>
<style></style>