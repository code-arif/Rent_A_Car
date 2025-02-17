<script setup>
import { ref } from 'vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { usePage, Head, Link, useForm, router } from '@inertiajs/vue3';
const authUser = usePage().props.authCustomer.customer;

const list = usePage();

const cars = ref(list.props.cars);
const car_details = list.props.car_details || [];

const imagePreview = ref(
    car_details?.image ? `/storage/${car_details?.image}` : 'https://skala.or.id/wp-content/uploads/2024/01/dummy-post-square-1-1.jpg'
);

// =====================rent create functionality========================//
const form = useForm({
    car_id: car_details.id,
    start_date: "",
    end_date: "",
    total_cost: "",
    status: "",
    pickup_location: "",
    drop_off_location: "",
    pickup_time: "",
    drop_off_time: "",
});

const createRent = () => {
    form.post(route('create.rent'), {
        onSuccess: () => {
            if (list.props.flash.status === true) {
                successToast(list.props.flash.message);
                router.visit(route('rental.success'));
            } else if (!authUser) {
                errorToast('Please login to rent a car');
            } else {
                errorToast(list.props.flash.message);
            }
        },
        onError: (errors) => {
            if (errors.user_id) {
                errorToast(errors.user_id);
            } else if (errors.car_id) {
                errorToast(errors.car_id);
            } else if (errors.start_date) {
                errorToast(errors.start_date);
            } else if (errors.end_date) {
                errorToast(errors.end_date);
            } else if (errors.status) {
                errorToast(errors.status);
            } else if (errors.pickup_location) {
                errorToast(errors.pickup_location);
            } else if (errors.drop_off_location) {
                errorToast(errors.drop_off_location);
            } else if (errors.pickup_time) {
                errorToast(errors.pickup_time);
            } else if (errors.drop_off_time) {
                errorToast(errors.drop_off_time);
            }
            else {
                errorToast('An error occurred');
            }
        }

    });
};
</script>

<template>

    <Head>
        <title>Car Rent || Reservation</title>
    </Head>
    <GuestLayout>
        <!-- inner-apge-banner start -->
        <section class="inner-page-banner bg_img overlay-3"
            style="background-image: url('https://images.unsplash.com/photo-1613214149922-f1809c99b414?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-title">reservation</h2>
                        <ol class="page-list">
                            <li>
                                <Link :href="route('show.home')"><i class="fa fa-home"></i> Home</Link>
                            </li>
                            <li>
                                <Link :href="route('car.page')">car list</Link>
                            </li>
                            <li>reservation</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <!-- inner-apge-banner end -->

        <!-- reservation-section start -->
        <section class="reservation-section pt-120 pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="reservation-details-area">
                            <div class="thumb">
                                <img :src="imagePreview" alt="images" style="height: 400px; width: 100%;">
                            </div>
                            <div class="content">
                                <div class="content-block">
                                    <h3 class="car-name">{{ car_details.name }}</h3>
                                    <p> Start form <span class="text-danger">{{ car_details.daily_rent_price }}/-
                                            BDT</span> per day </p>
                                    <p>{{ car_details.detail?.description }}</p>
                                </div>
                                <form class="reservation-form" @submit.prevent="createRent()">
                                    <div class=" content-block">
                                        <h3 class="title">Car Specifications</h3>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <ul>
                                                    <li><span class="text-primary">Seat:</span> {{
                                                        car_details.detail?.seats ?? "N/A" }}</li>
                                                    <li><span class="text-primary">Fule Type:</span> {{
                                                        car_details.detail?.fuel_type ?? "N/A" }}</li>
                                                    <li><span class="text-primary">Mileage:</span> {{
                                                        car_details.detail?.mileage ?? "N/A" }} Km/L</li>
                                                    <li><span class="text-primary">Gear Transmission:</span> {{
                                                        car_details.detail?.transmission ?? "N/A" }} </li>
                                                </ul>
                                            </div>

                                            <div class="col-lg-6">
                                                <ul>
                                                    <li><span class="text-primary">AC:</span> {{
                                                        car_details.detail?.air_conditioning === 1 ? "YES" : "NO" }}
                                                    </li>
                                                    <li><span class="text-primary">GPS:</span> {{
                                                        car_details.detail?.gps === 1 ? "YES" : "NO" }}
                                                    </li>
                                                    <li><span class="text-primary">Bluetooth:</span> {{
                                                        car_details.detail?.bluetooth === 1 ? "YES" : "NO" }}
                                                    </li>
                                                    <li><span class="text-primary">USB Port:</span> {{
                                                        car_details.detail?.usb_port === 1 ? "YES" : "NO" }}
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="pickup_location">Pickup Location</label>
                                                <input class="form-control has-icon" type="text"
                                                    placeholder="Pickup Location" v-model="form.pickup_location">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="drop_location">Drop Off Location</label>
                                                <input class="form-control has-icon" type="text"
                                                    placeholder="Drop Off Location" v-model="form.drop_off_location">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="start_date">Start Date</label>
                                                <input type='date' class='form-control' placeholder="Start Date"
                                                    v-model="form.start_date">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="end_date">End Date</label>
                                                <input type='date' class='form-control from-date' placeholder="End Date"
                                                    v-model="form.end_date">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="start_time">Pickup Time</label>
                                                <input type="text" class="form-control" placeholder="Pickup Time"
                                                    v-model="form.pickup_time">
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="end_time">Drop Off Time</label>
                                                <input type="text" class="form-control" placeholder="Drop Off Time"
                                                    v-model="form.drop_off_time">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="content-block">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <button type="reset" class="cmn-btn bg-black">Cancel</button>
                                                <button type="submit" class="cmn-btn">reservation</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <aside class="sidebar">
                            <div class="widget widget-all-cars">
                                <h4 class="widget-title">Our Latest Cars</h4>
                                <ul class="cars-list">
                                    <li v-for="(car, index) in cars" :key="car.id">
                                        <Link :href="route('show.car.details', { id: car.id })">{{ car.name
                                        }}-(Daily:-{{
                                            car.daily_rent_price }}/-BDT)</Link>
                                    </li>
                                </ul>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </section>
        <!-- reservation-section end -->

    </GuestLayout>
</template>

<style scoped></style>
