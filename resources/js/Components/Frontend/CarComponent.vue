<script setup>
import { usePage, Link, router } from '@inertiajs/vue3';
import { ref, watch } from 'vue';

const list = usePage();
const cars = ref(list.props.cars.data || []);
const links = ref(list.props.cars.links || []);
const selectedType = ref('');
const searchQuery = ref('');

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
                                        <Link :href="route('show.car.details', { id: car.id })" class="cmn-btn">rent car
                                        </Link>
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
                            <h4 class="widget-title">reservation</h4>
                            <div class="widget-body">
                                <form class="car-search-form">
                                    <div class="row">
                                        <div class="col-lg-12 form-group">
                                            <select>
                                                <option value="1" selected>Choose Your Car Type</option>
                                                <option value="2">Another option</option>
                                                <option value="4">Potato</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <i class="fa fa-map-marker"></i>
                                            <input class="form-control has-icon" type="text"
                                                placeholder="Pickup Location">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <i class="fa fa-map-marker"></i>
                                            <input class="form-control has-icon" type="text"
                                                placeholder="Drop Off Location">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <i class="fa fa-calendar"></i>
                                            <input type='text' class='form-control has-icon datepicker-here'
                                                data-language='en' placeholder="Pickup Date">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <i class="fa fa-clock-o"></i>
                                            <input type="text" name="timepicker"
                                                class="form-control has-icon timepicker" placeholder="Pickup Time">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <i class="fa fa-calendar"></i>
                                            <input type='text' class='form-control has-icon datepicker-here'
                                                data-language='en' placeholder="Drop Off Date">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <i class="fa fa-clock-o"></i>
                                            <input type="text" name="timepicker"
                                                class="form-control has-icon timepicker" placeholder="Drop Off Time">
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
