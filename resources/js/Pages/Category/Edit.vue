<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Update Category
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

                <jet-validation-errors class="mt-4 mb-4 bg-red-100 p-4 border border-red-500 rounded-lg" />

                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
                    <form @submit.prevent="submit">
                        <div>
                            <jet-label for="title" value="Title" />
                            <jet-input id="title" type="text" class="mt-1 block w-full" v-model="form.title" required autofocus />
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
            Category: Object,
        },
        data() {
            return {
                form: this.$inertia.form({
                    title: this.Category.title,
                })
            }
        },

        methods: {
            submit() {
                this.form
                    .transform(data => ({
                        ... data,
                    }))
                    .patch(this.route('categories.update', this.Category.id), {
                    })
            }
        }
    }
</script>
