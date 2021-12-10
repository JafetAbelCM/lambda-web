<template>
    <AppLayout title="Me">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $page.props.user.name }}
            </h2>
        </template>

    </AppLayout>
</template>

<script>
import { defineComponent } from 'vue';
import AppLayout from "../../Layouts/AppLayout";

export default defineComponent({
    components: {
        AppLayout
    }
})
</script>

<style scoped>

</style>
