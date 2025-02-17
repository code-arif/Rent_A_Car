<script setup>
import { Head } from '@inertiajs/vue3';
import GuestLayout from '@/Layouts/GuestLayout.vue';
</script>

<template>

    <Head>
        <title> Car Rent || About Us</title>
    </Head>
    <GuestLayout>
       

        <section class="error-section pt-120 pb-120">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="error-content text-center">
                            <h2 class="title">Oops! sorry page not found </h2>
                            <p>Quisque cras molestie dictum, aliquam litora. Tempus amet pellentesque vitae ante,
                                consectequat
                                sed vestibulum fringilla dictum, enim a taciti et orci fusce, non suspendisse, nunc at
                                rutrumPellentesque turpis et nonummy eu nulla. Quis gravida ultrices nam vehicula
                                adipiscing
                                quam.</p>
                            <a :href="route('show.home')" class="cmn-btn">got to home</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </GuestLayout>
</template>

<style scoped></style>
