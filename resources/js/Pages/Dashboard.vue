<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, router} from '@inertiajs/vue3';
import PrimaryButton from "@/Components/PrimaryButton.vue";
</script>

<template>
    <Head title="Dashboard"/>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 p-6 text-gray-900 dark:text-gray-100">
                        <div class="p-4 text-xl font-semibold md:col-span-2">
                            Manage your site settings and content:
                        </div>
                        <PrimaryButton class="flex items-center justify-center h-20 m-2 text-center" type="button"
                                       @click="router.visit(route('info'))">Info
                        </PrimaryButton>
                        <PrimaryButton class="flex items-center justify-center h-20 m-2 text-center" type="button"
                                       @click="router.visit(route('products.index'))">Products
                        </PrimaryButton>
                        <PrimaryButton class="flex items-center justify-center h-20 m-2 text-center" type="button"
                                       @click="router.visit(route('categories.index'))">Categories
                        </PrimaryButton>
                        <PrimaryButton class="flex items-center justify-center h-20 m-2 text-center" type="button"
                                       @click="router.visit(route('social-links.index'))">Social Media Links
                        </PrimaryButton>

                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
