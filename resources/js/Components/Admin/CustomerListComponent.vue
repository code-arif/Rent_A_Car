<script setup>
import { ref, computed } from "vue";
import { usePage, router } from "@inertiajs/vue3";

// ===================== Customer List ===================== //
const list = usePage();
const customers = list.props.customers || [];

const Header = [
    { text: "No", value: "no" },
    { text: "Name", value: "name", sortable: true },
    { text: "Email", value: "email" },
    { text: "Phone", value: "phone" },
    { text: "Role", value: "role" },
    { text: "Address", value: "address" },
    { text: "Action", value: "number", width: 100 },
];

// Transform data for table
const Item = computed(() => {
    return customers.map((customer, index) => ({
        no: index + 1,
        name: customer.name,
        email: customer.email,
        phone: customer.phone,
        role: customer.role,
        address: customer.address,
        id: customer.id,
    }));
});

// Search functionality
const searchValue = ref("");
const searchField = ref(["name", "email", "phone"]);

//========================customer delete functionality========================//
const deleteCustomer = (id) => {
    if (confirm("Are you sure to delete this customer?")) {
        router.delete(route("delete.customer", {
            id: id
        }), {
            preserveScroll: true,
            onSuccess: () => {
                successToast(list.props.flash.message);
            },
            onError: () => {
                errorToast('Failed to delete customer');
            }
        });
    }
}

//========================rental history functionality========================//
const rentHistory = ref([]);

const fetchRentalHistory = async (customerId) => {
    try {
        const response = await axios.get(route('show.rental.history.for.cus', { id: customerId }));
        rentHistory.value = response.data.rents;
    } catch (error) {
        console.error("Error fetching rental history:", error);
        rentHistory.value = []; // Clear history on error
    }
};
</script>

<template>
    <!-- Breadcrumb start -->
    <div class="container-fluid pt-4 px-4">
        <div class="rounded-top p-4" style="border: 1px solid #ddd;">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto">
                    <h4>Customer List</h4>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb end -->

    <!-- Customer list start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4 mb-3">
            <!-- Customer list table start -->
            <div class="col-sm-12 col-xl-8">
                <div class="rounded h-100 p-4" style="border: 1px solid #ddd;">
                    <div class="d-flex justify-content-between align-item-center">
                        <div>
                            <h6>All Customers is here</h6>
                        </div>
                        <div>
                            <input placeholder="Search..." class="form-control w-auto form-control-sm" type="text"
                                v-model="searchValue">
                        </div>
                    </div>
                    <hr>

                    <div class="table-responsive">
                        <EasyDataTable buttons-pagination alternating :headers="Header" :items="Item" border-cell
                            theme-color="#19cb00" :rows-per-page="15" :search-field="searchField"
                            :search-value="searchValue">
                            <template #item-number="{ id }">
                                <div class="d-flex justify-content-center align-items-center">
                                    <button @click="fetchRentalHistory(id)" class="btn btn-sm btn-outline-success mr-2">
                                        <i class="fa fa-history" aria-hidden="true"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger" @click="deleteCustomer(id)">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </template>
                        </EasyDataTable>
                    </div>
                </div>
            </div>
            <!-- Customer list table end -->

            <!-- Rent History For Customer -->
            <div class="col-sm-12 col-xl-4">
                <div class="rounded h-100 p-4" style="border: 1px solid #ddd;">
                    <div class="d-flex justify-content-between align-item-center">
                        <div>
                            <h6>Rent History For Customer</h6>
                        </div>
                    </div>
                    <hr>

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Car</th>
                                    <th>S-Date</th>
                                    <th>E-Date</th>
                                    <th>Cost</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(rent, index) in rentHistory" :key="index">
                                    <td>{{ rent.car?.name }}</td>
                                    <td>{{ rent.start_date }}</td>
                                    <td>{{ rent.end_date }}</td>
                                    <td>{{ rent.total_cost }}</td>
                                </tr>
                                <tr v-if="rentHistory.length === 0">
                                    <td colspan="4" class="text-center">No rental history found.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Customer list end -->
</template>
<style scoped></style>
