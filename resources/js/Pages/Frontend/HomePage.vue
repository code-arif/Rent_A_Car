<script setup>
import { Head } from '@inertiajs/vue3';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import HeroComponent from '../../Components/Frontend/HeroComponent.vue';
import AwesomeCarComponent from '../../Components/Frontend/AwesomeCarComponent.vue';

</script>

<template>
    <Head>
        <title> Car Rent || Home</title>
    </Head>

    <GuestLayout>
        <HeroComponent />
        <AwesomeCarComponent />
    </GuestLayout>
</template>

<style scoped></style>
