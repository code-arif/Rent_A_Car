<script setup>

</script>

<template>
    <!-- banner-section start  -->
    <section class="banner-section banner-section--style2 bg_img banner-image">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="car-search-area mt-0">
                        <h3 class="title">Search for Your Car</h3>
                        <form class="car-search-form">
                            <div class="row">
                                <div class="col-xl-12 form-group">
                                    <select>
                                        <option value="1" selected>Choose Your Car Type</option>
                                        <option value="2">Car type one</option>
                                        <option value="3">Car type Two</option>
                                        <option value="4">Car type Three</option>
                                        <option value="5">Car type Four</option>
                                        <option value="6">Car type Five</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-xl-6">
                                    <i class="fa fa-map-marker"></i>
                                    <input class="form-control has-icon" type="text" placeholder="Pickup Location">
                                </div>
                                <div class="form-group col-xl-6">
                                    <i class="fa fa-map-marker"></i>
                                    <input class="form-control has-icon" type="text" placeholder="Drop Off Location">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-xl-6">
                                    <i class="fa fa-calendar"></i>
                                    <input type='text' class='form-control has-icon datepicker-here' data-language='en'
                                        placeholder="Pickup Date">
                                </div>
                                <div class="form-group col-xl-6">
                                    <i class="fa fa-clock-o"></i>
                                    <input type="text" name="timepicker" class="form-control has-icon timepicker"
                                        placeholder="Pickup Time">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-xl-6">
                                    <i class="fa fa-calendar"></i>
                                    <input type='text' class='form-control has-icon datepicker-here' data-language='en'
                                        placeholder="Drop Off Date">
                                </div>
                                <div class="form-group col-xl-6">
                                    <i class="fa fa-clock-o"></i>
                                    <input type="text" name="timepicker" class="form-control has-icon timepicker"
                                        placeholder="Drop Off Time">
                                </div>
                            </div>
                            <button type="submit" class="cmn-btn btn-radius">Reservation</button>
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
                        <a href="#0" class="cmn-btn">see all vehicles</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner-section end  -->
</template>

<style scoped></style>
