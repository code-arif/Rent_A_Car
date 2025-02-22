<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head } from '@inertiajs/vue3';
import CarDetailsComponent from '../../Components/Frontend/Car/CarDetailsComponent.vue';
</script>

<template>

    <Head>
        <title>Car Rent || Reservation</title>
    </Head>

    <GuestLayout>
        <CarDetailsComponent/>
    </GuestLayout>
</template>

<style scoped></style>
