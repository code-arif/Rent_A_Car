<script setup>
import { Link } from '@inertiajs/vue3';
import { route } from '../../../../vendor/tightenco/ziggy/src/js';
</script>

<template>
    <!-- inner-apge-banner start -->
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
    <!-- inner-apge-banner end -->

    <!-- car-search-section start -->
    <section class="car-search-section pt-120 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="car-search-filter-area">
                        <div class="car-search-filter-form-area">
                            <form class="car-search-filter-form">
                                <div class="row justify-content-between">
                                    <div class="col-lg-4 col-md-5 col-sm-6">
                                        <div class="cart-sort-field">
                                            <span class="caption">Sort by : </span>
                                            <select>
                                                <option>Pajero Range</option>
                                                <option>Toyota Axio</option>
                                                <option>Lancer</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-sm-6 d-flex">
                                        <input type="text" name="car_search" id="car_search"
                                            placeholder="Search what you want........">
                                        <button class="search-submit-btn">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-70">
                <div class="col-lg-8">
                    <div class="car-search-result-area list--view row mb-none-30">
                        <div class="col-md-6 col-12">
                            <div class="car-item car-item--style2">
                                <div class="thumb bg_img"
                                    style="background-image: url('https://images.unsplash.com/photo-1571348500628-1e9b6aa00dba?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');">
                                </div>
                                <div class="car-item-body">
                                    <div class="content">
                                        <h4 class="title">pajero rang</h4>
                                        <span class="price">start form $20 per day</span>
                                        <p>Aliquam sollicitudin dolores tristiquvel ornare, vitae aenean.</p>
                                        <a href="#0" class="cmn-btn mr-2">Someone picked up</a>
                                        <a href="#0" class="cmn-btn mr-2">Rent Reqeust</a>
                                        <a href="#0" class="cmn-btn">Booked</a>
                                    </div>
                                    <div class="car-item-meta">
                                        <ul class="details-list">
                                            <li><i class="fa fa-car"></i>model 2014ib</li>
                                            <li><i class="fa fa-tachometer"></i>32000 KM</li>
                                            <li><i class="fa fa-sliders"></i>auto</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <nav class="d-pagination" aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                            <li class="page-item"><a class="page-link" href="#">5</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-4">
                    <aside class="sidebar">

                        <div class="widget widget-price-filter">
                            <h4 class="widget-title">price filter</h4>
                            <input type="range" id="amount" name="amount" min="0" max="100">
                        </div>

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
    <!-- car-search-section end -->
</template>

