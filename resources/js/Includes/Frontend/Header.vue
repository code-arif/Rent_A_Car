<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <header class="header-section header-section--style2 bg-dark">
        <div class="header-bottom">
            <div class="container">
                <nav class="navbar navbar-expand-lg p-0">
                    <Link class="site-logo site-title" :href="route('show.home')" style="text-decoration: none; font-size: 30px; color: red; border:1px solid #da1c36; padding: 3px 8px; "> CAR RENT </Link>

                    <div class="collapse navbar-collapse">
                        <ul class="navbar-nav main-menu m-auto">
                            <li><Link :href="route('show.home')">Home</Link> </li>
                            <li><Link :href="route('car.page')">Cars</Link> </li>
                            <li><Link :href="route('show.about')">About</Link> </li>
                            <li><Link :href="route('show.contact')">contact us</Link></li>
                        </ul>
                        <div class="header-action d-flex align-items-center justify-content-between">
                            <Link href="" class="cmn-btn uppercase d-none">MAKE YOUR RESERVATION</Link>
                            <Link :href="route('show.user.login')" class="cmn-btn uppercase">LOG IN</Link>
                        </div>
                    </div>
                </nav>
            </div>
        </div><!-- header-bottom end -->
    </header>
</template>

<style scoped></style>
