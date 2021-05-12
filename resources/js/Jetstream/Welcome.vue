<template>
	<div class="bg-white-300 m-5">
		<!-- <inertia-link href="/users/create" class="text-sm font-semibold bg-gray-800 text-gray-300 py-3 px-4 rounded-lg hover:bg-gray-700 focus:outline-none focus-visible:ring-2 focus-visible:ring-gray-700 focus-visible:ring-offset-2 focus-visible:ring-offset-gray-900">Add new user</inertia-link> -->
	</div>
    <div>
        <div class="p-3 m-3">
			Total User: {{ (users_count) ? users_count : 0 }}
		</div>
    </div>
</template>

<script>
    import JetApplicationLogo from '@/Jetstream/ApplicationLogo'

    export default {
        components: {
            JetApplicationLogo,
        },
        props: {
            users_count: Number,
        }
    }
</script>
