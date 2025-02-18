<script setup>
import { ref, computed } from "vue";
import { usePage, router, Link, useForm } from "@inertiajs/vue3";

// ===================== brand List ===================== //
const list = usePage();
const customers = list.props.customers || [];
const cars = list.props.cars || [];

const Header = [
    { text: "No", value: "no" },
    { text: "Customer", value: "customer_name", sortable: true },
    { text: "Phone", value: "phone", sortable: true },
    { text: "Car", value: "car_name", width: 150, sortable: true },
    { text: "S-Date", value: "start_date", width: 90, sortable: true },
    { text: "E-Date", value: "end_date", width: 90, sortable: true },
    { text: "D-Rent", value: "daily_rent_price", width: 90, sortable: true },
    { text: "Cost", value: "total_cost", width: 50 },
    { text: "Status", value: "status" },
    { text: "Action", value: "number", width: 100 },
];

// Transform data for table
const Item = computed(() => {
    return list.props.rentals?.map((rent, index) => ({
        no: index + 1,
        customer_name: rent.user?.name ?? rent.name,
        phone: rent.phone ?? rent.user?.phone,
        car_name: rent.car?.name,
        start_date: rent.start_date,
        end_date: rent.end_date,
        daily_rent_price: rent.car?.daily_rent_price,
        total_cost: rent.total_cost,
        status: rent.status,
        id: rent.id,
        user_id: rent.user_id,
        car_id: rent.car_id,
        name: rent.name,
    }));
});

// Search functionality
const searchValue = ref("");
const searchField = ref(["name", "car_name", "start_date", "end_date", "total_cost", "status"]);

//=============================create rent ================================//
const form = useForm({
    id: null,
    user_id: "",
    car_id: "",
    name: "",
    phone: "",
    start_date: "",
    end_date: "",
    total_cost: "",
    status: "",
    pickup_location: "",
    drop_off_location: "",
    pickup_time: "",
    drop_off_time: "",
});

// Function to set form data when editing
const setEditRent = (rent) => {
    form.id = rent.id;
    form.user_id = rent.user_id;
    form.car_id = rent.car_id;
    form.name = rent.name;
    form.phone = rent.phone;
    form.start_date = rent.start_date;
    form.end_date = rent.end_date;
    form.status = rent.status;
    form.pickup_location = rent.pickup_location;
    form.drop_off_location = rent.drop_off_location;
    form.pickup_time = rent.pickup_time;
    form.drop_off_time = rent.drop_off_time;
};


// Handle Form Submission
const saveRent = () => {
    const routeName = form.id ? "update.rental" : "store.rental";
    const requestData = form.id ? { id: form.id } : {};

    form.post(route(routeName, requestData), {
        onSuccess: () => {
            if (list.props.flash.status === true) {
                successToast(list.props.flash.message);
                form.reset();
            } else {
                errorToast(list.props.flash.message);
            }
        },
        onError: (errors) => {
            if (errors.user_id) {
                errorToast(errors.user_id);
            } else if (errors.car_id) {
                errorToast(errors.car_id);
            } else if (errors.start_date) {
                errorToast(errors.start_date);
            } else if (errors.end_date) {
                errorToast(errors.end_date);
            } else if (errors.status) {
                errorToast(errors.status);
            } else if (errors.pickup_location) {
                errorToast(errors.pickup_location);
            } else if (errors.drop_off_location) {
                errorToast(errors.drop_off_location);
            } else if (errors.pickup_time) {
                errorToast(errors.pickup_time);
            } else if (errors.drop_off_time) {
                errorToast(errors.drop_off_time);
            }
            else {
                errorToast('An error occurred');
            }
        }

    });
};

//========================rent delete functionality========================//
const deleteRent = (id) => {
    if (confirm("Are you sure to delete this rent?")) {
        router.delete(route("delete.rental", {
            id: id
        }), {
            onSuccess: () => {
                successToast(list.props.flash.message);
            },
            onError: () => {
                errorToast(list.props.flash.message);
            }
        });
    }
}

//=====================rent status change functionality=====================//
// Status dropdown visibility
const showDropdown = ref(null);

// Update rent status function
const updateRentStatus = (id, status) => {
    router.put(route('change.rental.status', { id }), { status }, {
        onSuccess: () => {
            successToast(list.props.flash.message);
            showDropdown.value = null;
        },
    });
};



</script>

