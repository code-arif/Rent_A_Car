<script setup>
import SideBar from '../Includes/Frontend/SideBar.vue';
</script>

<template>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <SideBar />
        <div class="content1">
            <slot>

            </slot>
        </div>
    </div>
</template>

<style scoped></style>
