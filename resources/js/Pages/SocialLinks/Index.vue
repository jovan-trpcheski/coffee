<script setup>
import {Head, router} from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import DangerButton from "@/Components/DangerButton.vue";
import {PencilIcon, TrashIcon} from '@heroicons/vue/24/solid'

defineProps({socialLinks: Object})

function destroy(socialLink_id) {
    if (confirm('Are you sure you want to delete this socialLink?')) {
        router.delete(route('social-links.destroy', socialLink_id))
    }
}

function edit(socialLink_id) {
    router.visit(route('social-links.edit', socialLink_id))
}

function create() {
    router.visit(route('social-links.create'))
}
</script>
<template>
    <Head title="Social Media Links"/>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Social Media Links</h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="grid grid-cols-2 gap-4 p-6 text-gray-900 dark:text-gray-100">
                            <div class=" text-xl m-2 ">Do you want to add a new social media link?</div>
                            <PrimaryButton class="flex items-center justify-center md:h-10 m-2 text-center"
                                           @click="create()">
                                Add new social media link
                            </PrimaryButton>
                        </div>
                        <ul role="list">
                            <li v-for="socialLink in socialLinks" :key="socialLink.id"
                                class="flex justify-between gap-x-6 mb-2 bg-gray-900 py-5 border border-gray-700/50 px-2 rounded-lg">
                                <div class="flex pl-3 min-w-0 gap-x-4">
                                    <img v-if="socialLink.svg!=null"
                                         :src="socialLink.full_photo_path"
                                         alt="" class="h-16	w-16 flex-none rounded-md"/>
                                    <div v-else
                                         class="h-16 w-16 select-none flex-none flex items-center justify-center rounded-md bg-gray-500"
                                         v-text="'?'"/>
                                    <div class="min-w-0 flex-auto">
                                        <p class="font-semibold text-lg leading-6 text-gray-100">
                                            {{ socialLink.name }}</p>
                                        <a :href="socialLink.link" target="_blank" class="mt-1 text-sm leading-5 text-gray-300 hover:text-blue-400"> {{
                                                socialLink.link
                                            }}</a>
                                    </div>
                                </div>
                                <div class=" shrink-0 sm:flex sm:flex-col sm:items-end">
                                    <div class="mt-1 flex items-center">
                                        <SecondaryButton class="m-1" type="button" @click="edit(socialLink.id)">
                                            <PencilIcon class="h-5"/>
                                        </SecondaryButton>
                                        <DangerButton class="m-1" type="button" @click="destroy(socialLink.id)">
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



