<script setup>
import { Head,useForm, usePage } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import {ref} from "vue";

const categories = usePage().props.categories;

const form = useForm({
    name: null,
    description: null,
    category_id: null,
    price: null,
    photo:null,
    categories: categories

})


const preview = ref(null)
const photo = ref(null)

function previewPhoto(event) {
    const input = event.target
    if (input.files) {
        const reader = new FileReader()
        reader.onload = (e) => {
            preview.value = e.target.result
        }
        photo.value = input.files[0]
        reader.readAsDataURL(input.files[0])
    }
}
</script>

<template>
    <Head title="Create a product" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Create a new product</h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <form @submit.prevent="form.post(route('products.store' ))" class="mt-6 space-y-6">
                            <!-- name -->
                            <div>

                                <InputLabel for="name" value="Product name" />
                                <TextInput
                                    id="name"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.name"
                                    required
                                    autofocus
                                    autocomplete="name"
                                />
                                <InputError class="mt-2" :message="form.errors.name" />
                            </div>
                            <!-- description -->
                            <div>
                                <InputLabel for="description" value="Description" />
                                <TextInput
                                    id="description"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.description"
                                    autofocus
                                    autocomplete="description"
                                />
                                <InputError class="mt-2" :message="form.errors.description" />
                            </div>
                            <!-- category -->
                            <div>
                                <InputLabel for="Category" value="Category" />
                                <select
                                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                                    v-model="form.category_id"
                                     required>
                                    <option v-for="category in categories" v-bind:value="category.id">
                                        {{ category.name }}
                                    </option>
                                </select>
                                <InputError class="mt-2" :message="form.errors.category_id" />
                            </div>
                            <!-- price -->
                            <div>
                                <InputLabel for="price" value="Price" />
                                <TextInput
                                    id="price"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.price"
                                    autofocus
                                    autocomplete="price"
                                />
                                <InputError class="mt-2" :message="form.errors.price" />
                            </div>
                            <!-- photo -->
                            <div class="form-group">
                                <InputLabel for="photo" value="Photo"/>
                                <input type="file" accept="photo/*" @change="previewPhoto" class="form-control-file"
                                       id="photo"  @input="form.photo = $event.target.files[0]"/>

                                <div v-if="preview" class="border p-2 mt-3">
                                    <p>Preview:</p>
                                    <template v-if="preview">
                                        <img :src="preview" class="img-fluid h-20"/>
                                    </template>
                                </div>
                                <InputError class="mt-2" :message="form.errors.photo" />

                            </div>
                            <!-- submit -->
                            <div class="flex items-center gap-4">
                                <PrimaryButton :disabled="form.processing">Save</PrimaryButton>

                                <Transition enter-from-class="opacity-0" leave-to-class="opacity-0" class="transition ease-in-out">
                                    <p v-if="form.recentlySuccessful" class="text-sm text-gray-600 dark:text-gray-400">Saved.</p>
                                </Transition>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>

</template>
