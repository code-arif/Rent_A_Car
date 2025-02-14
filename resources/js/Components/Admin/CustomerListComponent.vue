<script setup>
import { ref, computed } from "vue";
import { usePage, Link } from "@inertiajs/vue3";

// ===================== brand List ===================== //
const list = usePage();

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
    return list.props.customers?.map((customer, index) => ({
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
                    <h4>Customer List</h4>
                </div>
                <div class="col-auto">
                    <Link class="cmn-btn">Add Customer</Link>
                </div>
            </div>
        </div>
    </div>
    <!-- bradecrumb end -->

    <!-- car list start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4 mb-3">
            <!-- customer list table start-->
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
                                    <button class="btn btn-sm btn-outline-success mr-2">
                                        <i class="fa fa-history" aria-hidden="true"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-info mr-2">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger" @click="deleteCar(id)">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </template>
                        </EasyDataTable>
                    </div>
                </div>
            </div>
            <!-- customer list table  end  -->

            <!-- add/edit customer start-->
            <div class="col-sm-12 col-xl-4">
                <div class="rounded h-100 p-4" style="border: 1px solid #ddd;">
                    <div class="d-flex justify-content-between align-item-center">
                        <div>
                            <h6>Add/Edit Customer</h6>
                        </div>
                    </div>
                    <hr>

                    <form action="">
                        <div class="form-group mb-2">
                            <input type="text" class="form-control" id="name" placeholder="Name" v-model="name">
                        </div>
                        <div class="form-group mb-2">
                            <input type="email" class="form-control" id="name" placeholder="Email" v-model="email">
                        </div>
                        <div class="form-group mb-2">
                            <input type="text" class="form-control" id="name" placeholder="Name" v-model="name">
                        </div>
                    </form>
                </div>
            </div>
            <!-- add/edit customer end -->
        </div>
    </div>
    <!-- car list end -->
</template>

<style scoped></style>
