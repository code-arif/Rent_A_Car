<script setup>
import { ref } from 'vue';
import { useForm, usePage, Head, Link } from '@inertiajs/vue3';
import VendorAccountLayout from '../../../Layouts/VendorAccountLayout.vue';

const list = usePage();

const form = useForm({
    name: '',
    email: '',
    phone: '',
    address: '',
    city: '',
    state: '',
    country: '',
    zip: '',
    password: '',
    confirm_password: ''
});

const isSubmitting = ref(false);

function submitForm() {
    isSubmitting.value = true;

    form.post(route('create.vendor.account'), {
        // preserveScroll: true,
        onSuccess: () => {
            if (list.props.flash.status === true) {
                successToast(list.props.flash.message);
                form.reset();
                isSubmitting.value = false;
            } else {
                errorToast(list.props.flash.message);
            }

            isSubmitting.value = false;
        },
        onError: (errors) => {
            console.log(errors);
            if (errors.name) {
                errorToast(errors.name);
            } else if (errors.email) {
                errorToast(errors.email);
            } else if (errors.phone) {
                errorToast(errors.phone);
            } else if (errors.address) {
                errorToast(errors.address);
            } else if (errors.city) {
                errorToast(errors.city);
            } else if (errors.state) {
                errorToast(errors.state);
            } else if (errors.country) {
                errorToast(errors.country);
            } else if (errors.zip) {
                errorToast(errors.zip);
            } else if (errors.password) {
                errorToast(errors.password);
            } else if (errors.confirm_password) {
                errorToast(errors.confirm_password);
            }
            else {
                errorToast('Failed to create Vendor');
            }
        },
    })
};
</script>

<template>

<Head>
    <title>Mini Shop || Vendor Account</title>
</Head>

    <VendorAccountLayout>
        <div class="position-relative bg-white d-flex p-0">
            <div class="container-fluid">
                <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                    <div class="col-12 col-sm-8 col-md-6 col-lg-6 col-xl-6">
                        <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <h4 class="text-info"><i class="fa fa-hashtag me-2"></i>Mini Shop</h4>
                                <h4>Create account as a seller</h4>
                            </div>
                            <form @submit.prevent="submitForm">
                                <div class="mb-3">
                                    <label for="name">Full Name <span class="text-danger">*</span></label>
                                    <input v-model="form.name" type="text" class="form-control" id="name"
                                        :class="{ 'is-invalid': form.errors.name }">
                                    <div v-if="form.errors.name" class="invalid-feedback">
                                        {{ form.errors.name }}
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="email">Email <span class="text-danger">*</span></label>
                                        <input v-model="form.email" type="email" class="form-control" id="email"
                                            :class="{ 'is-invalid': form.errors.email }">
                                        <div v-if="form.errors.email" class="invalid-feedback">
                                            {{ form.errors.email }}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="phone">Phone <span class="text-danger">*</span></label>
                                        <input v-model="form.phone" type="tel" class="form-control" id="phone"
                                            :class="{ 'is-invalid': form.errors.phone }">
                                        <div v-if="form.errors.phone" class="invalid-feedback">
                                            {{ form.errors.phone }}
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="address">Address <span class="text-danger">*</span></label>
                                    <textarea v-model="form.address" class="form-control" id="address" rows="2"
                                        :class="{ 'is-invalid': form.errors.address }"></textarea>
                                    <div v-if="form.errors.address" class="invalid-feedback">
                                        {{ form.errors.address }}
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="city">City <span class="text-danger">*</span></label>
                                        <input v-model="form.city" type="text" class="form-control" id="city"
                                            :class="{ 'is-invalid': form.errors.city }">
                                        <div v-if="form.errors.city" class="invalid-feedback">
                                            {{ form.errors.city }}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="state">State</label>
                                        <input v-model="form.state" type="text" class="form-control" id="state"
                                            :class="{ 'is-invalid': form.errors.state }">
                                        <div v-if="form.errors.state" class="invalid-feedback">
                                            {{ form.errors.state }}
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="country">Country <span class="text-danger">*</span></label>
                                        <input v-model="form.country" type="text" class="form-control" id="country"
                                            :class="{ 'is-invalid': form.errors.country }">
                                        <div v-if="form.errors.country" class="invalid-feedback">
                                            {{ form.errors.country }}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="zip">Zip</label>
                                        <input v-model="form.zip" type="number" class="form-control" id="zip"
                                            :class="{ 'is-invalid': form.errors.zip }">
                                        <div v-if="form.errors.zip" class="invalid-feedback">
                                            {{ form.errors.zip }}
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <label for="password">Password <span class="text-danger">*</span></label>
                                        <input v-model="form.password" type="password" class="form-control"
                                            id="password" :class="{ 'is-invalid': form.errors.password }">
                                        <div v-if="form.errors.password" class="invalid-feedback">
                                            {{ form.errors.password }}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="confirm_password">Confirm Password <span
                                                class="text-danger">*</span></label>
                                        <input v-model="form.confirm_password" type="password" class="form-control"
                                            id="confirm_password"
                                            :class="{ 'is-invalid': form.errors.confirm_password }">
                                        <div v-if="form.errors.confirm_password" class="invalid-feedback">
                                            {{ form.errors.confirm_password }}
                                        </div>
                                    </div>
                                </div>
                                <button :disabled="isSubmitting" type="submit" class="btn btn-info w-100 mb-4">
                                    {{ isSubmitting ? 'Creating Account...' : 'Create Account' }}
                                </button>
                            </form>
                            <p class="text-center mb-0">Already have an Account? <Link :href="route('show.admin.login')">Sign In</Link></p>
                            <p class="text-center mb-0"><Link :href="route('show.home.page')"><i class="fa fa-arrow-left me-2"></i> Back to Home</Link></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </VendorAccountLayout>
</template>

<style scoped>
.invalid-feedback {
    color: red;
    font-size: 0.9rem;
    margin-top: 0.25rem;
}
</style>
