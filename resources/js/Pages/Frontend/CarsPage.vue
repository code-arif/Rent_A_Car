<script setup>
import { Head } from '@inertiajs/vue3';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import CarComponent from '../../Components/Frontend/Car/CarsComponent.vue';
</script>

<template>

    <Head>
        <title> Car Rent || Cars</title>
    </Head>
    <GuestLayout>
        <CarComponent />
    </GuestLayout>
</template>

<style scoped></style>

