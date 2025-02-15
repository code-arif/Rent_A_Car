<script setup>
import { Head } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import RentDetailsComponent from '../../../Components/Admin/Rental/RentDetailsComponent.vue';
</script>

<template>

    <Head>
        <title>Car Rent || Rental Details</title>
    </Head>
    <AdminLayout>
        <RentDetailsComponent />
    </AdminLayout>
</template>

<style scoped></style>
