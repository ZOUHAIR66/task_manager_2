<template>
    <div>
        <Navbar />
        <router-view></router-view>
        <Footer  />
    </div>
</template>
<script>
import Navbar from './Layouts/Navbar.vue';
import Footer from './Layouts/Footer.vue';

import { ref, onMounted, onUnmounted } from 'vue'

export default {
    name: 'App',
    components: {
        Navbar,
        Footer
    },
    setup() {

  
    }



}
</script>
<style ></style>