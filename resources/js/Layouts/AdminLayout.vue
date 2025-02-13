<script setup>
import SideBar from '../Includes/Admin/SideBar.vue';
import Navbar from '../Includes/Admin/Navbar.vue';
</script>

<template>
    <div class="position-relative bg-white d-flex p-0">

        <SideBar />
        <!-- Content Start -->
        <div class="content">
            <Navbar />
            <slot>

            </slot>
        </div>
        <!-- Back to Top -->
        <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>
    </div>
</template>

<style scoped></style>
