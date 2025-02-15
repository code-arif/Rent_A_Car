<script setup>
import { Link, usePage } from '@inertiajs/vue3';
const authUser = usePage().props.auth.user;
</script>

<template>
    <div class="sidebar1 pe-4 pb-3">
        <nav class="navbar navbar-secondary">
            <Link href="" class="navbar-brand mx-4 mb-3">
            <h3 class="text-light"><i class="fa fa-car" style="margin-right: 5px;"></i>Car Rent</h3>
            </Link>
            <div class="d-flex align-items-center ms-4 mb-2">
                <div class="position-relative">
                    <img class="rounded-circle"
                        src="https://www.kindpng.com/picc/m/78-786678_avatar-hd-png-download.png" alt=""
                        style="width: 40px; height: 40px; margin-right: 10px;">
                </div>
                <div class="ms-3">
                    <h6 class="mb-0 text-white">{{ authUser.name }}</h6>
                    <span>{{ authUser.role }}</span>
                </div>
            </div>

            <div class="mb-4" style="height: 1px; width: 100%; background: white;"></div>


            <div class="navbar-nav w-100">
                <Link :href="route('show.admin.dashboard')" class="nav-item nav-link" :class="{ 'active': $page.url === '/admin/dashboard'}"><i class="fa fa fa-laptop"
                        style="margin-right: 5px;"></i>Dashboard</Link>
            </div>
            <div class="navbar-nav w-100">
                <Link :href="route('show.car.list')" class="nav-item nav-link" :class="{ 'active': $page.url === '/car/list' }"><i class="fa fa fa-car"
                        style="margin-right: 5px;"></i>Car</Link>
            </div>
            <div class="navbar-nav w-100">
                <Link :href="route('show.customer.list')" class="nav-item nav-link" :class="{'active': $page.url === '/customer/list'}"><i class="fa fa fa-users"
                        style="margin-right: 5px;"></i>Customer</Link>
            </div>
            <div class="navbar-nav w-100">
                <a :href="route('show.rental.list')" class="nav-item nav-link" :class="{'active': $page.url === '/rental/list'}"><i class="fa fa fa-key"
                        style="margin-right: 5px;"></i>Rent</a>
            </div>
            <div class="navbar-nav w-100">
                <Link :href="route('admin.logout')" class="nav-item nav-link"><i class="fa fa-minus-square"
                        style="margin-right: 5px;"></i>Logout</Link>
            </div>
        </nav>

    </div>

</template>

<style scoped></style>
