<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
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
                            <li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
                            <li><a href="#0">car list</a></li>
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
                                <img src="https://images.unsplash.com/photo-1571348500628-1e9b6aa00dba?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="images">
                            </div>
                            <div class="content">
                                <div class="content-block">
                                    <h3 class="car-name">forester subar</h3>
                                    <span class="price">Start form $20 per day</span>
                                    <p>Lorem ipsum dolor sit amet, urna sit sociis lacus sem turpis magna, montes
                                        euismod eros
                                        nu dignsim etiam elementum sed tellus sed. Sollicitudin occaecati ut bibendum
                                        vitae
                                        vehicula adipiscing, partent justo labore, maecenas at aliquam eum. Eleifend
                                        suspendisse
                                        enim integer, ipsum mauris curabitur nulla ut sit, pede aenean, lacus sed.
                                        Dignissim
                                        wisi turpis pharetra sapien.</p>
                                </div>
                                <form class="reservation-form">
                                    <div class="content-block">
                                        <h3 class="title">extra benifit and fee</h3>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group form-check">
                                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                    <label class="form-check-label" for="exampleCheck1">television $05
                                                        per
                                                        day</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group form-check">
                                                    <input type="checkbox" class="form-check-input" id="exampleCheck2">
                                                    <label class="form-check-label" for="exampleCheck2">childen
                                                        seat</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group form-check">
                                                    <input type="checkbox" class="form-check-input" id="exampleCheck3">
                                                    <label class="form-check-label" for="exampleCheck3">backfast & lunch
                                                        $20 per
                                                        day</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group form-check">
                                                    <input type="checkbox" class="form-check-input" id="exampleCheck4">
                                                    <label class="form-check-label" for="exampleCheck4">car
                                                        insurances</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group form-check">
                                                    <input type="checkbox" class="form-check-input" id="exampleCheck5">
                                                    <label class="form-check-label" for="exampleCheck5">air-condition
                                                        $35 per
                                                        day</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group form-check">
                                                    <input type="checkbox" class="form-check-input" id="exampleCheck6">
                                                    <label class="form-check-label" for="exampleCheck6">security &
                                                        safety</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <i class="fa fa-map-marker"></i>
                                                <input class="form-control has-icon" type="text"
                                                    placeholder="Pickup Location">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <i class="fa fa-map-marker"></i>
                                                <input class="form-control has-icon" type="text"
                                                    placeholder="Drop Off Location">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type='date' class='form-control' placeholder="Pickup Date">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <i class="fa fa-clock-o"></i>
                                                <input type="text" name="timepicker"
                                                    class="form-control" placeholder="Pickup Time">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type='date' class='form-control from-date' placeholder="Drop Off Date">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <i class="fa fa-clock-o"></i>
                                                <input type="text" name="timepicker"
                                                    class="form-control has-icon timepicker"
                                                    placeholder="Drop Off Time">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="content-block">
                                        <h3 class="title">addisonal information</h3>
                                        <div class="row">
                                            <div class="col-lg-12 form-group">
                                                <textarea placeholder="Write addisonal information in here"></textarea>
                                            </div>
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
                                <h4 class="widget-title">our all cars</h4>
                                <ul class="cars-list">
                                    <li><a href="#0">mistubisshi</a></li>
                                    <li><a href="#0">forester subar</a></li>
                                    <li><a href="#0">subary liberty</a></li>
                                    <li><a href="#0">pajero range</a></li>
                                    <li><a href="#0">volkswagen</a></li>
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
