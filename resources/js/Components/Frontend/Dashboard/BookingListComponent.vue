<script setup>
import { computed } from "vue";
import { usePage, router } from "@inertiajs/vue3";

// Access page props
const list = usePage();

// Header for the table
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
        id: rent.id,
        customer_name: rent.user?.name ?? rent.name,
        phone: rent.phone ?? rent.user?.phone,
        car_name: rent.car?.name,
        start_date: rent.start_date,
        end_date: rent.end_date,
        daily_rent_price: rent.car?.daily_rent_price,
        total_cost: rent.total_cost,
        status: rent.status,
    }));
});

// Cancel Booking Function
const cancelBooking = (id) => {
    if (confirm("Are you sure you want to cancel this booking?")) {
        router.patch(route('rental.cancel', id));
    }
};
</script>

<template>

    <div class="container-fluid pt-4 px-4">
        <div class="rounded-top p-4" style="border: 1px solid #ddd;">
            <div class="row">
                <div class="col-12 text-start text-sm-start">
                    <h3>Welcome to Dashboard</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Booking Table -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4 mb-3">
            <div class="col-sm-12 col-xl-12">
                <div class="rounded p-4" style="border: 1px solid #ddd;">
                    <h6 class="mb-3">All previous bookings are here</h6>

                    <div class="table-responsive">
                        <EasyDataTable buttons-pagination alternating :headers="Header" :items="Item" border-cell
                            theme-color="#19cb00" :rows-per-page="10">
                            <!-- Status Button -->
                            <template #item-status="{ status }">
                                <button :class="{
                                    'btn btn-sm': true,
                                    'btn-success': status === 'Completed',
                                    'btn-warning': status === 'Pending',
                                    'btn-info': status === 'Ongoing',
                                    'btn-danger': status === 'Cancelled',
                                }">
                                    {{ status }}
                                </button>
                            </template>

                            <!-- Action (Cancel Button) -->
                            <template #item-number="{ id, status }">
                                <div v-if="status === 'Pending'"
                                    class="d-flex justify-content-center align-items-center">
                                    <button class="btn btn-sm btn-outline-primary" @click="cancelBooking(id)"
                                        style="margin-right: 5px;">
                                        Cancel
                                    </button>
                                </div>
                            </template>
                        </EasyDataTable>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
</style>
