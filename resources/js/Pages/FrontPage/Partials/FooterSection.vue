<script setup>
import {usePage} from "@inertiajs/vue3";

const socialLinks = usePage().props.socialLinks;
const basicInfo = usePage().props.basicInfo;
</script>

<template>
    <div class="bg-gray-900 dark:text-white">
        <div class="px-4 pt-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 ">
            <div class="grid gap-10 row-gap-6 mb-8 sm:grid-cols-2 md:justify-between lg:grid-cols-4">
                <div class="sm:col-span-3 space-y-2 text-md">
                    <p class="text-base font-bold tracking-wide text-gray-900 dark:text-white/75">Contacts</p>
                    <div v-if="basicInfo.phone" class="flex">
                        <p class="mr-1 text-gray-800 dark:text-white font-bold">Phone:</p>
                        <a :href="'tel:'+basicInfo.phone" class="hover:text-blue-400" aria-label="Our phone"
                           title="Our phone">{{ basicInfo.phone }}</a>
                    </div>
                    <div v-if="basicInfo.address" class="flex">
                        <p class="mr-1 text-gray-800 dark:text-white font-bold">Address:</p>
                        <p aria-label="Our address"
                           title="Our address">
                            {{ basicInfo.address }}
                        </p>
                    </div>
                    <div v-if="basicInfo.email" class="flex">
                        <p class="mr-1 text-gray-800 dark:text-white font-bold">Email:</p>
                        <a :href="'mailto:'+basicInfo.email" class="hover:text-blue-400" aria-label="Our email"
                           title="Our email">{{ basicInfo.email }}</a>
                    </div>
                </div>

                <div>
                    <span class="text-base font-bold tracking-wide text-gray-900 dark:text-white/75">Social</span>
                    <div class="flex items-left mt-1 space-x-3 ">
                        <a v-for="socialLink in socialLinks"
                           :href="socialLink.link"
                           class="text-gray-700 transition hover:text-gray-700/75 dark:text-white dark:hover:text-white/75"
                           rel="noreferrer"
                           target="_blank"
                        >
                            <span class="sr-only"> {{ socialLink.name }} </span>
                            <img v-if="socialLink.svg" :src="socialLink.full_photo_path" class="h-6 w-6 img-fluid"/>
                        </a>
                    </div>
                    <p class="mt-4 text-sm text-gray-100">
                        Make sure you follow us on Social Media, so you can be up to date with our promotions and
                        discounts.
                    </p>
                </div>
            </div>
            <div class="flex flex-col-reverse justify-between pt-5 pb-10 border-t lg:flex-row">
                <p class="text-sm text-gray-600 dark:text-white/50">
                    © 2023 {{ basicInfo.name }}.  All Rights Reserved.
                </p>
                <div class="flex flex-col mb-3 space-y-2 lg:mb-0 sm:space-y-0 sm:space-x-1 sm:flex-row dark:text-white/50">
                    <p>Made by</p><a
                    class="text-gray-600 dark:text-white/75 transition-colors duration-300 hover:text-blue-400"
                    href="https://www.facebook.com/jovan.trpcheski/"
                    target="_blank">Jovan Trpcheski</a>
                </div>
            </div>
        </div>

    </div>
</template>
