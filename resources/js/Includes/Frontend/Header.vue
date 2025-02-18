<script setup>
import { Link, usePage } from '@inertiajs/vue3';
const authUser = usePage().props.authCustomer.customer;
</script>

<template>
    <header class="header-section bg-dark">
        <div class="header-bottom">
            <div class="container">
                <nav class="navbar navbar-expand-lg p-0">
                    <Link href="" class="navbar-brand">
                    <h3 class="text-light"><i class="fa fa-car" style="margin-right: 5px;"></i>Car Rent</h3>
                    </Link>

                    <div class="collapse navbar-collapse">
                        <ul class="navbar-nav main-menu m-auto">
                            <li class="nav-item">
                                <Link :href="route('show.home')">Home</Link>
                            </li>
                            <li>
                                <Link :href="route('car.page')">Cars</Link>
                            </li>
                            <li>
                                <Link :href="route('show.about')">About</Link>
                            </li>
                            <li>
                                <Link :href="route('show.contact')">contact us</Link>
                            </li>
                        </ul>
                        <div class="header-action d-flex align-items-center justify-content-between">
                            <Link v-if="authUser" :href="route('show.user.profile', {id:authUser.id})" class="cmn-outline-btn uppercase mr-3">Dashboard</Link>
                            <Link v-if="authUser" :href="route('user.logout')" class="cmn-btn uppercase">Logout</Link>
                            <Link v-if="!authUser" :href="route('show.user.login')" class="cmn-btn uppercase">LOG IN</Link>
                        </div>
                    </div>
                </nav>
            </div>
        </div><!-- header-bottom end -->
    </header>
</template>

<style scoped>
.header_nav{
    color: red;
    /* border-bottom: 1px solid red; */
}
</style>
