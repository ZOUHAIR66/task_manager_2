<template>
    <div>
    
            <!-- Section: Design Block -->
            <section class="background-radial-gradient mb-10 text-center lg:text-left">
                <div
                    class="relative overflow-hidden bg-cover bg-no-repeat bg-[50%] bg-[url('https://mdbcdn.b-cdn.net/img/new/standard/nature/071.jpg')] h-[500px]">
                    <div
                        class="absolute top-0 right-0 bottom-0 left-0 h-full w-full overflow-hidden bg-[hsla(0,0%,0%,0.75)] bg-fixed">
                        <div class="flex h-full items-center justify-center">
                            <div class="max-w-[800px] px-6 py-6 text-center text-white md:py-0 md:px-12">
                                <h2 class="mb-12 text-5xl font-bold leading-tight tracking-tight md:text-6xl xl:text-7xl">
                                    Welcome to Task Manager <br /><span>{{name}}</span>
                                </h2>
                                <p class="text-lg">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Minima officia consequatur adipisci tenetur repudiandae rerum
                                    quos.
                                </p>
                                <div><TaskForm /></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <h1 class="text-2xl text-center mb-10">Tasks to Do</h1>
            <div class="grid sm:grid-cols-4 grid-cols-1 gap-4 md:px-2 mb-4">

            <div class="max-w-4xl px-10 my-4 py-6 bg-white rounded-lg shadow-md container mx-auto" v-for="data in store.tasks" :key="data.id">
                <TaskList  :data="data"/>
            </div>
            </div>
            
    </div>
</template>
<script>
import TaskForm from './Tasks/TaskForm.vue';
import TaskList from './Tasks/TaskList.vue';
import { UserStore } from '../store/UserStore.js';
import { mapState } from 'pinia';

export default {
    name: 'Dashboard',
    components:{
        TaskList,
        TaskForm
    },
    computed:{
        ...mapState(UserStore,['name'])
    },
    setup() {
        const store = UserStore()
        store.getTasks()
              
        return{
            store,     
        }

    }
}
</script>
<style></style>