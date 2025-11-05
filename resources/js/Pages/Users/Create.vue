<template>

    <Head>
        <title>Create User</title>
    </Head>

    <h1 class="text-3xl">Create New User</h1>

    <form @submit.prevent="submit" class="max-w-md mx-auto mt-8">
        <div class="mb-6">
            <label for="name" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                Name
                <input v-model="form.name" class="mt-2 border border-gray-400 p-2 w-full" 
                    type="text" 
                    name="name" 
                    id="name" 
                    autocomplete="name"
                    required> 
                    <!--TODO: Make it a component-->
                    <div v-if="form.errors.name" v-text="form.errors.name"  style="font-size: 0.750rem;" class="text-red-500 mt-1"></div>
            </label>
        </div>

        <div class="mb-6">
            <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                Email
                <input v-model="form.email" class="mt-2 border border-gray-400 p-2 w-full" 
                    type="email" 
                    name="email" 
                    id="email"
                    autocomplete="email" 
                    required> 
                    <div v-if="form.errors.email" v-text="form.errors.email"  style="font-size: 0.750rem;" class="text-red-500 mt-1"></div>
            </label>

        </div>

        <div class="mb-6">
            <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                Password
                <input v-model="form.password" class="mt-2 border border-gray-400 p-2 w-full" 
                    type="password" 
                    name="password" 
                    id="password" 
                    required> 
                     <div v-if="form.errors.password" v-text="form.errors.password"  style="font-size: 0.750rem;" class="text-red-500 mt-1"></div>
            </label>
        </div>


        <div class="mb-6">
            <button 
                type="submit" 
                class=" cursor-pointer bg-blue-500 text-white font-bold rounded py-2 px-4 hover:bg-blue-700"
                :class="{'bg-green-800': form.processing}"
                :disabled="form.processing" >
                Submit
            </button>

        </div>
    </form>

</template>

<script setup>

import { useForm } from '@inertiajs/vue3';

let form = useForm({
    name: '',
    email: '',
    password: ''
})


let submit = () => {
    form.post('/users')
}

</script>
