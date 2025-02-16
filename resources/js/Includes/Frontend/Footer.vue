<script setup>
import { Link } from '@inertiajs/vue3';

</script>

<template>
    <footer class="footer-section">
        <div class="footer-top pt-120 pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-sm-8">
                        <div class="footer-widget">
                            <div class="">
                                <Link :href="route('show.home')" class="text-start navbar-brand mx-4 mb-3">
                                <h3 class="text-light"><i class="fa fa-car" style="margin-right: 5px;"></i>Car Rent</h3>
                                </Link>
                                <p>Lorem ipsum dolor sit amet, congue placeranec. Leo faucibus sed eleifend bibendum n
                                    vehicula nulla mauris nulla ipsum neque sed. Gravida egestas fermentum urna, velit
                                    sed. </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-4">
                        <div class="footer-widget widget-menu">
                            <h4 class="widget-title">our cars</h4>
                            <ul>
                                <li><Link href=""> <i class="fa fa-chevron-right" aria-hidden="true"></i> SUV </Link></li>
                                <li><Link href="#0"> <i class="fa fa-chevron-right" aria-hidden="true"></i> Sedan </Link></li>
                                <li><Link href="#0"><i class="fa fa-chevron-right" aria-hidden="true"></i> Hatchback </Link>
                                </li>
                                <li><Link href="#0"> <i class="fa fa-chevron-right" aria-hidden="true"></i> Truck</Link></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-2 col-sm-4">
                        <div class="footer-widget widget-menu">
                            <h4 class="widget-title">useful link</h4>
                            <ul>
                                <li><Link :href="route('show.home')"> <i class="fa fa-chevron-right" aria-hidden="true"></i> Home</Link></li>
                                <li><Link :href="route('car.page')"> <i class="fa fa-chevron-right" aria-hidden="true"></i> Reservation</Link>
                                </li>
                                <li><Link :href="route('show.about')"> <i class="fa fa-chevron-right" aria-hidden="true"></i> About</Link></li>
                                <li><Link :href="route('show.contact')"> <i class="fa fa-chevron-right" aria-hidden="true"></i> Contact</Link></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-8">
                        <div class="footer-widget widget-address">
                            <h4 class="widget-title">contact with us</h4>
                            <ul>
                                <li>
                                    <i class="fa fa-map-marker"></i>
                                    <span>Medino, NY 10012, Kitaniya Road Nikamobo Libono USA</span>
                                </li>
                                <li>
                                    <i class="fa fa-envelope"></i>
                                    <span>www.carrentalinfo2457@gmail.com www.oursupport/info@gmail.com</span>
                                </li>
                                <li>
                                    <i class="fa fa-phone-square"></i>
                                    <span>+88014578541-09 , +0885424-542-254 +88047859-4541</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </footer>
</template>

<style scoped></style>
