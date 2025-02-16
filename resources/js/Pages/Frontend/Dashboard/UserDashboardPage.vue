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
                    <div class="col-12 text-start text-sm-start">
                        <h4>Welcome !! <span class="text-info" style="font-size: 20px;">UserName</span></h4>
                    </div>
                </div>
            </div>
        </div>
    </UserDashboardLayout>
</template>

<style scoped></style>
