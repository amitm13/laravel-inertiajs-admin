<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Add User
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

                <jet-validation-errors class="mt-4 mb-4 bg-red-100 p-4 border border-red-500 rounded-lg" />

                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
                    <form @submit.prevent="submit">
                        <div>
                            <jet-label for="name" value="Name" />
                            <jet-input id="name" type="text" class="mt-1 block w-full" v-model="form.name" required autofocus />
                        </div>
                        <div class="mt-4">
                            <jet-label for="email" value="Email" />
                            <jet-input id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autofocus />
                        </div>
                        <div class="mt-4">
                            <jet-label for="password" value="Password" />
                            <jet-input id="password" type="password" class="mt-1 block w-full" v-model="form.password" required autocomplete="current-password" />
                        </div>

                        <div class="mt-4">
                            <jet-label for="role_id" value="Role" />
                            <select name="role_id" id="role_id" v-model="form.role_id" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full">
                                <option v-for="role in Roles" :key="role.id" :value="role.id" >{{role.title}}</option>
                            </select>
                        </div>
                        <jet-button class="ml-4 mt-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Save
                        </jet-button>
                    </form>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import JetInput from '@/Jetstream/Input'
    import JetButton from '@/Jetstream/Button'
    import JetLabel from '@/Jetstream/Label'
    import JetValidationErrors from '@/Jetstream/ValidationErrors'

    export default {
        components: {
            AppLayout,
            JetInput,
            JetLabel,
            JetButton,
            JetValidationErrors,
        },
        props:{
            Roles: Array,
        },
        data() {
            return {
                form: this.$inertia.form({
                    name: '',
                    password: '',
                    email: '',
                    role_id: ''
                })
            }
        },

        methods: {
            submit() {
                this.form
                    .transform(data => ({
                        ... data,
                    }))
                    .post(this.route('users.store'), {
                        onFinish: () => this.form.reset('password'),
                    })
            }
        }
    }
</script>
