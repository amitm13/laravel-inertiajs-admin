<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12 flex">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex-initial">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg float-left">
                    <inertia-link href="/users">
                        <div class="p-3 m-3">
                            <span class="font-bold">Total User:</span>
                            <span class="bg-gray-800 px-2 text-white rounded m-3">{{ (users_count) ? users_count : 0 }}</span>
                        </div>
                    </inertia-link>
                </div>
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg float-left ml-4">
                    <inertia-link href="/roles">
                        <div class="p-3 m-3">
                            <span class="font-bold">Total Roles:</span>
                            <span class="bg-gray-800 px-2 text-white rounded m-3">{{ (role_count) ? role_count : 0 }}</span>
                        </div>
                    </inertia-link>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import Welcome from '@/Jetstream/Welcome'

    export default {
        components: {
            AppLayout,
            Welcome,
        },
        props:{
            users_count: Number,
            role_count: Number
        }
    }
</script>
