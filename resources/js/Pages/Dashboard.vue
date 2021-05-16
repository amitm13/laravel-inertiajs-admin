<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-6 flex">
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
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg float-left ml-4">
                    <inertia-link href="/roles">
                        <div class="p-3 m-3">
                            <span class="font-bold">Total Categories:</span>
                            <span class="bg-gray-800 px-2 text-white rounded m-3">{{ (categories_count) ? categories_count : 0 }}</span>
                        </div>
                    </inertia-link>
                </div>
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg float-left ml-4">
                    <inertia-link href="/roles">
                        <div class="p-3 m-3">
                            <span class="font-bold">Total Posts:</span>
                            <span class="bg-gray-800 px-2 text-white rounded m-3">{{ (posts_count) ? posts_count : 0 }}</span>
                        </div>
                    </inertia-link>
                </div>
            </div>
        </div>

        <div class="py-6 flex">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                        <h2 class="text-center mt-3 font-bold">Recent Posts</h2>
                        <div class="bg-white-300 m-5">
                            <inertia-link href="/posts/create" class="text-sm font-semibold bg-gray-800 text-gray-300 py-3 px-4 rounded-lg hover:bg-gray-700 focus:outline-none focus-visible:ring-2 focus-visible:ring-gray-700 focus-visible:ring-offset-2 focus-visible:ring-offset-gray-900">Add new post</inertia-link>
                        </div>
                        <div>
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Title
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Is Featured
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Category
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Sort Description
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Created at
                                        </th>
                                        <th scope="col" class="relative px-6 py-3">
                                            <span class="sr-only">Edit</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr v-for="post in recent_posts" :key="post.id">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                            <div class="flex-shrink-0 w-20">
                                                <img class="w-20" :src="post.image_url" alt="">
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">
                                                {{ post.title }}
                                                </div>
                                            </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div v-if="post.is_featured" class="text-sm text-green-900 bg-green-200 border-green-400 rounded text-center border">Yes</div>
                                            <div v-else class="text-sm text-red-900 bg-red-200 border border-red-400 rounded text-center">No</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{ (post.category) ? post.category.title : '-' }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{ post.sort_description }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Created - {{ post.created_at_as_human_format }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">

                                            <inertia-link :href="`/posts/${post.id}/edit`" class="float-left text-green-400 hover:text-green-600 text-white py-2 px-4  rounded"> 
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg></inertia-link>

                                            <a href="#" @click="deleteRow(post)" class="ml-2 float-left text-red-400 hover:text-red-600 text-white py-2 px-4  rounded">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </a>
                                        </td>
                                        
                                    </tr>
                                <!-- More people... -->
                                </tbody>
                            </table>
                        </div>
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
            role_count: Number,
            categories_count: Number,
            posts_count: Number,
            recent_posts: Array,
        }
    }
</script>
