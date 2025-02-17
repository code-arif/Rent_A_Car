<script setup>
import { usePage, Link, router, useForm } from '@inertiajs/vue3';
import { ref, watch } from 'vue';
const authUser = usePage().props.authCustomer.customer;

const list = usePage();
const cars = ref(list.props.cars.data || []);
const links = ref(list.props.cars.links || []);
const car_for_rent = list.props.car_for_rent;
const selectedType = ref('');
const searchQuery = ref('');

// Helper function to determine rental status
const getRentalStatus = (car) => {
    if (!car.rentals.length || car.rentals.every(rental => ['Cancelled', 'Completed'].includes(rental.status))) {
        return { label: 'Available', color: 'green' };
    }

    return car.rentals.some(rental => ['Pending', 'Ongoing'].includes(rental.status))
        ? { label: 'Processing', color: 'orange' }
        : { label: 'Booked', color: 'red' };
};

// Watch for changes in selectedType and searchQuery
watch([selectedType, searchQuery], ([newType, newSearch]) => {
    router.get(route('car.page'), {
        car_type: newType,
        search: newSearch,
    }, {
        preserveState: true,
        preserveScroll: true,
        onSuccess: (page) => {
            cars.value = page.props.cars.data;
            links.value = page.props.cars.links;
        }
    });
});


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
    <!-- Inner Page Banner -->
    <section class="inner-page-banner bg_img overlay-3"
        style="background-image: url('https://images.unsplash.com/photo-1613214149922-f1809c99b414?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="page-title">Our Cars</h2>
                    <ol class="page-list">
                        <li>
                            <Link :href="route('show.home')"><i class="fa fa-home"></i> Home</Link>
                        </li>
                        <li><a :href="route('car.page')">Car list</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Car Search Section -->
    <section class="car-search-section pt-120 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <form>
                        <div class="row justify-content-between">
                            <div class="col-lg-4 col-md-5 col-sm-6">
                                <div class="cart-sort-field">
                                    <select v-model="selectedType">
                                        <option value="">All Cars</option>
                                        <option value="Sedan">Sedan</option>
                                        <option value="SUV">SUV</option>
                                        <option value="Hatchback">Hatchback</option>
                                        <option value="Truck">Truck</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-7 col-sm-6 d-flex">
                                <input type="text" class="form-control"
                                    placeholder="Search with car name and price........" v-model="searchQuery">
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row mt-50">
                <!-- car list -->
                <div class="col-lg-8">
                    <div class="car-search-result-area list--view row mb-none-30">
                        <!-- Car Card -->
                        <div class="col-md-6 col-12" v-for="car in cars" :key="car.id">
                            <div class="car-item car-item--style2">
                                <div>
                                    <img :src="car?.image ? `/storage/${car?.image}` : 'https://skala.or.id/wp-content/uploads/2024/01/dummy-post-square-1-1.jpg'"
                                        alt="car image" style="width: 250px; height: 300px; object-fit: cover;">
                                </div>
                                <div class="car-item-body">
                                    <div class="content">
                                        <h4 class="title">{{ car.name }}</h4>
                                        <span class="price">start form {{ car.daily_rent_price }}/-BDT per day</span>
                                        <p>
                                            {{ car.detail?.short_description.length > 100
                                                ? car.detail?.short_description.slice(0, 80) + '...'
                                                : car.detail?.short_description
                                            }}
                                        </p>
                                        <div class="row">
                                            <Link :href="route('show.car.details', { id: car.id })" class="cmn-btn">rent
                                            car
                                            </Link>
                                            <p class="cmn-btn ml-2"
                                                :style="{ backgroundColor: getRentalStatus(car).color }">
                                                {{ getRentalStatus(car).label }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="car-item-meta">
                                        <ul class="details-list">
                                            <li><i class="fa fa-car"></i>Model: {{ car?.model }}</li>
                                            <li><i class="fa fa-tachometer"></i>{{ car.detail?.mileage }} KM/L</li>
                                            <li><i class="fa fa-sliders"></i>{{ car?.car_type }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pagination -->
                    <nav class="d-pagination" aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                            <li v-for="(link, index) in links" :key="index" class="page-item"
                                :class="{ active: link.active, disabled: !link.url }">
                                <Link v-if="link.url" :href="link.url" class="page-link" v-html="link.label">
                                </Link>
                                <span v-else class="page-link" v-html="link.label"></span>
                            </li>
                        </ul>
                    </nav>
                </div>

                <!-- car reservation -->
                <div class="col-lg-4">
                    <aside class="sidebar">
                        <div class="widget widget-reservation">
                            <h4 class="widget-title">Make your reservation</h4>
                            <div class="widget-body">
                                <form class="car-search-form" @submit.prevent="saveRent">
                                    <div class="row">
                                        <div class="col-lg-12 form-group">
                                            <select class="form-select" v-model="form.car_id" required>
                                                <option value="" disabled>Select Car</option>
                                                <option v-for="car in car_for_rent" :key="car.id" :value="car.id">
                                                    {{ car.name }} - {{ car.model }} ({{ car.daily_rent_price }}/- per
                                                    day)
                                                </option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <input class="form-control has-icon" type="text"
                                                placeholder="Pickup Location" v-model="form.pickup_location">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <i class="fa fa-map-marker"></i>
                                            <input class="form-control has-icon" type="text"
                                                placeholder="Drop Off Location" v-model="form.drop_off_location">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <input type='date' class='form-control' v-model="form.start_date">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <input type="date" class="form-control" v-model="form.end_date">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <input type='text' class='form-control' placeholder="Pick up Time"
                                                v-model="form.pickup_time">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <i class="fa fa-clock-o"></i>
                                            <input type="text" class="form-control" placeholder="Drop Off Time"
                                                v-model="form.drop_off_time">
                                        </div>
                                    </div>
                                    <button type="submit" class="cmn-btn">Reservation</button>
                                </form>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
</template>
