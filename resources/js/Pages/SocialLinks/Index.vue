<script setup>
import { Head, router } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import DangerButton from "@/Components/DangerButton.vue";
import {PencilIcon, TrashIcon} from '@heroicons/vue/24/solid'


defineProps({ socialLinks: Object })
function destroy(socialLink_id) {
    if (confirm('Are you sure you want to delete this socialLink?')) {
        router.delete(route('social-links.destroy', socialLink_id))
    }
}
function edit(socialLink_id) {
    router.visit(route('social-links.edit', socialLink_id))
}

function create(){
    router.visit(route('social-links.create'))
}

</script>
<template>
    <Head title="Social Media Links" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Social Media Links</h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <table class="table-auto min-w-full ">
                            <thead class="text-bold text-justify border-b-2 bg-white dark:bg-gray-700">
                                <tr>
                                    <th>IMAGE</th>
                                    <th>NAME</th>
                                    <th>LINK</th>
                                    <th>Actions</th>

                                </tr>
                            </thead>
                            <tbody >
                            <tr v-for="socialLink in socialLinks" :key="socialLink.id">
                                <td>
                                    <img v-if="socialLink.svg!=null" :alt=socialLink.name :src=socialLink.full_photo_path
                                         class="relative inline-block h-10 w-10 p-1 rounded-lg object-cover object-center">
                                </td>
                                <td>{{socialLink.name}}</td>
                                <td>{{socialLink.link}}</td>
                                <td>
                                        <SecondaryButton class="m-2" type="button" @click="edit(socialLink.id)"><PencilIcon class="h-4"/></SecondaryButton>
                                        <DangerButton class="m-2" type="button" @click="destroy(socialLink.id)"><TrashIcon class="h-4"/></DangerButton>
                                </td>
                            </tr>
                            <tr class="text-center border-t-2" >
                                <td colspan="6">
                                    <PrimaryButton class="m-2" type="button" @click="create()">Add a new social link</PrimaryButton>
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



