<template>
	<div class="bg-white-300 m-5">
		<inertia-link href="/users/create" class="text-sm font-semibold bg-gray-800 text-gray-300 py-3 px-4 rounded-lg hover:bg-gray-700 focus:outline-none focus-visible:ring-2 focus-visible:ring-gray-700 focus-visible:ring-offset-2 focus-visible:ring-offset-gray-900">Add new user</inertia-link>
	</div>
    <div>
        <table class="min-w-full divide-y divide-gray-200">
          	<thead class="bg-gray-50">
            	<tr>
              		<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
					Name
              		</th>
					<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
						Email
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
            	<tr v-for="user in users" :key="user.id">
              		<td class="px-6 py-4 whitespace-nowrap">
						<div class="flex items-center">
						<div class="flex-shrink-0 h-10 w-10">
							<img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="">
						</div>
						<div class="ml-4">
							<div class="text-sm font-medium text-gray-900">
							{{ user.name }}
							</div>
						</div>
						</div>
              		</td>
					<td class="px-6 py-4 whitespace-nowrap">
						<div class="text-sm text-gray-900">{{ user.email }}</div>
					</td>
					<td class="px-6 py-4 whitespace-nowrap">
						<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
						Active - {{ user.created_at }}
						</span>
					</td>
					<td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
						<inertia-link :href="`/users/${user.id}/edit`" class="text-indigo-600 hover:text-indigo-900">Edit</inertia-link>
						<a href="#" @click="deleteRow(user)" class="text-red-600 hover:text-red-900 ml-2">Delete</a>
					</td>
            	</tr>
            <!-- More people... -->
          	</tbody>
        </table>
    </div>
</template>

<script>
    import JetApplicationLogo from '@/Jetstream/ApplicationLogo'

    export default {
        components: {
            JetApplicationLogo,
        },
        props:{
            users: Array
        },
		methods:{
			deleteRow(data) {
                if (!confirm('Are you sure want to remove?')) return;
                // data._method = 'DELETE';
                this.$inertia.delete('/users/'+data.id);
                this.reset();
                this.closeModal();
            },
		}
    }
</script>
