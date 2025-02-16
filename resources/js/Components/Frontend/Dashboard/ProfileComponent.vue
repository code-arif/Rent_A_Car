<script setup>
import { usePage, useForm } from '@inertiajs/vue3';
const list = usePage();

const profile = list.props.profile || {};

// =====================update profile=====================//
const form = useForm({
    name: profile?.name || '',
    phone: profile?.phone || '',
    address: profile?.address || '',
});

function updateProfile() {
    form.post(route('update.user.profile'), {
        preserveScroll: true,
        onSuccess: () => {
            successToast(list.props.flash.message);
        },
        onError: (errors) => {
            if (errors.name) {
                errorToast(errors.name);
            } else if (errors.phone) {
                errorToast(errors.phone);
            } else if (errors.address) {
                errorToast(errors.address);
            } else {
                errorToast('Something went wrong');
            }
        }
    });
}

//======================update password =====================//
const passwordForm = useForm({
    password: '',
    newPassword: '',
    newPassword_confirmation: '',
});

// Method to submit password update form
const updatePassword = () => {
    passwordForm.post(route('update.user.password'), {
        preserveScroll: true,
        onSuccess: () => {
            successToast(list.props.flash.message);
            passwordForm.reset();
        },
        onError: (errors) => {
            if (errors.password) {
                errorToast(errors.password);
            } else if (errors.newPassword) {
                errorToast(errors.newPassword);
            } else if (errors.password_confirmation) {
                errorToast(errors.password_confirmation);
            } else {
                errorToast('Something went wrong');
            }
        }
    });
};
</script>

<template>
    <!-- Welcome Section -->
    <div class="container-fluid pt-4 px-4">
        <div class="rounded-top p-4" style="border: 1px solid #ddd;">
            <div class="row">
                <div class="col-12 text-start">
                    <h4>Welcome !!
                        <span class="text-info" style="font-size: 20px;">
                            {{ profile.name }}
                        </span>
                    </h4>
                </div>
            </div>
        </div>
    </div>

    <!-- Profile Information Form -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4 mb-3">
            <div class="col-sm-12 col-xl-8">
                <div class="rounded h-100 p-4" style="border: 1px solid #ddd;">
                    <h6>Profile Information</h6>
                    <hr>

                    <form @submit.prevent="updateProfile">
                        <div class="mb-3">
                            <label>Email</label>
                            <input type="text" class="form-control" :value="profile.email" disabled readonly>
                        </div>

                        <div class="mb-3">
                            <label>Name</label>
                            <input type="text" class="form-control" v-model="form.name" placeholder="Enter your name">
                        </div>

                        <div class="mb-3">
                            <label>Phone</label>
                            <input type="text" class="form-control" v-model="form.phone" placeholder="Enter your phone">
                        </div>

                        <div class="mb-3">
                            <label>Address</label>
                            <textarea rows="2" class="form-control" v-model="form.address"
                                placeholder="Enter your address"></textarea>
                        </div>

                        <button type="submit" class="cmn-btn w-100">Update Profile</button>
                    </form>
                </div>
            </div>

            <!-- Password Change Form -->
            <div class="col-sm-12 col-xl-4">
                <div class="rounded p-4" style="border: 1px solid #ddd;">
                    <h6>Password Change</h6>
                    <hr>

                    <form @submit.prevent="updatePassword">
                        <div class="mb-3">
                            <label>Old Password</label>
                            <input type="password" class="form-control" placeholder="Old Password"
                                v-model="passwordForm.password" required>
                            <small v-if="passwordForm.errors.password" class="text-danger">{{
                                passwordForm.errors.password }}</small>
                        </div>

                        <div class="mb-3">
                            <label>New Password</label>
                            <input type="password" class="form-control" placeholder="New Password"
                                v-model="passwordForm.newPassword" required>
                            <small v-if="passwordForm.errors.newPassword" class="text-danger">{{
                                passwordForm.errors.newPassword }}</small>
                        </div>

                        <div class="mb-3">
                            <label>Confirm Password</label>
                            <input type="password" class="form-control" placeholder="Confirm Password"
                                v-model="passwordForm.newPassword_confirmation" required>
                            <small v-if="passwordForm.errors.newPassword_confirmation" class="text-danger">
                                {{ passwordForm.errors.newPassword_confirmation }}
                            </small>
                        </div>

                        <button type="submit" class="cmn-btn w-100" :disabled="passwordForm.processing">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
textarea {
    resize: none;
}
</style>

<style scoped></style>
