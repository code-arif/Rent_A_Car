<script setup>
import { Head } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import SaveCarDetailsComponent from '../../../Components/Admin/Car/SaveCarDetailsComponent.vue';
</script>

<template>

    <Head>
        <title>Car Rent || Car Details</title>
    </Head>
    <AdminLayout>
        <SaveCarDetailsComponent />
    </AdminLayout>
</template>

<style scoped></style>
