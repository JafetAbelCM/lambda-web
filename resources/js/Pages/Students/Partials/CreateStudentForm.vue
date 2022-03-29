<template>
    <jet-form-section @submitted="createStudent">
        <template #title>
            Detalles del Alumno
        </template>

        <template #description>
            Registra un nuevo alumno a la aplicación
        </template>

        <template #form>
            <input type="hidden" id="owner" v-model="form.owner">

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
                <jet-label for="first_name" value="Primer Nombre" />
                <jet-input id="first_name" type="text" class="block w-full mt-1" v-model="form.first_name" autofocus />
                <jet-input-error :message="form.errors.first_name" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <jet-label for="last_name" value="Apellidos" />
                <jet-input id="last_name" type="text" class="block w-full mt-1" v-model="form.last_name" autofocus />
                <jet-input-error :message="form.errors.last_name" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <jet-label for="birthdate" value="Fecha de Nacimiento" />
                <jet-input id="birthdate" type="date" class="block w-full mt-1" v-model="form.birthdate" autofocus />
                <jet-input-error :message="form.errors.birthdate" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <jet-label for="dni" value="Número de identidad" />
                <jet-input id="dni" type="text" class="block w-full mt-1" v-model="form.dni" autofocus />
                <jet-input-error :message="form.errors.dni" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <jet-label for="email" value="Correo Electrónico" />
                <jet-input id="email" type="email" class="block w-full mt-1" v-model="form.email" autofocus />
                <jet-input-error :message="form.errors.email" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <jet-label for="phone" value="Telefono de Contacto" />
                <jet-input id="phone" type="text" class="block w-full mt-1" v-model="form.phone" autofocus />
                <jet-input-error :message="form.errors.phone" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <jet-label for="university" value="Universidad " />
                <select id="university" v-model="form.university" autocomplete="university-name" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">

                    <option value="" selected></option>
                    <option v-for="(university, refId) in universities" :key="refId" :value="university.name">
                        {{ university.description }}
                    </option>
                </select>
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

    props: [
        'user',
        'universities'
    ],

    data() {
        return {
            form: this.$inertia.form({
                first_name: '',
                last_name: '',
                birthdate: '',
                dni: '',
                email: '',
                phone: '',
                university: '',
                owner: 0,
            }),
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

    mounted() {
        this.form.owner = this.$page.props.user.id
    },
})
</script>

<style scoped>

</style>
