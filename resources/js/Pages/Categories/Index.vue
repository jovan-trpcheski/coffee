<script setup>
import {Head, router} from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import DangerButton from "@/Components/DangerButton.vue";
import {PencilIcon, TrashIcon} from '@heroicons/vue/24/solid'


defineProps({categories: Object})

function destroy(category_id) {
    if (confirm('DELETING THIS CATEGORY WILL ALSO DELETE ALL OF THE PRODUCTS THAT BELONG TO IT.\n \n ' +
        'Are you sure you want to delete this category?')) {
        router.delete(route('categories.destroy', category_id));
    }
}

function edit(category_id) {
    router.visit(route('categories.edit', category_id))
}

function create() {
    router.visit(route('categories.create'))
}
</script>
<template>
    <Head title="Categories"/>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Categories</h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <table class="table-auto min-w-full ">
                            <thead class="text-bold text-justify border-b-2 bg-white dark:bg-gray-700">
                            <tr>
<!--                                <th>IMAGE</th>-->
                                <th>CATEGORY NAME</th>
                                <th>DESCRIPTION</th>
                                <th>ACTIONS</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="category in categories" :key="category.id">
<!--                                <td>-->
<!--                                    <img v-if="category.photo!=null" :alt=category.name :src=category.full_photo_path-->
<!--                                         class="relative inline-block h-12 w-12 rounded-lg object-cover object-center">-->
<!--                                </td>-->
                                <td>{{ category.name }}</td>
                                <td>{{ category.description }}</td>
                                <td>
                                    <SecondaryButton class="m-2" type="button" @click="edit(category.id)"><PencilIcon class="h-4"/>
                                    </SecondaryButton>
                                    <DangerButton class="m-2" type="button" @click="destroy(category.id)"><TrashIcon class="h-4"/>
                                    </DangerButton>
                                </td>
                            </tr>
                            <tr class="text-center border-t-2">
                                <td colspan="4">
                                    <PrimaryButton class="m-2" type="button" @click="create()">Add a new category
                                    </PrimaryButton>
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

