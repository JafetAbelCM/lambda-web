<template>
    <AppLayout title="Universities">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Universities
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <div class="grid grid-cols-2 gap-4 place-content-center mb-4">
                    <form @submit="console.log('DEBUG')" class="col-span-1">
                        <div>
                            <JetInput id="name" type="text" class="block w-full" placeholder="Search" autofocus />
                        </div>
                    </form>
                    <div class="col-span-1">
                        <div class="flex justify-end">
                            <ButtonLink :href="route('universities.create')" class="py-3">
                                Registrar Universidad
                            </ButtonLink>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <template v-for="(university, refId) of universities" :key="refId">
                        <Link :href="route('universities.show', refId)">
                            <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">

                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-20 w-20">
                                        <img class="h-20 w-20 rounded-full" src="https://images.unsplash.com/photo-1611162617263-4ec3060a058e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=4&w=256&h=256&q=80" alt="">
                                    </div>
                                    <div class="flex-grow ml-4">
                                        <div class="text-xl font-bold text-gray-900">
                                            {{ university.name }}
                                        </div>
                                        <div class="text-sm text-gray-500">
                                            {{ university.description }}
                                        </div>
                                        <div class="text-sm text-gray-500">
                                            {{ 'Ranking' }}
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="flex items-center justify-start space-x-4 px-4 py-3 bg-white bg-gray-50 shadow text-right sm:px-6 sm:rounded-bl-md sm:rounded-br-md">
                                <div>
                                    <Link href="#" class="group flex px-2 py-1 text-sm rounded-md border border-gray-50 hover:border-gray-200 hover:bg-gray-100">
                                        <ChartPieIcon class="h-5 w-5 text-gray-300 group-hover:text-gray-400"/>
                                    </Link>
                                </div>
                                <div>
                                    <Link href="#" class="group flex px-2 py-1 text-sm rounded-md border border-gray-50 hover:border-gray-200 hover:bg-gray-100">
                                        <ClockIcon class="h-5 w-5 text-gray-300 group-hover:text-gray-400"/>
                                    </Link>
                                </div>
                                <div>
                                    <Link href="#" class="group flex px-2 py-1 text-sm rounded-md border border-gray-50 hover:border-gray-200 hover:bg-gray-100">
                                        <ChartBarIcon class="h-5 w-5 text-gray-300 group-hover:text-gray-400"/>
                                    </Link>
                                </div>
                                <div>
                                    <Link href="#" class="group flex px-2 py-1 text-sm rounded-md border border-gray-50 hover:border-gray-200 hover:bg-gray-100">
                                        <CogIcon class="h-5 w-5 text-gray-300 group-hover:text-gray-400"/>
                                    </Link>
                                </div>
                            </div>
                        </Link>
                    </template>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script>
import { defineComponent } from 'vue'
import { Link } from '@inertiajs/inertia-vue3'
import { ChartBarIcon, ChartPieIcon, ClockIcon, CogIcon } from '@heroicons/vue/outline'
import AppLayout from '@/Layouts/AppLayout.vue'
import JetFormSection from '../../Jetstream/FormSection'
import JetButton from '../../Jetstream/Button'
import JetInput from '../../Jetstream/Input'
import ButtonLink from "../../Components/ButtonLink";

export default defineComponent ({
    components: {
        ButtonLink,
        AppLayout,
        ChartBarIcon,
        ChartPieIcon,
        ClockIcon,
        CogIcon,
        JetButton,
        JetFormSection,
        JetInput,
        Link,
    },
    props: [
        'universities'
    ],
})
</script>

<style scoped>

</style>