<template>
    <!-- bradecrumb start -->
    <div class="container-fluid pt-4 px-4">
        <div class="rounded-top p-4" style="border: 1px solid #ddd;">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto">
                    <h4>Rental List/Custom Rental Create/Update</h4>
                </div>
            </div>
        </div>
    </div>
    <!-- bradecrumb end -->

    <!-- rent list start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4 mb-3">

            <!-- rent table start -->
            <div class="col-sm-12 col-xl-12 mb-4">
                <div class="rounded p-4" style="border: 1px solid #19cb00;">
                    <div class="d-flex justify-content-between mb-3 align-item-center">
                        <div>
                            <h6>All Rent is here</h6>
                        </div>
                        <div>
                            <input placeholder="Search..." class="form-control w-auto form-control-sm" type="text"
                                v-model="searchValue">
                        </div>
                    </div>

                    <div class="table-responsive">
                        <EasyDataTable buttons-pagination alternating :headers="Header" :items="Item" border-cell
                            theme-color="#19cb00" :rows-per-page="15" :search-field="searchField"
                            :search-value="searchValue">
                            <template #item-image="{ image }">
                                <img :src="image ? `/storage/${image}` :
                                    'https://skala.or.id/wp-content/uploads/2024/01/dummy-post-square-1-1.jpg'"
                                    alt="Brand Logo" style="width: 50px; height: 50px; object-fit: cover;" class="p-1">
                            </template>
                            <template #item-status="{ status, id }">
                                <div class="dropdown" @mouseleave="showDropdown = null">
                                    <button @click="showDropdown = showDropdown === id ? null : id" :class="{
                                        'btn btn-sm': true,
                                        'btn-success': status === 'Completed',
                                        'btn-warning': status === 'Pending',
                                        'btn-info': status === 'Ongoing',
                                        'btn-danger': status === 'Cancelled',
                                    }">
                                        {{ status }}
                                    </button>
                                    <div v-if="showDropdown === id" class="dropdown-menu show">
                                        <button class="dropdown-item"
                                            @click="updateRentStatus(id, 'Pending')">Pending</button>
                                        <button class="dropdown-item"
                                            @click="updateRentStatus(id, 'Ongoing')">Ongoing</button>
                                        <button class="dropdown-item"
                                            @click="updateRentStatus(id, 'Completed')">Completed</button>
                                        <button class="dropdown-item"
                                            @click="updateRentStatus(id, 'Cancelled')">Cancelled</button>
                                    </div>
                                </div>
                            </template>
                            <template #item-number="{ id, user_id, car_id, start_date, end_date, status, name, phone }">
                                <div class="d-flex justify-content-center align-items-center">
                                    <Link :href="route('show.order.details', { id: id })"
                                        class="btn btn-sm btn-outline-info mr-2">
                                    <i class="fa fa-info"></i>
                                    </Link>
                                    <button class="btn btn-sm btn-outline-primary"
                                        @click="setEditRent({ id, user_id, car_id, start_date, end_date, status, name, phone })"
                                        style="margin-right: 5px;">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger" @click="deleteRent(id)">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </template>
                        </EasyDataTable>
                    </div>
                </div>
            </div>
            <!-- rent table end -->

            <!-- Rent Form start -->
            <div class="col-sm-12 col-xl-12">
                <div class="rounded h-100 p-4" style="border: 1px solid #ddd;">
                    <h6>{{ form.id ? "Edit Rental" : "Create Rental" }}</h6>
                    <hr>

                    <form @submit.prevent="saveRent">
                        <div class="row">
                            <div class="form-group col-md-3">
                                <select class="form-select" v-model="form.user_id">
                                    <option value="" disabled>Select Customer</option>
                                    <option v-for="customer in customers" :key="customer.id" :value="customer.id">
                                        {{ customer.name }} - ({{ customer.phone }})
                                    </option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <select class="form-select" v-model="form.car_id" required>
                                    <option value="" disabled>Select Car</option>
                                    <option v-for="car in cars" :key="car.id" :value="car.id">
                                        {{ car.name }} - {{ car.model }} ({{ car.daily_rent_price }}/- per day)
                                    </option>
                                </select>
                            </div>

                            <div class="form-group col-md-3">
                                <input class="form-control" type="text" placeholder="Name for custom order"
                                    v-model="form.name">
                            </div>

                            <div class="form-group col-md-3">
                                <input class="form-control" type="tel" placeholder="Phone for custom order"
                                    v-model="form.phone">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <input type="date" class="form-control" v-model="form.start_date" required>
                            </div>
                            <div class="form-group col-md-4">
                                <input type="date" class="form-control" v-model="form.end_date" required>
                            </div>

                            <div class="form-group col-md-4">
                                <select v-model="form.status">
                                    <option value="" disabled>Select Status</option>
                                    <option value="Pending">Pending</option>
                                    <option value="Ongoing">Ongoing</option>
                                    <option value="Completed">Completed</option>
                                    <option value="Cancelled">Cancelled</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-3">
                                <input type="text" class="form-control" v-model="form.pickup_location"
                                    placeholder="Pickup Location">
                            </div>
                            <div class="form-group col-md-3">
                                <input type="text" class="form-control" v-model="form.drop_off_location"
                                    placeholder="Drop Off Location">
                            </div>
                            <div class="form-group col-md-3">
                                <input type="text" class="form-control" v-model="form.pickup_time"
                                    placeholder="Pickup Time">
                            </div>
                            <div class="form-group col-md-3">
                                <input type="text" class="form-control" v-model="form.drop_off_time"
                                    placeholder="Drop Off Time">
                            </div>
                        </div>
                        <button class="cmn-btn w-100">
                            {{ form.id ? "Update Rental" : "Save Rental" }}
                        </button>
                    </form>
                </div>
            </div>
            <!-- Rent form end -->

        </div>
    </div>
    <!-- rent list end -->
</template>

<style scoped>
.completed-btn {
    background-color: #28a745;
    color: white;
}

.pending-btn {
    background-color: #ffc107;
    color: black;
}

.ongoing-btn {
    background-color: #17a2b8;
    color: white;
}

.cancelled-btn {
    background-color: #dc3545;
    color: white;
}

.dropdown-menu {
    position: absolute;
    background-color: white;
    border: 1px solid #ccc;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
    z-index: 1000;
}
</style>
