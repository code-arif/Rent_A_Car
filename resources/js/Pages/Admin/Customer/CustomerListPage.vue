<script setup>
import { Head } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import CustomerListComponent from '../../../Components/Admin/CustomerListComponent.vue';
</script>

<template>

    <Head>
        <title>Car Rent || Customer List</title>
    </Head>
    <AdminLayout>
        <CustomerListComponent />
    </AdminLayout>
</template>

<style scoped></style>
