<template>
    <section class="bg-gray-800 flex items-center justify-center">

        <div class="w-full max-w-screen-xl px-4 py-16 sm:px-0">
            <TabGroup>
                <TabList class="flex mx-6 space-x-1 rounded-xl bg-blue-900/20 p-1">
                    <Tab
                        v-for="category in categories"
                        :key="category.name"
                        v-slot="{ selected }"
                        as="template"
                    >
                        <button
                            :class="[
              'w-full rounded-lg py-2.5 text-sm font-medium leading-5 text-white-700',
              selected
                ? 'bg-white shadow'
                : 'text-blue-100 hover:bg-white/[0.12] hover:text-white',
            ]"
                        >
                            {{ category.name }}
                        </button>
                    </Tab>
                </TabList>

                <TabPanels class="mt-2">
                    <TabPanel
                        v-for="category in categories"
                        :key="category.id"
                        :class="[
            'rounded-xl bg-gray-900 p-3',
            'ring-white ring-opacity-60 ring-offset-2 ring-offset-blue-400 focus:outline-none focus:ring-2',
          ]"
                    >
                        <div class="bg-gray-900">
                            <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6 ">
                                <div  class="grid gap-4 mb-6 lg:mb-16 md:grid-cols-2">
                                    <div
                                        v-for="product in category.products"
                                        :key="product.id"
                                        class="items-center rounded-lg shadow flex bg-gray-800 border-gray-700">
                                        <p class="flex-none">
                                            <img v-if="product.photo!=null" class=" w-24 h-24 rounded-lg sm:rounded-none sm:rounded-l-lg" :src=" product.full_photo_path" :alt="product.name">
                                            <img v-else class=" w-24 h-24 rounded-lg sm:rounded-none sm:rounded-l-lg" src="default.jpg" :alt="product.name">
                                        </p>
                                        <div class="p-5 items-right">
                                            <h3 class="text-md md:text-xl font-bold tracking-tight text-white">
                                                <p>{{ product.name }} - ${{ product.price }}</p>
                                            </h3>
                                            <p class="text-gray-400 text-sm ">{{ product.description }}</p>
                                        </div>
                                    </div>
                              </div>
                            </div>
                        </div>
                    </TabPanel>
                </TabPanels>
            </TabGroup>
        </div>
    </section>


</template>

<script setup>
import {TabGroup, TabList, Tab, TabPanels, TabPanel} from '@headlessui/vue'
import {usePage} from "@inertiajs/vue3";

const categories = usePage().props.categories;
</script>

