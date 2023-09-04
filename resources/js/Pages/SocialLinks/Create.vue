<script setup>
import { Head,useForm, usePage } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import {ref} from "vue";


const form = useForm({
    name: null,
    link: null,
    svg:null,

})


const preview = ref(null)
const svg = ref(null)

function previewSvg(event) {
    const input = event.target
    if (input.files) {
        const reader = new FileReader()
        reader.onload = (e) => {
            preview.value = e.target.result
        }
        svg.value = input.files[0]
        reader.readAsDataURL(input.files[0])
    }
}
</script>

<template>
    <Head title="Create a Social Link" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Add new Social Media Link</h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <form @submit.prevent="form.post(route('social-links.store' ))" class="mt-6 space-y-6">
                            <!-- name -->
                            <div>
                                <InputLabel for="name" value="Social network name" />
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
                            <!-- link -->
                            <div>
                                <InputLabel for="link" value="Link" />
                                <TextInput
                                    id="link"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.link"
                                    autofocus
                                    autocomplete="link"
                                />
                                <InputError class="mt-2" :message="form.errors.link" />
                            </div>
                            <!-- svg -->
                            <div class="form-group ">
                                <InputLabel for="svg" value="SVG"/>
                                <input type="file" accept="svg/*" @change="previewSvg" class="form-control-file"
                                       id="svg"  @input="form.svg = $event.target.files[0]"/>

                                <div v-if="preview" class="border  p-2 mt-3">
                                    <p>Preview:</p>
                                    <template v-if="preview">
                                        <img :src="preview" class="h-12 w-12 img-fluid"/>
                                    </template>
                                </div>
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
