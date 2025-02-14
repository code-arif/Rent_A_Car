<script setup>
import { Head } from '@inertiajs/vue3';
import UserDashboardLayout from '@/Layouts/UserDashboardLayout.vue';
</script>

<template>

    <Head>
        <title>Car Rent || User Dashboard</title>
    </Head>
    <UserDashboardLayout>
        <div class="container-fluid pt-4 px-4">
            <div class="rounded-top p-4" style="border: 1px solid #ddd;">
                <div class="row">
                    <div class="col-12 col-sm-6 text-center text-sm-start">
                        &copy; <a href="#">Your Site Name</a>, All Right Reserved.
                    </div>
                    <div class="col-12 col-sm-6 text-center text-sm-end">
                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        Designed By <a href="https://htmlcodex.com">HTML Codex</a>
                        </br>
                        Distributed By <a class="border-bottom" href="https://themewagon.com"
                            target="_blank">ThemeWagon</a>
                    </div>
                </div>
            </div>
        </div>
    </UserDashboardLayout>
</template>

<style scoped></style>
