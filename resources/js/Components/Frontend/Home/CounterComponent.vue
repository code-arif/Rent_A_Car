<script setup>
import { usePage } from '@inertiajs/vue3';
const list = usePage();
const car_count = list.props.car_count || [];
const customer_count = list.props.customer_count || [];
</script>

<template>
    <div class="counter-section bg_img overlay-main"
        style="background-image: url('https://images.pexels.com/photos/170811/pexels-photo-170811.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2');">
        <div class="container">
            <div class="row mb-none-30">
                <div class="col-lg-6 col-sm-6">
                    <div class="counter-item counter-item--style2">
                        <div class="icon">
                            <i class="fa fa-car"></i>
                        </div>
                        <div class="content">
                            <span class="counter">{{ car_count }}</span>
                            <span class="title">total car</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6">
                    <div class="counter-item counter-item--style2">
                        <div class="icon">
                            <i class="fa fa-users"></i>
                        </div>
                        <div class="content">
                            <span class="counter">{{ customer_count }}</span>
                            <span class="title">happy customer</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped></style>
