<script setup>
import { usePage, useForm, Link, router } from '@inertiajs/vue3';
const list = usePage();
const car_for_rent = list.props.car_for_rent;
const authUser = usePage().props.authCustomer.customer;

//=============================create rent ================================//
const form = useForm({
    id: null,
    user_id: "",
    car_id: "",
    start_date: "",
    end_date: "",
    total_cost: "",
    status: "",
    pickup_location: "",
    drop_off_location: "",
    pickup_time: "",
    drop_off_time: "",
});

const saveRent = () => {
    form.post(route('create.rent'), {
        onSuccess: () => {
            if (list.props.flash.status === true) {
                successToast(list.props.flash.message);
                form.reset();
                router.visit(route('rental.success'));
            } else if (!authUser) {
                errorToast('Please login to rent a car');
            }
            else {
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
    <!-- banner-section start  -->
    <section class="banner-section banner-section--style2 bg_img banner-image">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="car-search-area mt-0">
                        <h3 class="title">Search for Your Car</h3>
                        <form class="car-search-form" @submit.prevent="saveRent">
                            <div class="row">
                                <div class="col-xl-12 form-group">
                                    <select class="form-select" v-model="form.car_id" required>
                                        <option value="" disabled>Select Car</option>
                                        <option v-for="car in car_for_rent" :key="car.id" :value="car.id">
                                            {{ car.name }} - {{ car.model }} ({{ car.daily_rent_price }}/- per day)
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-xl-6">
                                    <i class="fa fa-map-marker"></i>
                                    <input class="form-control has-icon" type="text" placeholder="Pickup Location"
                                        v-model="form.pickup_location">
                                </div>
                                <div class="form-group col-xl-6">
                                    <i class="fa fa-map-marker"></i>
                                    <input class="form-control has-icon" type="text" placeholder="Drop Off Location"
                                        v-model="form.drop_off_location">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-xl-6">
                                    <input type='date' class='form-control' v-model="form.start_date">
                                </div>
                                <div class="form-group col-xl-6">
                                    <input type="date" class="form-control" v-model="form.end_date">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-xl-6">
                                    <input type='text' class='form-control' placeholder="Pick up Time"
                                        v-model="form.pickup_time">
                                </div>
                                <div class="form-group col-xl-6">
                                    <input type="text" class="form-control" placeholder="Drop Off Time"
                                        v-model="form.drop_off_time">
                                </div>
                            </div>
                            <button type="submit" class="cmn-btn">Reservation</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="banner-content">
                        <h1 class="title">find your own car</h1>
                        <p>Lorem ipsum dolor sit amet, congue placerat nec. Leo faubus sed eleifend bibendum neque
                            vehiculanulla. Lorem ipsum dolor sit amet, congue placerat nec. Leo faubus sed eleifend
                            bibendum
                            neque vehiculanulla.</p>
                        <Link :href="route('car.page')" class="cmn-btn">see all cars</Link>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner-section end  -->
</template>

<style scoped></style>
