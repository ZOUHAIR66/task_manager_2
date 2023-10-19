<template>
    <div>
        <div>

            <div>
                <button
                    class="mt-5 bg-blue-500 text-white active:bg-blue-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                    type="button" v-on:click="toggleModal">
                    Add New Task
                </button>
            </div>


            <div v-if="showModal"
                class="overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center flex">
                <div class="relative w-auto my-6 mx-auto max-w-sm">
                    <!--content-->
                    <div
                        class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
                        <!--header-->
                        <div class="  pt-5 pb-5 border-b border-solid border-blueGray-200 rounded-t">
                            <h3 class="text-3xl font-semibold text-center text-gray-700 ">
                                New Task
                            </h3>

                        </div>
                        <!--body-->
                        <div class="relative p-6 flex-auto">



                            <form class=" px-2   mb-4" @submit.prevent="addTask">
                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2 text-left" for="">
                                        Task Title
                                    </label>

                                    <div class="flex items-center border-2 py-2 px-3 mb-4">

                                        <input class="pl-2 outline-none border-none text-gray-700" type="text" name="" id=""
                                            placeholder="Title" v-model="form.task_name"/>
                                    </div>

                                </div>
                                <div class="mb-6">
                                    <label class="block text-gray-700 text-sm font-bold mb-2 text-left" for="">
                                        Task Description
                                    </label>
                                    <div class="flex items-center border-2 py-2 px-3  mb-4">

                                        <textarea class="pl-2 outline-none border-none text-gray-700" type="text" name=""
                                            id="" placeholder="Description" v-model="form.task_description"></textarea>
                                    </div>

                                </div>
                                <div class="flex items-center justify-between">
                                    <button
                                        class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mx-2"
                                        type="button" v-on:click="toggleModal">
                                        Close
                                    </button>
                                    <button
                                        class="background-transparent   text-blue-500 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                        type="submit">
                                        Add
                                    </button>

                                </div>

                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <div v-if="showModal" class="opacity-25 fixed inset-0 z-40 bg-black"></div>



        </div>




    </div>
</template>
<script>
import { ref, reactive } from 'vue';
import { UserStore } from '@/store/UserStore.js';

export default {
    setup() {
        const store = UserStore();
        
        let form = reactive({
            task_name:'',
            task_description:'',
            user_id:store.user_id
        })


        const addTask = async ()=>{
            const result = await axios.post('http://127.0.0.1:8000/api/store', form)
            if (result.data.success) {
                form.task_name=''
                form.task_description=''
                store.getTasks()
            }

        }

        let showModal = ref(false)
        const toggleModal = () => { 
            showModal.value = !showModal.value
        }

        return {
            showModal,
            toggleModal,
            addTask,
            form
        }
    },

}
</script>
<style scoped></style>