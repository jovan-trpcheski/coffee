<script setup>
import {Head, useForm, router, usePage} from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import {ref} from 'vue'

const category = usePage().props.category;
const form = useForm({
    forceFormData: true,
    _method: "PUT",
    id: category.id,
    name: category.name,
    description: category.description,
    photo: category.photo,

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
    <Head title="Edit category"/>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Edit category</h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <form class="mt-6 space-y-6"
                              @submit.prevent="form.post(route('categories.update', form.id))">
                            <!-- name -->
                            <div>

                                <InputLabel for="name" value="Category name"/>
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
                                <TextInput
                                    id="description"
                                    v-model="form.description"
                                    autocomplete="description"
                                    autofocus
                                    class="mt-1 block w-full"
                                    type="text"
                                />
                                <InputError :message="form.errors.description" class="mt-2"/>
                            </div>
<!--                            &lt;!&ndash; photo &ndash;&gt;-->

<!--                            <div class="form-group">-->
<!--                                <InputLabel for="photo" value="Photo"/>-->
<!--                                <input id="photo" accept="photo/*" class="form-control-file" type="file"-->
<!--                                       @change="previewPhoto" @input="form.photo = $event.target.files[0]"/>-->
<!--                                <InputError :message="form.errors.photo" class="mt-2"/>-->

<!--                                <div v-if="category.photo||preview" class="border p-2 mt-3">-->
<!--                                    <p>Preview:</p>-->
<!--                                    <template v-if="preview">-->
<!--                                        <img :src="preview" class="img-fluid"/>-->
<!--                                    </template>-->
<!--                                    <template v-if="category.photo&&!preview">-->
<!--                                        <img :src="category.full_photo_path" class="img-fluid"/>-->
<!--                                    </template>-->
<!--                                </div>-->
<!--                            </div>-->


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
