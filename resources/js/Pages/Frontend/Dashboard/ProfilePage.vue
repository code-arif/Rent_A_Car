<script setup>
import { Head } from '@inertiajs/vue3';
import UserDashboardLayout from '@/Layouts/UserDashboardLayout.vue';
import ProfileComponent from '../../../Components/Frontend/Dashboard/ProfileComponent.vue';
</script>

<template>

    <Head>
        <title>Car Rent || Profile</title>
    </Head>
    <UserDashboardLayout>
        <ProfileComponent />
    </UserDashboardLayout>
</template>

<style scoped></style>
