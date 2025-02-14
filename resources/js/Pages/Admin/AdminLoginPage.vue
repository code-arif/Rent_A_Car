<script setup>
import { Link, Head, usePage, useForm } from '@inertiajs/vue3';
const list = usePage();

const form = useForm({
    email: '',
    password: '',
});

// Admin login function
function adminLogin() {
    form.post(route('admin.login'), {
        onSuccess: () => {
            if (list.props.flash.status === true) {
                successToast(list.props.flash.message);
                form.reset();
            } else {
                errorToast(list.props.flash.message);
            }
        },

        onError: (errors) => {
            if (errors.email) {
                errorToast(errors.email);
            } else if (errors.password) {
                errorToast(errors.password);
            } else {
                errorToast(list.props.flash.message);
            }
        }
    });
}
</script>

<template>

    <Head>
        <title>Car Rent || Admin Login</title>
    </Head>

    <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
            <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                <div class="bg-white rounded p-4 p-sm-5 my-4 mx-3" style="border: 1px solid #ddd;">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <a href="index.html" class="">
                            <h3 style="color:#19cb00"><i class="fa fa-car" style="margin-right: 5px;"></i>DASHMIN</h3>
                        </a>
                        <h3>Sign In</h3>
                    </div>
                    <form action="" @submit.prevent=adminLogin()>
                        <div class="mb-3">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" v-model="form.email">
                        </div>
                        <div class="form-floating mb-4">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" v-model="form.password">
                        </div>
                        <button type="submit" class="cmn-btn w-100 mb-4">Sign In</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Sign In End -->
</template>

<style scoped></style>
