<template>

    <Head>
        <title>Login</title>
    </Head>

    <main class="grid place-items-center" style="min-height: 90vh;">
        <section class="bg-white p-8 rounded-xl max-w-md mx-auto mt-8 border border-gray-400">

            <h1 class="text-3xl mb-6">Login</h1>

            <form @submit.prevent="submit">

                <!--TODO: Make it a component-->
                <div class="mb-6">
                    <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Email
                        <input v-model="form.email" class="mt-2 border border-gray-300 rounded p-2 w-full" type="email"
                            name="email" id="email" autocomplete="email" required>
                        <div v-if="form.errors.email" v-text="form.errors.email" style="font-size: 0.750rem;"
                            class="text-red-500 mt-1"></div>
                    </label>

                </div>

                <div class="mb-6">
                    <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Password
                        <input v-model="form.password" class="mt-2 border border-gray-300 rounded p-2 w-full" type="password"
                            name="password" id="password" required>
                        <div v-if="form.errors.password" v-text="form.errors.password" style="font-size: 0.750rem;"
                            class="text-red-500 mt-1"></div>
                    </label>
                </div>


                <div class="mb-6">
                    <button type="submit"
                        class=" cursor-pointer bg-blue-500 text-white font-bold rounded py-2 px-4 hover:bg-blue-700"
                        :class="{ 'bg-green-800': form.processing }" :disabled="form.processing">
                        Login
                    </button>

                </div>
            </form>
        </section>
    </main>
</template>



<script setup>
import { useForm } from '@inertiajs/vue3';

defineOptions({
    layout: null
})


let form = useForm({
    email: '',
    password: ''
})


let submit = () => {
    form.post('/login')
}

</script>