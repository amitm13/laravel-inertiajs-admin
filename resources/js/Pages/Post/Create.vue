<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Add Post
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

                <jet-validation-errors class="mt-4 mb-4 bg-red-100 p-4 border border-red-500 rounded-lg" />

                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
                    <form @submit.prevent="submit">
                        <div class="mt-4">
                            <jet-label for="category_id" value="Category" />
                            <select name="category_id" id="category_id" v-model="form.category_id" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full">
                                <option v-for="category in Categories" :key="category.id" :value="category.id" >{{category.title}}</option>
                            </select>
                        </div>    
                        <div class="mt-4">
                            <jet-label for="title" value="Title" />
                            <jet-input id="title" type="text" class="mt-1 block w-full" v-model="form.title" required autofocus />
                        </div>
                        <div class="mt-4">
                            <jet-label for="slug" value="Slug" />
                            <jet-input id="slug" type="text" class="mt-1 block w-full" v-model="slug" required autofocus />
                        </div>
                        <div class="mt-4">
                            <jet-label for="image" value="Image" />
                            <input type="file" accept="image/*" @input="form.image = $event.target.files[0]" id="image">
                        </div>

                        <div class="mt-4">
                            <jet-label for="description" value="Body" />
                            <textarea v-model="form.description" name="description" id="description" rows="10" class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"></textarea>
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
            Categories: Array,
        },
        data() {
            return {
                slug:'',
                form: this.$inertia.form({
                    title: '',
                    slug: '',
                    image: '',
                    category_id: '',
                    description: '',
                })
            }
        },
        computed: {
            slug: function() {
            var slug = this.sanitizeTitle(this.form.title);
            return slug;
            }
        },
        methods: {
            sanitizeTitle: function(title) {
                var slug = "";
                // Change to lower case
                var titleLower = title.toLowerCase();
                // Letter "e"
                slug = titleLower.replace(/e|é|è|ẽ|ẻ|ẹ|ê|ế|ề|ễ|ể|ệ/gi, 'e');
                // Letter "a"
                slug = slug.replace(/a|á|à|ã|ả|ạ|ă|ắ|ằ|ẵ|ẳ|ặ|â|ấ|ầ|ẫ|ẩ|ậ/gi, 'a');
                // Letter "o"
                slug = slug.replace(/o|ó|ò|õ|ỏ|ọ|ô|ố|ồ|ỗ|ổ|ộ|ơ|ớ|ờ|ỡ|ở|ợ/gi, 'o');
                // Letter "u"
                slug = slug.replace(/u|ú|ù|ũ|ủ|ụ|ư|ứ|ừ|ữ|ử|ự/gi, 'u');
                // Letter "d"
                slug = slug.replace(/đ/gi, 'd');
                // Trim the last whitespace
                slug = slug.replace(/\s*$/g, '');
                // Change whitespace to "-"
                slug = slug.replace(/\s+/g, '-');
                // alert(this.form.title);
                this.form.slug = slug
                return slug;
            },
            submit() {
                this.form
                    .transform(data => ({
                        ... data,
                    }))
                    .post(this.route('posts.store'), {
                        // onFinish: () => this.form.reset('password'),
                    })
            }
        }
    }
</script>
