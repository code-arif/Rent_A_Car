<script setup>
import { Head } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import RentalListComponent from '../../../Components/Admin/Rental/RentalListComponent.vue';
</script>

<template>

    <Head>
        <title>Car Rent || Rental List</title>
    </Head>
    <AdminLayout>
        <RentalListComponent />
    </AdminLayout>
</template>

<style scoped></style>
