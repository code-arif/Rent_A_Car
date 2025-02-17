<script setup>
import { Link, usePage, Head } from '@inertiajs/vue3';
const authUser = usePage().props.authCustomer.customer;
</script>

<template>

    <Head>
        <title>Car Rent || Successful</title>
    </Head>

    <div class="container text-center mt-5">
        <img src="https://i.pinimg.com/originals/90/13/f7/9013f7b5eb6db0f41f4fd51d989491e7.gif" alt="Order Success"
            class="img-fluid mt-4" style="max-width: 250px;">

        <h3 class="text-success mt-5">Rent Completed Successfully!</h3>

        <div class="mt-5">
            <Link :href="route('show.booking.history', {id:authUser.id})" class="cmn-btn">Track Your Rent</Link>
        </div>
    </div>

</template>

<style scoped></style>
