<script setup>
import { ref, computed } from "vue";
import { Link, usePage, useForm } from "@inertiajs/vue3";

const list = usePage();
const car = list.props.car || {};
const car_details = list.props.car_details || [];

const form = useForm({
    car_id: car.id || null,
    short_description: car_details.short_description || "",
    description: car_details.description || "",
    seats: car_details.seats || "",
    fuel_type: car_details.fuel_type || "",
    mileage: car_details.mileage || "",
    transmission: car_details.transmission || "",
    air_conditioning: car_details.air_conditioning === 1 ? true : false,
    gps: car_details.gps === 1 ? true : false,
    bluetooth: car_details.bluetooth === 1 ? true : false,
    usb_port: car_details.usb_port === 1 ? true : false,
});

function saveCarDetails() {
    const routeName = car_details.id ? "update.car.details" : "save.car.details";
    form.post(route(routeName), {
        onSuccess: () => {
            if (list.props.flash.status === true) {
                successToast(list.props.flash.message);
                form.reset();
            } else {
                errorToast(list.props.flash.message);
            }
        },
        onError: (errors) => {
            if (errors.car_id) {
                errorToast(errors.car_id);
            } else if (errors.short_description) {
                errorToast(errors.short_description);
            } else if (errors.description) {
                errorToast(errors.description);
            } else if (errors.seats) {
                errorToast(errors.seats);
            } else if (errors.fuel_type) {
                errorToast(errors.fuel_type);
            } else if (errors.mileage) {
                errorToast(errors.mileage);
            } else if (errors.transmission) {
                errorToast(errors.transmission);
            } else if (errors.air_conditioning) {
                errorToast(errors.air_conditioning);
            } else if (errors.gps) {
                errorToast(errors.gps);
            } else if (errors.bluetooth) {
                errorToast(errors.bluetooth);
            } else if (errors.usb_port) {
                errorToast(errors.usb_port);
            } else {
                errorToast(list.props.flash.message);
            }
        },
    });
}
</script>

<template>
    <!-- Breadcrumb Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="rounded-top p-4" style="border: 1px solid #ddd;">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto">
                    <h4>{{ car_details.id ? "Update Car Details" : "Add Car Details" }}</h4>
                </div>
                <div class="col-auto">
                    <Link :href="route('show.car.list')" class="cmn-btn">Back to list</Link>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Car Details Form Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4 mb-3">
            <div class="col-sm-12 col-xl-12">
                <div class="rounded h-100 p-4" style="border: 1px solid #ddd;">
                    <form @submit.prevent="saveCarDetails">
                        <div class="row mb-2">
                            <div class="form-group col-md-12">
                                <label class="mb-1" for="short_description">Short Description</label>
                                <textarea v-model="form.short_description" class="form-control" rows="2"></textarea>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="form-group col-md-12">
                                <label class="mb-1" for="short_description">Short Description</label>
                                <textarea v-model="form.description" class="form-control" rows="4"></textarea>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="form-group col-md-6">
                                <label class="mb-1" for="seats">Seats</label>
                                <input type="number" v-model="form.seats" class="form-control" id="seats"
                                    placeholder="Enter Car Seats">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="mb-1" for="fuel_type">Fuel Type</label>
                                <select v-model="form.fuel_type" class="form-select">
                                    <option value="" disabled>Choose Fuel Type</option>
                                    <option value="Petrol">Petrol</option>
                                    <option value="Diesel">Diesel</option>
                                    <option value="CNG">CNG</option>
                                    <option value="Electric">Electric</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="form-group col-md-6">
                                <label class="mb-1" for="mileage">Mileage (km/l)</label>
                                <input type="number" v-model="form.mileage" class="form-control" id="mileage"
                                    placeholder="Enter Mileage">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="mb-1" for="transmission">Transmission</label>
                                <select v-model="form.transmission" class="form-select">
                                    <option value="" disabled>Choose Transmission</option>
                                    <option value="Automatic">Automatic</option>
                                    <option value="Manual">Manual</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="form-check col-md-3">
                                <input class="form-check-input" type="checkbox" value="" id="air_conditioning"
                                    v-model="form.air_conditioning">
                                <label class="form-check-label" for="air_conditioning">
                                    Air Conditioning
                                </label>
                            </div>
                            <div class="form-check col-md-3">
                                <input class="form-check-input" type="checkbox" value="" id="gps" v-model="form.gps">
                                <label class="form-check-label" for="gps">
                                    GPS
                                </label>
                            </div>
                            <div class="form-check col-md-3">
                                <input class="form-check-input" type="checkbox" value="" id="bluetooth"
                                    v-model="form.bluetooth">
                                <label class="form-check-label" for="bluetooth">
                                    Bluetooth
                                </label>
                            </div>
                            <div class="form-check col-md-3">
                                <input class="form-check-input" type="checkbox" value="" id="usb_port"
                                    v-model="form.usb_port">
                                <label class="form-check-label" for="usb_port">
                                    USB Port
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="cmn-btn w-100">
                            {{ form.id ? "Update Car Details" : "Save Car Details" }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Car Details Form End -->
</template>

<style scoped>
.form-group {
    margin-bottom: 10px;
}
</style>
