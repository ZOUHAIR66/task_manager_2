<template >
    <div class="flex justify-between items-center">
        <span class="font-light text-gray-600">@{{ name }}</span>
        <button class="px-2 py-1 bg-blue-500 text-gray-100 font-bold rounded hover:bg-gray-500" v-if="data.completed == 0"
            @click.stop="update(data.id)">Not Completed</button>
        <button class="px-2 py-1  text-gray-100 font-bold rounded bg-gray-500" v-else :disabled="true">
            
            Completed
        </button>
    </div>
    <div class="mt-2">
        <a class="text-2xl text-gray-700 font-bold hover:text-gray-600 break-words">{{ data.task_name }}</a>
        <p class="mt-2 text-gray-600 break-words">{{ data.task_description }}</p>
    </div>
    <div class="flex justify-between items-center mt-4">
        <a class="text-blue-600 hover:underline" @click.stop="destroy(data.id)">
            <i class="material-icons text-sky-950 text-3xl  cursor-pointer">delete_forever</i>
        </a>
        <div>
            <h1 class="text-gray-700 font-bold">{{ formatTimestamp(data.created_at) }}</h1>
            <a class="flex items-center">

            </a>
        </div>
    </div>
</template>
<script>
import axios from 'axios';
import { UserStore } from '@/store/UserStore.js';
import { mapState } from 'pinia';
import dayjs from 'dayjs'
export default {
    name: 'TaskList',
    props: ['data'],
    computed: {
        ...mapState(UserStore, ['name'])
    },
    setup() {
        const store = UserStore()

        const formatTimestamp = (timestamp) => {
            return dayjs(timestamp).format('YYYY-MM-DD HH:mm');
        }
        const update = async (id) => {
            const result = await axios.put('api/update/' + id);
            store.getTasks()
        }
        const destroy = async (id) => {
            const result = await axios.delete('api/destroy/' + id);
            store.getTasks()
        }

        return {
            update,
            destroy,
            store,
            formatTimestamp
        }
    }
}
</script>
<style ></style>