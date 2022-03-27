<template>
    <jet-form-section @submitted="createUniversity">
        <template #title>
            Detalles de la Universidad
        </template>

        <template #description>
            Registra una Universidad a la base de datos
        </template>

        <template #form>
            <div class="col-span-6">
                <jet-label value="Usuario" />

                <div class="flex items-center mt-2">
                    <img class="object-cover w-12 h-12 rounded-full" :src="$page.props.user.profile_photo_url" :alt="$page.props.user.name">

                    <div class="ml-4 leading-tight">
                        <div>{{ $page.props.user.name }}</div>
                        <div class="text-sm text-gray-700">{{ $page.props.user.email }}</div>
                    </div>
                </div>
            </div>

            <div class="col-span-6 sm:col-span-4">
                <jet-label for="name" value="Institución" />
                <jet-input id="name" type="text" class="block w-full mt-1" v-model="form.name" autofocus />
                <jet-input-error :message="form.errors.name" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <jet-label for="description" value="Descripción" />
                <jet-input id="description" type="text" class="block w-full mt-1" v-model="form.description" />
                <jet-input-error :message="form.errors.description" class="mt-2" />
            </div>

            <!--
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="logo_url" value="Logo URL" />
                <jet-input id="logo_url" type="text" class="block w-full mt-1" v-model="form.logo_url" />
                <jet-input-error :message="form.errors.logo_url" class="mt-2" />
            </div>
            -->


            <div class="col-span-6 sm:col-span-4">
                <jet-label for="email" value="Correo Institucional" />
                <jet-input id="email" type="email" class="block w-full mt-1" v-model="form.email" />
                <jet-input-error :message="form.errors.email" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <jet-label for="phone" value="Contacto de Oficina" />
                <jet-input id="phone" type="text" class="block w-full mt-1" v-model="form.phone" />
                <jet-input-error :message="form.errors.phone" class="mt-2" />
            </div>

        </template>

        <template #actions>
            <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Registrar
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
