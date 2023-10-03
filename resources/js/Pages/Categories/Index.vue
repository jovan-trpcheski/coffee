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
                        <div class="grid grid-cols-2 gap-4 p-6 text-gray-900 dark:text-gray-100">
                            <div class=" text-xl m-2 ">Do you want to add a new category?</div>
                            <PrimaryButton class="flex items-center justify-center h-10 m-2 text-center" @click="create()" >
                                Add new category
                            </PrimaryButton>
                        </div>
                        <ul  role="list">
                            <li v-for="category in categories" :key="category.id"
                                class="flex justify-between gap-x-6 mb-2 bg-gray-900 py-5 border border-gray-700/50 px-2 rounded-lg">
                                <div class="flex min-w-0 pl-3 gap-x-4">
<!--                                    <img v-if="category.photo!=null"-->
<!--                                         :src="category.full_photo_path"-->
<!--                                         alt="" class="h-16	w-16 flex-none rounded-full bg-gray-50"/>-->
<!--                                    <div v-else-->
<!--                                         class="h-16 w-16 select-none flex-none flex items-center justify-center rounded-full bg-gray-500"-->
<!--                                         v-text="'?'"/>-->
                                    <div class="min-w-0 flex-auto">
                                        <p class="font-semibold text-lg leading-6 text-gray-100">
                                            {{category.name  }}</p>
                                        <p class="mt-1  text-sm leading-5 text-gray-300"><b>description:</b> {{ category.description }}</p>
                                    </div>
                                </div>
                                <div class="sm:flex sm:flex-col sm:items-end">
                                    <div class="mt-1 flex items-center">
                                        <SecondaryButton class="m-1" type="button" @click="edit(category.id)">
                                            <PencilIcon class="h-5"/>
                                        </SecondaryButton>
                                        <DangerButton class="m-1" type="button" @click="destroy(category.id)">
                                            <TrashIcon class="h-5"/>
                                        </DangerButton>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

