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
                            <jet-input id="password" type="password" class="mt-1 block w-full" v-model="form.password" />
                        </div>

                        <jet-button class="ml-4 mt-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Create User
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
            User: Object,
        },
        data() {
            return {
                form: this.$inertia.form({
                    name: this.User.name,
                    password: '',
                    email: this.User.email,
                })
            }
        },

        methods: {
            submit() {
                this.form
                    .transform(data => ({
                        ... data,
                    }))
                    .patch(this.route('users.update', this.User.id), {
                        onFinish: () => this.form.reset('password'),
                    })
            }
        }
    }
</script>
