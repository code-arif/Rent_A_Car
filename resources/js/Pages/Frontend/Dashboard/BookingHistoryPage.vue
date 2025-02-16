<script setup>
import { Head } from '@inertiajs/vue3';
import UserDashboardLayout from '@/Layouts/UserDashboardLayout.vue';
import BookingListComponent from '../../../Components/Frontend/Dashboard/BookingListComponent.vue';
</script>

<template>

    <Head>
        <title>Car Rent || Booking History</title>
    </Head>
    <UserDashboardLayout>
        <BookingListComponent/>
    </UserDashboardLayout>
</template>

<style scoped></style>
