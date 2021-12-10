<template>
    <jet-form-section @submitted="createStudent">
        <template #title>
            Student Details
        </template>

        <template #description>
            Create a new student to collaborate with others on projects.
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
                <jet-label for="first_name" value="First Name" />
                <jet-input id="first_name" type="text" class="block w-full mt-1" v-model="form.first_name" autofocus />
                <jet-input-error :message="form.errors.first_name" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <jet-label for="last_name" value="Last Name" />
                <jet-input id="last_name" type="text" class="block w-full mt-1" v-model="form.last_name" autofocus />
                <jet-input-error :message="form.errors.last_name" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <jet-label for="birthdate" value="Birthdate" />
                <jet-input id="birthdate" type="date" class="block w-full mt-1" v-model="form.birthdate" autofocus />
                <jet-input-error :message="form.errors.birthdate" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <jet-label for="dni" value="ID Number" />
                <jet-input id="dni" type="text" class="block w-full mt-1" v-model="form.dni" autofocus />
                <jet-input-error :message="form.errors.dni" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <jet-label for="email" value="Email" />
                <jet-input id="email" type="email" class="block w-full mt-1" v-model="form.email" autofocus />
                <jet-input-error :message="form.errors.email" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <jet-label for="phone" value="Phone" />
                <jet-input id="phone" type="text" class="block w-full mt-1" v-model="form.phone" autofocus />
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
                first_name: '',
                last_name: '',
                birthdate: '',
                dni: '',
                email: '',
                phone: '',
            })
        }
    },
    methods: {
        createStudent() {
            this.form.post(route('students.store'), {
                errorBag: 'createStudent',
                preserveScroll: true
            });
        },
    },
})
</script>

<style scoped>

</style>
