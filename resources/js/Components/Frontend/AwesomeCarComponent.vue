<script setup>
import { usePage } from '@inertiajs/vue3';

const list = usePage();
const cars = list.props.cars || [];
</script>

<template>
    <!-- choose-car-section start -->
    <section class="choose-car-section pt-120 pb-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-header text-center">
                        <h2 class="section-title">our awsome car in here</h2>
                        <p> Augue urna molestie mi adipiscing vulputate pede sedmassa Praesquam massa, sodales velit
                            turpis
                            in tellu.</p>
                    </div>
                </div>
            </div>
            <div class="row mb-none-30">
                <div class="col-lg-6" v-for="car in cars" :key="car.id">
                    <div class="car-item car-item--style2">
                        <div class="thumb bg_img bg-cover">
                            <img :src=" car?.image ? `/storage/${car?.image}` : 'https://skala.or.id/wp-content/uploads/2024/01/dummy-post-square-1-1.jpg'" alt="car image" style="width: 220px; height: 300px; object-fit: cover;">
                        </div>
                        <div class="car-item-body">
                            <div class="content">
                                <h4 class="title">{{ car.name }}</h4>
                                <span class="price">start form {{ car.daily_rent_price }}/-BDT per day</span>
                                <p>Aliquam sollicitudin dolores tristiquvel ornare, vitae aenean.</p>
                                <a href="#0" class="cmn-btn">rent car</a>
                            </div>
                            <div class="car-item-meta">
                                <ul class="details-list">
                                    <li><i class="fa fa-car"></i>model 2014ib</li>
                                    <li><i class="fa fa-tachometer"></i>32000 KM</li>
                                </ul>
                            </div>
                        </div>
                    </div><!-- car-item end -->
                </div>
            </div>
        </div>
    </section>
    <!-- choose-car-section end -->
</template>

<style scoped></style>
