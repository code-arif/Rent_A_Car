<script setup>
import { Head } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import Add_Edit_CarComponent from '../../../Components/Admin/Car/Add_Edit_CarComponent.vue';
</script>

<template>

    <Head>
        <title>Car Rent || Add/Edit Car</title>
    </Head>
    <AdminLayout>
        <Add_Edit_CarComponent />
    </AdminLayout>
</template>

<style scoped></style>
