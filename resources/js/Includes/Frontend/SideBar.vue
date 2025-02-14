<script setup>
import { Link, usePage } from '@inertiajs/vue3';
const authUser = usePage().props.authCustomer.customer;
</script>

<template>
    <div class="sidebar1 pe-4 pb-3">
        <nav class="navbar navbar-secondary">
            <Link href="" class="navbar-brand mx-4 mb-3">
            <h3 class="text-light"><i class="fa fa-car" style="margin-right: 5px;"></i>Car Rent</h3>
            </Link>
            <div class="d-flex align-items-center ms-4 mb-4">
                <div class="position-relative">
                    <img class="rounded-circle"
                        src="https://www.kindpng.com/picc/m/78-786678_avatar-hd-png-download.png" alt=""
                        style="width: 40px; height: 40px; margin-right: 10px;">
                </div>
                <div class="ms-3" v-if="authUser">
                    <h6 class="mb-0 text-light">{{ authUser.name }}</h6>
                    <span>{{ authUser.role }}</span>
                </div>
            </div>
            <div class="navbar-nav w-100">
                <a href="" class="nav-item nav-link active"><i class="fa fa fa-laptop" style="margin-right: 5px;"></i>Dashboard</a>
            </div>
            <div class="navbar-nav w-100" v-if="authUser">
                <a :href="route('user.logout')" class="nav-item nav-link"><i class="fa fa-minus-square" style="margin-right: 5px;"></i>Logout</a>
            </div>
        </nav>

    </div>

</template>

<style scoped></style>
