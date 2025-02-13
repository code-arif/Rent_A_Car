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
                                <Link class="site-logo site-title mb-3" :href="route('show.home')"
                                    style="text-decoration: none; font-size: 30px; color: red; border:1px solid #da1c36; padding: 3px 8px; ">
                                CAR RENT </Link>
                                <p>Lorem ipsum dolor sit amet, congue placeranec. Leo faucibus sed eleifend bibendum n
                                    vehicula nulla mauris nulla ipsum neque sed. Gravida egestas fermentum urna, velit
                                    sed. </p>
                                <!-- <ul class="social-links">
                                    <li><a href="#0"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#0"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#0"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="#0"><i class="fa fa-google-plus"></i></a></li>
                                </ul> -->
                                <!-- <i class="fa fa-linkedin" aria-hidden="true"></i> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-4">
                        <div class="footer-widget widget-menu">
                            <h4 class="widget-title">our cars</h4>
                            <ul>
                                <li><a href=""> <i class="fa fa-chevron-right" aria-hidden="true"></i> mistubishi
                                        lancer</a></li>
                                <li><a href="#0"> <i class="fa fa-chevron-right" aria-hidden="true"></i> forester
                                        subar</a></li>
                                <li><a href="#0"><i class="fa fa-chevron-right" aria-hidden="true"></i> mirage ange</a>
                                </li>
                                <li><a href="#0"> <i class="fa fa-chevron-right" aria-hidden="true"></i> pajero
                                        range</a></li>
                                <li><a href="#0"> <i class="fa fa-chevron-right" aria-hidden="true"></i> subaru
                                        liberty</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-2 col-sm-4">
                        <div class="footer-widget widget-menu">
                            <h4 class="widget-title">useful link</h4>
                            <ul>
                                <li><a href="#0"> <i class="fa fa-chevron-right" aria-hidden="true"></i> about</a></li>
                                <li><a href="#0"> <i class="fa fa-chevron-right" aria-hidden="true"></i> reservation</a>
                                </li>
                                <li><a href="#0"> <i class="fa fa-chevron-right" aria-hidden="true"></i> faq</a></li>
                                <li><a href="#0"> <i class="fa fa-chevron-right" aria-hidden="true"></i> blog</a></li>
                                <li><a href="#0"> <i class="fa fa-chevron-right" aria-hidden="true"></i> car list</a>
                                </li>
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
