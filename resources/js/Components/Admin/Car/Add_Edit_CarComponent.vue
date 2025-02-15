<script setup>
import { ref, computed } from "vue";
import { Link, usePage, useForm } from "@inertiajs/vue3";

const list = usePage();
const car = list.props.car || [];

// Form for Add & Edit
const form = useForm({
    id: car.id || null,
    name: car.name || "",
    brand: car.brand || "",
    model: car.model || "",
    year: car.year || "",
    car_type: car.car_type || "",
    daily_rent_price: car.daily_rent_price || "",
    weekly_rent_price: car.weekly_rent_price || "",
    status: car.status || 0,
    availability: car.availability || "",
    image: car.image || "",
});


function saveCar() {
    const routeName = form.id ? "update.car" : "store.car";
    const requestData = form.id ? { id: form.id } : {};
    form.post(route(routeName, requestData), {
        onSuccess: () => {
            if (list.props.flash.status) {
                successToast(list.props.flash.message);
                form.reset();
            } else {
                errorToast(list.props.flash.message);
            }
        },
        onError: (errors) => {
            if (errors.name) {
                errorToast(errors.name);
            } else if (errors.brand) {
                errorToast(errors.brand);
            } else if (errors.model) {
                errorToast(errors.model);
            } else if (errors.year) {
                errorToast(errors.year);
            } else if (errors.car_type) {
                errorToast(errors.car_type);
            } else if (errors.daily_rent_price) {
                errorToast(errors.daily_rent_price);
            } else if (errors.weekly_rent_price) {
                errorToast(errors.weekly_rent_price);
            } else if (errors.status) {
                errorToast(errors.status);
            } else if (errors.availability) {
                errorToast(errors.availability);
            } else if (errors.image) {
                errorToast(errors.image);
            } else{
                errorToast("An error occurred while saving the car.");
            }
        }
    });
}

// Reactive property for dynamic image preview
const imagePreview = ref(
    car.image ? `/storage/${car.image}` : 'https://skala.or.id/wp-content/uploads/2024/01/dummy-post-square-1-1.jpg'
);

// Update image preview dynamically
function handleImageInput(event) {
    const file = event.target.files[0];
    if (file) {
        form.image = file;
        const reader = new FileReader();
        reader.onload = (e) => {
            imagePreview.value = e.target.result;
        };
        reader.readAsDataURL(file);
    }
}
</script>

<template>
    <!-- bradecrumb start -->
    <div class="container-fluid pt-4 px-4">
        <div class="rounded-top p-4" style="border: 1px solid #ddd;">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto">
                    <h4>Add/Edit Car</h4>
                </div>
                <div class="col-auto">
                    <Link :href="route('show.car.list')" class="cmn-btn">Back to list</Link>
                </div>
            </div>
        </div>
    </div>
    <!-- bradecrumb end -->

    <!-- car list start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4 mb-3">
            <div class="col-sm-12 col-xl-12">
                <div class="rounded h-100 p-4" style="border: 1px solid #ddd;">

                    <form @submit.prevent="saveCar()">
                        <div class="row mb-2">
                            <div class="form-group col-md-12">
                                <label class="mb-1" for="carName">Product Name</label>
                                <input type="text" v-model="form.name" class="form-control" id="carName"
                                    placeholder="Enter Car Name">
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="form-group col-md-6">
                                <label class="mb-1" for="brand">Brand</label>
                                <input type="text" v-model="form.brand" class="form-control" id="brand"
                                    placeholder="Enter Brand">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="mb-1" for="model">Model</label>
                                <input type="text" v-model="form.model" class="form-control" id="model"
                                    placeholder="Enter model">
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="form-group col-md-6">
                                <label class="mb-1" for="year">Year</label>
                                <input type="text" v-model="form.year" class="form-control" id="year"
                                    placeholder="Enter Year">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="mb-1" for="car_type">Car Type</label>
                                <select id="car_type" class="from-select" v-model="form.car_type">
                                    <option value="SUV">SUV</option>
                                    <option value="Sedan">Sedan</option>
                                    <option value="Hatchback">Hatchback</option>
                                    <option value="Truck">Truck</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="form-group col-md-6">
                                <label class="mb-1" for="daily_rent_price">Daily Rent Price</label>
                                <input type="text" v-model="form.daily_rent_price" class="form-control"
                                    id="daily_rent_price" placeholder="Daily Rent Price">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="mb-1" for="weekly_rent_price">Weekly Rent Price</label>
                                <input type="number" v-model="form.weekly_rent_price" class="form-control"
                                    id="weekly_rent_price" placeholder="Weekly Rent Price">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="form-group col-md-6">
                                <label class="mb-1" for="status">Status</label>
                                <select id="status" class="from-select" v-model="form.status">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="mb-1" for="availability">Availability</label>
                                <select id="availability" class="from-select" v-model="form.availability">
                                    <option value="Available"> Available</option>
                                    <option value=" Not Available">Not Available</option>
                                </select>
                            </div>
                        </div>

                        <div class="">
                            <div class="mb-3"
                                style="width: 100px; height: 100px; overflow: hidden; background: #f8f9fa;">
                                <img :src="imagePreview" alt="Image Preview" class="img-fluid"
                                    style="width: 100%; height: 100%; object-fit: cover; border: 2px solid #19cb00;">
                            </div>
                        </div>
                        <!--  Image -->
                        <div class="mb-4">
                            <label class="mb-2" for="carImage">Image</label>
                            <input type="file" class="form-control p-1" id="carImage" @change="handleImageInput">
                            <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                                {{ form.progress.percentage }}%
                            </progress>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="cmn-btn w-100">
                            {{ form.id ? "Update Car" : "Save Car" }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- car list end -->

</template>

<style scoped></style>
