<template>
    <AppLayout title="Students">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create Student
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <CreateStudentForm :universities="universities" />
            </div>
        </div>
    </AppLayout>
</template>

<script>
import { defineComponent } from 'vue'
import AppLayout from '../../Layouts/AppLayout';
import CreateStudentForm from "./Partials/CreateStudentForm";

export default defineComponent({
    components: {
        CreateStudentForm,
        AppLayout,
    },

    props: [
        'universities'
    ]
})
</script>

<style scoped>

</style>
