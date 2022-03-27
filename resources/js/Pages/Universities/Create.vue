<template>
    <AppLayout title="Create University">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Registra una Universidad
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <CreateUniversityForm />
            </div>
        </div>
    </AppLayout>
</template>

<script>
import { defineComponent } from 'vue'
import AppLayout from '@/Layouts/AppLayout';
import CreateUniversityForm from "./Partials/CreateUniversityForm";

export default defineComponent({
    components: {
        CreateUniversityForm,
        AppLayout,
    }
})
</script>

<style scoped>

</style>
