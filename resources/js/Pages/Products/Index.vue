<script setup>
import {Head, router, usePage} from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import DangerButton from "@/Components/DangerButton.vue";
import {PencilIcon, TrashIcon} from '@heroicons/vue/24/solid'


defineProps({products: Object})
function destroy(product_id) {
    if (confirm('Are you sure you want to delete this product?')) {
        router.delete(route('products.destroy', product_id))
    }
}
function edit(product_id) {
    router.visit(route('products.edit', product_id))
}

function create(){
    router.visit(route('products.create'))
}
</script>

<template>
    <Head title="Products" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Products</h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-y-auto shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <table class="table-auto min-w-full ">
                            <thead class="text-bold text-justify border-b-2 bg-white dark:bg-gray-700">
                                <tr>
                                    <th>PRODUCT IMAGE</th>
                                    <th>PRODUCT NAME</th>
                                    <th>DESCRIPTION</th>
                                    <th>CATEGORY</th>
                                    <th>PRICE</th>
                                    <th>ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody >
                            <tr v-for="product in products" :key="product.id">
                                <td>
                                    <img v-if="product.photo!=null" :alt=product.name :src=product.full_photo_path
                                         class="relative inline-block h-12 w-12 rounded-lg object-cover object-center">
                                </td>                                <td>{{product.name}}</td>
                                <td>{{product.description}}</td>
                                <td>{{product.category.name}}</td>
                                <td>{{product.price}}</td>
                                <td>
                                    <SecondaryButton class="m-2" type="button" @click="edit(product.id)"><PencilIcon class="h-4"/></SecondaryButton>
                                        <DangerButton class="m-2" type="button" @click="destroy(product.id)"><TrashIcon class="h-4"/></DangerButton>
                                </td>
                            </tr>
                            <tr class="text-center border-t-2" >
                                <td colspan="6">
                                    <PrimaryButton class="m-2" type="button" @click="create()">Add a new product</PrimaryButton>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>

</template>



