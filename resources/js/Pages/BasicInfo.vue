<script setup>
import {Head, useForm, usePage} from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import {ref} from "vue";

const basicInfo = usePage().props.basicInfo??null;

const form = useForm({
    id: basicInfo.id,
    name: basicInfo.name,
    description: basicInfo.description,
    phone: basicInfo.phone,
    address: basicInfo.address,
    email: basicInfo.email,
    meta_title: basicInfo.meta_title,
    meta_description: basicInfo.meta_description,
    meta_picture: null,
    full_meta_picture_path: basicInfo.full_meta_picture_path
})

const preview = ref(null)
const meta_picture = ref(null)

function previewPhoto(event) {
    const input = event.target
    if (input.files) {
        const reader = new FileReader()
        reader.onload = (e) => {
            preview.value = e.target.result
        }
        meta_picture.value = input.files[0]
        reader.readAsDataURL(input.files[0])
    }
}
</script>

<template>
    <Head title="Information" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Basic Info</h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <form class="mt-6 space-y-6" @submit.prevent="form.post(route('info.update', form.id) )">
                            <!-- name -->
                            <div>
                                <InputLabel for="name" value="Company name"/>
                                <TextInput
                                    id="name"
                                    v-model="form.name"
                                    autocomplete="name"
                                    autofocus
                                    class="mt-1 block w-full"
                                    required
                                    type="text"
                                />
                                <InputError :message="form.errors.name" class="mt-2"/>
                            </div>
                            <!-- description -->
                            <div>
                                <InputLabel for="description" value="Description"/>
                                <textarea
                                    id="description"
                                    v-model="form.description"
                                    autocomplete="description"
                                    autofocus
                                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                                    required
                                    rows="2"
                                    type="textarea"
                                />

                                <InputError :message="form.errors.description" class="mt-2"/>
                            </div>
                            <!-- phone -->
                            <div>
                                <InputLabel for="phone" value="Phone"/>
                                <TextInput
                                    id="phone"
                                    v-model="form.phone"
                                    autocomplete="phone"
                                    autofocus
                                    class="mt-1 block w-full"
                                    type="text"
                                />
                                <InputError :message="form.errors.phone" class="mt-2"/>
                            </div>
                            <!-- address -->
                            <div>
                                <InputLabel for="address" value="Address"/>
                                <TextInput
                                    id="address"
                                    v-model="form.address"
                                    autocomplete="address"
                                    autofocus
                                    class="mt-1 block w-full"
                                    type="text"
                                />

                                <InputError :message="form.errors.address" class="mt-2"/>
                            </div>
                            <!-- email -->
                            <div>
                                <InputLabel for="email" value="Email"/>
                                <TextInput
                                    id="email"
                                    v-model="form.email"
                                    autocomplete="email"
                                    autofocus
                                    class="mt-1 block w-full"
                                    type="text"
                                />

                                <InputError :message="form.errors.email" class="mt-2"/>
                            </div>
                            <!-- meta title -->
                            <div>
                                <InputLabel for="meta_title" value="Meta Title"/>
                                <TextInput
                                    id="meta_title"
                                    v-model="form.meta_title"
                                    autocomplete="meta_title"
                                    autofocus
                                    class="mt-1 block w-full"
                                    required
                                    type="text"
                                />
                                <InputError :message="form.errors.meta_title" class="mt-2"/>
                            </div>
                            <!-- meta description -->
                            <div>
                                <InputLabel for="meta_description" value="Meta Description"/>
                                <TextInput
                                    id="meta_description"
                                    v-model="form.meta_description"
                                    autocomplete="meta_description"
                                    autofocus
                                    class="mt-1 block w-full"
                                    required
                                    type="text"
                                />
                                <InputError :message="form.errors.meta_description" class="mt-2"/>
                                <p :class="{ 'text-yellow-600': form.meta_description.length>160||form.meta_description.length<50 }"
                                   class="font-bold text-green-600">
                                    Try to keep this shorter than 160 characters and longer than 50.<br>
                                    You now have: {{ form.meta_description.length }} characters</p>

                            </div>
                            <!-- meta picture -->
                            <div>
                                <InputLabel for="meta_picture" value="Meta Picture"/>
                                <input id="meta_picture" accept="photo/*" class="form-control-file" type="file"
                                       @change="previewPhoto" @input="form.meta_picture = $event.target.files[0]"/>
                                <InputError :message="form.errors.meta_picture" class="mt-2"/>

                                <div v-if="basicInfo.meta_picture||preview" class="border p-2 mt-3">
                                    <p>Preview:</p>
                                    <template v-if="preview">
                                        <img :src="preview" class="img-fluid h-64 "/>
                                    </template>
                                    <template v-if="basicInfo.meta_picture&&!preview">
                                        <img :src="basicInfo.full_meta_picture_path" class="img-fluid h-64 "/>
                                    </template>
                                </div>
                            </div>

                            <!-- submit -->
                            <div class="flex items-center gap-4">
                                <PrimaryButton :disabled="form.processing">Save</PrimaryButton>

                                <Transition class="transition ease-in-out" enter-from-class="opacity-0"
                                            leave-to-class="opacity-0">
                                    <p v-if="form.recentlySuccessful" class="text-sm text-gray-600 dark:text-gray-400">
                                        Saved.</p>
                                </Transition>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>

</template>

