<script setup>
import SideBar from '../Includes/Admin/SideBar.vue';
import Navbar from '../Includes/Admin/Navbar.vue';
</script>

<template>
    <div class="position-relative bg-white d-flex p-0">

        <SideBar />
        <!-- Content Start -->
        <div class="content1">
            <slot>

            </slot>
        </div>
    </div>
</template>

<style scoped></style>
