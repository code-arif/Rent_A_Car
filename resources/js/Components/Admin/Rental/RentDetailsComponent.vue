<script setup>
import { Link, usePage } from '@inertiajs/vue3';
import { ref } from 'vue';

const list = usePage();

const rental_details = list.props.rental_details || {};

const imagePreview = ref(
    rental_details.car?.image ? `/storage/${rental_details.car?.image}` : 'https://skala.or.id/wp-content/uploads/2024/01/dummy-post-square-1-1.jpg'
);

</script>

<template>
    <!-- bradecrumb start -->
    <div class="container-fluid pt-4 px-4">
        <div class="rounded-top p-4" style="border: 1px solid #ddd;">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto">
                    <h4>Rental Details</h4>
                </div>
                <div>
                    <Link :href="route('show.rental.list')" class="cmn-btn"> Back to list</Link>
                </div>
            </div>
        </div>
    </div>
    <!-- bradecrumb end -->

    <!-- rent list start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4 mb-3">
            <!-- Car Details Section -->
            <div class="col-sm-12 col-xl-6">
                <div class="rounded p-4" style="border: 1px solid #ddd;">
                    <div class="d-flex justify-content-between mb-3 align-item-center">
                        <div>
                            <h6>Car Details</h6>
                        </div>
                    </div>

                    <div>
                        <div class="card mb-3">
                            <div style="display: flex; align-items: center; gap: 15px;">
                                <img :src="imagePreview" alt="Product Image"
                                    style="width: 150px; height: 150px; object-fit: cover;">
                                <div>
                                    <h5 style="margin-bottom: 5px;"><strong>Car Name:</strong> <span class="text-info"
                                            style="font-size: 22px;">{{ rental_details.car.name }}</span></h5>
                                    <p style="margin: 0;">Daily Rent Price: <span class="text-info">{{
                                        rental_details.car.daily_rent_price }}</span></p>
                                    <p style="margin: 0;">Brand: <span class="text-info">{{ rental_details.car.brand
                                    }}</span></p>
                                    <p style="margin: 0;">Model: <span class="text-info">{{ rental_details.car.model
                                    }}</span></p>
                                    <p style="margin: 0;">Year: <span class="text-info">{{ rental_details.car.year
                                    }}</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Rent Details Section -->
            <div class="col-sm-12 col-xl-6">
                <div class="rounded p-4" style="border: 1px solid #ddd;">
                    <div class="d-flex justify-content-between mb-3 align-item-center">
                        <div>
                            <h6>Rent Details</h6>
                        </div>
                    </div>
                    <hr>
                    <div>
                        <div class="mb-3">
                            <div style="display: flex; align-items: center; gap: 15px;">
                                <div>
                                    <h5 style="margin-bottom: 5px;"><strong>Customer Name:</strong> <span
                                            class="text-info" style="font-size: 22px;">{{ rental_details.user?.name ||
                                            rental_details.name }}</span></h5>
                                    <p style="margin: 0;">Cutomer Phone: <span class="text-info">{{
                                        rental_details.user?.phone || rental_details.phone }}</span></p>
                                    <p style="margin: 0;">Cutomer Email: <span class="text-info">{{
                                        rental_details.user?.email ?? "N/A" }}</span></p>

                                    <p style="margin: 0;">Start Date: <span class="text-info">{{
                                        rental_details.start_date
                                            }}</span></p>
                                    <p style="margin: 0;">End Date: <span class="text-info">{{ rental_details.end_date
                                    }}</span></p>
                                    <p style="margin: 0;">Total Cost: <span class="text-danger">{{
                                        rental_details.total_cost
                                            }}</span></p>
                                    <p style="margin: 0;">Pickup Location: <span class="text-info">{{
                                        rental_details?.pickup_location ?? "N/A"
                                            }}</span></p>
                                    <p style="margin: 0;">Drop off Location: <span class="text-info">{{
                                        rental_details?.drop_off_location ?? "N/A"
                                            }}</span></p>
                                    <p style="margin: 0;">Pick up Time: <span class="text-info">{{
                                        rental_details?.pickup_time ?? "N/A"
                                            }}</span></p>
                                    <p style="margin: 0;">Total Cost: <span class="text-info">{{
                                        rental_details?.drop_off_time ?? "N/A"
                                            }}</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped></style>
