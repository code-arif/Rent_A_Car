<script setup>
import GuestLayout from '../../../Layouts/GuestLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
</script>

<template>

    <Head>
        <title>Car Rent || Sign Up</title>
    </Head>
    <GuestLayout>
        <!-- inner-apge-banner start -->
        <section class="inner-page-banner bg_img overlay-3"
            style="background-image: url('https://images.unsplash.com/photo-1613214149922-f1809c99b414?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-title">Create New account</h2>
                        <ol class="page-list">
                            <li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
                            <li>Registration</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <!-- inner-apge-banner end -->

        <!-- registration-section start -->
        <section class="registration-section pt-120 pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="registration-block text-center">
                            <div class="registration-block-inner">
                                <h3 class="title">create your account</h3>
                                <form class="registration-form">
                                    <div class="frm-group">
                                        <input type="text" name="f-name" id="f-name" placeholder="First Name">
                                    </div>
                                    <div class="frm-group">
                                        <input type="text" name="l-name" id="l-name" placeholder="Last Name">
                                    </div>
                                    <div class="frm-group">
                                        <input type="email" name="name" id="name" placeholder="Your Email">
                                    </div>
                                    <div class="frm-group">
                                        <input type="url" name="website" id="website" placeholder="Your Website">
                                    </div>
                                    <div class="frm-group">
                                        <input type="password" name="pass" id="pass" placeholder="Your Password">
                                    </div>
                                    <div class="frm-group">
                                        <input type="password" name="re-pass" id="re-pass"
                                            placeholder="Enter Re-Password">
                                    </div>
                                    <div class="frm-group">
                                        <input type="submit" value="create new account">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- registration-section end -->
    </GuestLayout>
</template>

<style scoped></style>
