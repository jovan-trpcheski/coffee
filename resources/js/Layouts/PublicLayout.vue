<template>
    <div>
        <header class="sticky top-0 border-b">
            <nav class=" border-gray-200 px-4 lg:px-6 py-2.5 bg-gray-800">
                <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
                    <a class="flex items-center" href="#">
                        <ApplicationLogo class="mr-3 h-6 sm:h-9 fill-current text-gray-500"/>
                        <span
                            class="self-center text-xl font-semibold whitespace-nowrap text-white">{{
                                basicInfo.name
                            }}</span>
                    </a>
                    <div class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1">
                        <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">

                            <li v-for="item in navigation" :key="item.name" >
                                <a :href="item.href"
                                   class="block py-2 pr-4 pl-3 text-gray-400 border-b border-gray-100
                                   lg:border-0 lg:p-0 hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">
                                    {{item.name}}
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="flex lg:hidden">
                        <button class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700"
                                type="button"
                                @click="mobileMenuOpen = true">
                            <span class="sr-only">Open main menu</span>
                            <Bars3Icon aria-hidden="true" class="h-6 w-6"/>
                        </button>
                    </div>

                    <Dialog :open="mobileMenuOpen" as="div" class="lg:hidden" @close="mobileMenuOpen = false">
                        <div class="fixed inset-0 z-50"/>
                        <DialogPanel
                            class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
                            <div class="flex items-center justify-between">
                                <a class="-m-1.5 p-1.5" href="#">
                                    <ApplicationLogo class="h-8 w-auto fill-current text-gray-500"/>
                                </a>
                                <button class="-m-2.5 rounded-md p-2.5 text-gray-700" type="button"
                                        @click="mobileMenuOpen = false">
                                    <span class="sr-only">Close menu</span>
                                    <XMarkIcon aria-hidden="true" class="h-6 w-6"/>
                                </button>
                            </div>
                            <div class="mt-6 flow-root">
                                <div class="-my-6 divide-y divide-gray-500/10">
                                    <div class="space-y-2 py-6">
                                        <a @click="mobileMenuOpen = false" v-for="item in navigation" :key="item.name" :href="item.href"
                                           class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50
                                   lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700
                                   lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700
                                   dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">>{{ item.name }}</a>
                                    </div>
                                </div>
                            </div>
                        </DialogPanel>
                    </Dialog>
                </div>
            </nav>
        </header>
        <div class="overflow-auto overflow-visible	">
            <slot/>

        </div>
    </div>
</template>

<script setup>
import {ref} from 'vue'
import {Dialog, DialogPanel} from '@headlessui/vue'
import {Bars3Icon, XMarkIcon} from '@heroicons/vue/24/outline'
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import {usePage} from "@inertiajs/vue3";


const basicInfo = usePage().props.basicInfo;

const navigation = [
    {name: 'About Us', href: '#about-us'},
    {name: 'Menu', href: '#menu'},
    {name: 'Contact', href: '#footer'},

]

let mobileMenuOpen = ref(false)
</script>
