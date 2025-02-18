<script setup>
import { ref, computed } from "vue";
import { usePage, router, Link } from "@inertiajs/vue3";

// ===================== brand List ===================== //
const list = usePage();

const Header = [
    { text: "No", value: "no" },
    { text: "Image", value: "image" },
    { text: "Name", value: "name", sortable: true },
    { text: "Brand", value: "brand", sortable: true },
    { text: "Model", value: "model", sortable: true },
    { text: "Year", value: "year", sortable: true },
    { text: "Car Type", value: "car_type", width: 100 },
    { text: "Daily Rent Price", value: "daily_rent_price", width: 100 },
    { text: "Weekly Rent Price", value: "weekly_rent_price", width: 100 },
    { text: "Availability", value: "availability", },
    { text: "Status", value: "status" },
    { text: "Action", value: "number", width: 100 },
];

// Transform data for table
const Item = computed(() => {
    return list.props.cars?.map((car, index) => ({
        no: index + 1,
        image: car.image,
        name: car.name,
        brand: car.brand,
        model: car.model,
        year: car.year,
        car_type: car.car_type,
        daily_rent_price: car.daily_rent_price,
        weekly_rent_price: car.weekly_rent_price ?? "N/A",
        availability: car.availability,
        status: car.status == 1 ? "Active" : "Inactive",
        id: car.id,
    }));
});

// Search functionality
const searchValue = ref("");
const searchField = ref(["name", "year", "brand", "model", "daily_rent_price", "weekly_rent_price"]);

//====================change status functionality============================//
const toggleStatus = (id, currentStatus) => {
    if (confirm("Are you sure you want to change status?")) {
        const newStatus = currentStatus === "Active" ? 0 : 1;

        router.post(route("change.car.status", {
            id: id
        }), {
            status: newStatus
        }, {
            preserveScroll: true,
            onSuccess: () => {
                successToast(list.props.flash.message);
            },
            onError: () => {
                errorToast(list.props.flash.message);
            }
        });
    }
}

//========================car delete functionality========================//
const deleteCar = (id) => {
    if (confirm("Are you sure to delete this car?")) {
        router.post(route("delete.car", {
            id: id
        }), {
            preserveScroll: true,
            onSuccess: () => {
                successToast(list.props.flash.message);
            },
            onError: () => {
                errorToast(list.props.flash.message);
            }
        });
    }
}

</script>

<template>
    <!-- bradecrumb start -->
    <div class="container-fluid pt-4 px-4">
        <div class="rounded-top p-4" style="border: 1px solid #ddd;">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto">
                    <h4>Car List</h4>
                </div>
                <div class="col-auto">
                    <Link :href="route('show.car.save')" class="cmn-btn">Add Car</Link>
                </div>
            </div>
        </div>
    </div>
    <!-- bradecrumb end -->

    <!-- car list start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4 mb-3">
            <div class="col-sm-12 col-xl-12">
                <div class="rounded h-100 p-4" style="border: 1px solid #ddd;">
                    <div class="d-flex justify-content-between mb-3 align-item-center">
                        <div>
                            <h6>All Cars is here</h6>
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
                                <button @click="toggleStatus(id, status)"
                                    :class="status === 'Active' ? 'btn btn-sm btn-success' : 'btn btn-sm btn-outline-danger'"
                                    class="btn btn-sm">
                                    {{ status }}
                                </button>
                            </template>
                            <template #item-number="{ id }">
                                <div class="d-flex justify-content-center align-items-center">
                                    <Link :href="route('show.save.car.details.page', {id:id})" class="btn btn-sm btn-outline-info mr-2">
                                    <i class="fa fa-plus"></i>
                                    </Link>
                                    <Link :href="route('show.car.save', { id: id })"
                                        class="btn btn-sm btn-outline-success mr-2">
                                    <i class="fa fa-edit"></i>
                                    </Link>
                                    <button class="btn btn-sm btn-outline-danger" @click="deleteCar(id)">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </template>
                        </EasyDataTable>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- car list end -->
</template>

<style scoped></style>
