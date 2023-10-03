<script setup>
import {Head, router, usePage, Link} from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import DangerButton from "@/Components/DangerButton.vue";
import {PencilIcon, TrashIcon} from '@heroicons/vue/24/solid'
import Pagination from "@/Components/Pagination.vue";


defineProps({products: Object})

function destroy(product_id) {
    if (confirm('Are you sure you want to delete this product?')) {
        router.delete(route('products.destroy', product_id))
    }
}

function edit(product_id) {
    router.visit(route('products.edit', product_id))
}

function create() {
    router.visit(route('products.create'))
}
</script>

<template>
    <Head title="Products"/>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Products</h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-y-auto shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="grid grid-cols-2 gap-4 p-6 text-gray-900 dark:text-gray-100">
                            <div class=" text-xl m-2 ">Do you want to add a new product?</div>
                            <PrimaryButton class="flex items-center justify-center h-10 m-2 text-center" @click="create()" >
                                Add new product
                            </PrimaryButton>
                        </div>
                        <ul  role="list">
                            <li v-for="product in products.data" :key="product.id"
                                class="flex justify-between gap-x-6 mb-2 bg-gray-900 py-5 border border-gray-700/50 px-2 rounded-lg">
                                <div class="flex pl-3 min-w-0 gap-x-4">
                                    <img v-if="product.photo!=null"
                                         :src="product.full_photo_path"
                                         alt="" class="h-16	w-16 flex-none rounded-full bg-gray-50"/>
                                    <div v-else
                                         class="h-16 select-none w-16 flex-none flex items-center justify-center rounded-full bg-gray-500"
                                         v-text="'?'"/>
                                    <div class="min-w-0 flex-auto">
                                        <p class="font-semibold text-lg leading-6 text-gray-100">
                                            {{product.name  }}</p>
                                        <p class="mt-1  text-sm leading-5 text-gray-300"><b>price:</b> {{ '$' + product.price }}</p>
                                        <p class="mt-1  text-sm leading-5 text-gray-300"><b>category:</b> {{ product.category.name }}</p>
                                        <p class="mt-1  text-sm leading-5 text-gray-300"><b>description:</b> {{ product.description }}</p>
                                    </div>
                                </div>
                                <div class=" shrink-0 sm:flex sm:flex-col sm:items-end">
                                    <div class="mt-1 flex items-center">
                                        <SecondaryButton class="m-1" type="button" @click="edit(product.id)">
                                            <PencilIcon class="h-5"/>
                                        </SecondaryButton>
                                    </div>
                                    <div class="mt-1 flex items-center">
                                        <DangerButton class="m-1" type="button" @click="destroy(product.id)">
                                            <TrashIcon class="h-5"/>
                                        </DangerButton>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div class="grid  place-items-center content-center">
                            <Pagination :links="products.links" class="mt-6"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>



