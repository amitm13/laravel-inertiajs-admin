<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="bg-white-300 m-5">
						<inertia-link :href="route('categories.create')" class="text-sm font-semibold bg-gray-800 text-gray-300 py-3 px-4 rounded-lg hover:bg-gray-700 focus:outline-none focus-visible:ring-2 focus-visible:ring-gray-700 focus-visible:ring-offset-2 focus-visible:ring-offset-gray-900">Add new category</inertia-link>
					</div>
					<div>
						<table class="min-w-full divide-y divide-gray-200">
							<thead class="bg-gray-50">
								<tr>
									<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
									Title
									</th>
									<th scope="col" class="relative px-6 py-3">
										<span class="sr-only">Edit</span>
									</th>
								</tr>
							</thead>
							<tbody class="bg-white divide-y divide-gray-200">
								<tr v-for="category in Categories" :key="category.id">
									<td class="px-6 py-4 whitespace-nowrap">
										<div class="flex items-center">
										<div class="ml-4">
											<div class="text-sm font-medium text-gray-900">
											{{ category.title }}
											</div>
										</div>
										</div>
									</td>
									<td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">

										<inertia-link :href="`/categories/${category.id}/edit`" class="float-left text-green-400 hover:text-green-600 text-white py-2 px-4  rounded"> 
											<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
												<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
											</svg></inertia-link>

										<a href="#" @click="deleteRow(category)" class="ml-2 float-left text-red-400 hover:text-red-600 text-white py-2 px-4  rounded">
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
    import JetApplicationLogo from '@/Jetstream/ApplicationLogo'

    export default {
        components: {
			AppLayout,
            JetApplicationLogo,
        },
        props:{
            Categories: Array
        },
		methods:{
			deleteRow(data) {
                if (!confirm('Are you sure want to remove?')) return;
                // data._method = 'DELETE';
                this.$inertia.delete('/categories/'+data.id);
                this.reset();
                this.closeModal();
            },
		}
    }
</script>
