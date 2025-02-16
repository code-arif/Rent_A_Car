<script setup>
import { Head, usePage } from '@inertiajs/vue3';
import AdminLayout from '../../Layouts/AdminLayout.vue';

const list = usePage();
const car_count = list.props.car_count;
const customer_count = list.props.customer_count;
const rent_count = list.props.rent_count;
const total_earning = list.props.total_earning;
</script>

<template>

    <Head>
        <title>Car Rent || Admin Dashboard</title>
    </Head>
    <AdminLayout>
        <div class="container-fluid pt-4 px-4">
            <div class="rounded-top p-4" style="border: 1px solid #ddd;">
                <div class="row">
                    <div class="col-12 text-start text-sm-start">
                        <h3>Welcome to Admin Dashboard</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4" style="border: 1px solid #ddd;">
                        <i class="fa fa-car fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">Total Cars</p>
                            <h6 class="mb-0">{{ car_count }}</h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4" style="border: 1px solid #ddd;">
                        <i class="fa fa-dollar-sign fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">Total Customer</p>
                            <h6 class="mb-0">{{ customer_count }}</h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4" style="border: 1px solid #ddd;">
                        <i class="fa fa-shopping-cart fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">Total Rent</p>
                            <h6 class="mb-0">{{ rent_count }}</h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4" style="border: 1px solid #ddd;">
                        <i class="fa fa-users fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">Total Earning</p>
                            <h6 class="mb-0">{{ total_earning }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>

<style scoped></style>
