<template>
    <jet-form-section @submitted="createUniversity">
        <template #title>
            University Details
        </template>

        <template #description>
            Create a new university to collaborate with others on projects.
        </template>

        <template #form>
            <div class="col-span-6">
                <jet-label value="Owner" />

                <div class="flex items-center mt-2">
                    <img class="object-cover w-12 h-12 rounded-full" :src="$page.props.user.profile_photo_url" :alt="$page.props.user.name">

                    <div class="ml-4 leading-tight">
                        <div>{{ $page.props.user.name }}</div>
                        <div class="text-sm text-gray-700">{{ $page.props.user.email }}</div>
                    </div>
                </div>
            </div>

            <div class="col-span-6 sm:col-span-4">
                <jet-label for="name" value="Name" />
                <jet-input id="name" type="text" class="block w-full mt-1" v-model="form.name" autofocus />
                <jet-input-error :message="form.errors.name" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <jet-label for="description" value="Description" />
                <jet-input id="description" type="text" class="block w-full mt-1" v-model="form.description" />
                <jet-input-error :message="form.errors.description" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <jet-label for="logo_url" value="Logo URL" />
                <jet-input id="logo_url" type="text" class="block w-full mt-1" v-model="form.logo_url" />
                <jet-input-error :message="form.errors.logo_url" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <jet-label for="email" value="Email" />
                <jet-input id="email" type="email" class="block w-full mt-1" v-model="form.email" />
                <jet-input-error :message="form.errors.email" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <jet-label for="phone" value="Phone" />
                <jet-input id="phone" type="text" class="block w-full mt-1" v-model="form.phone" />
                <jet-input-error :message="form.errors.phone" class="mt-2" />
            </div>

        </template>

        <template #actions>
            <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Create
            </jet-button>
        </template>
    </jet-form-section>
</template>

<script>
import { defineComponent } from 'vue'
import JetButton from '../../../Jetstream/Button.vue'
import JetFormSection from '../../../Jetstream/FormSection.vue'
import JetInput from '../../../Jetstream/Input.vue'
import JetInputError from '../../../Jetstream/InputError.vue'
import JetLabel from '../../../Jetstream/Label.vue'

export default defineComponent({
    components: {
        JetButton,
        JetFormSection,
        JetInput,
        JetInputError,
        JetLabel,
    },
    data() {
        return {
            form: this.$inertia.form({
                name: null,
                description: null,
                email: null,
                phone: null,
            }),
        }
    },
    methods: {
        createUniversity() {
            this.form.post(route('universities.store'), {
                errorBag: 'createUniversity',
                preserveScroll: true
            });
        },
    },
})
</script>

<style scoped>

</style>
