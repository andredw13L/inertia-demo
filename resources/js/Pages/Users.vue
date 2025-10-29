<template>

    <Head>
        <title>Users</title>
    </Head>

    <div class="flex justify-between mb-6">
        <h1 class="text-3xl font-bold">Users</h1>
        <input
            v-model="search"
            type="text" 
            name="search" 
            placeholder="Search..." 
            class="border px-2 w-min rounded-lg border-gray-300" 
        >
    </div>

    <div class="mb-6">
        <table
            class="min-w-full border border-gray-200 rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-shadow bg-white">
            <tbody v-if="users.data && users.data.length">
                <tr v-for="user in users.data" :key="user.id"
                    class="hover:bg-gray-50 border-b border-gray-100 last:border-0 transition-colors">
                    <td class="flex items-center justify-between px-6 py-4">
                        <span class="text-gray-900 font-sans text-base">
                            {{ user.name }}
                        </span>
                        <Link :href="`/users/${user.id}/edit`"
                            class="text-indigo-700 hover:text-indigo-900 text-sm font-medium transition">
                        Edit
                        </Link>
                    </td>
                </tr>
            </tbody>

            <tbody v-else>
                <tr>
                    <td class="px-6 py-8 text-center text-gray-500 text-sm italic bg-gray-50">
                        No users found.
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!--Paginator-->
    <Pagination :links="users.links" class="mt-6"></Pagination>

</template>

<script setup>

import { defineComponent, ref, watch } from 'vue';
import Pagination from '../Shared/Pagination.vue';
import { router } from '@inertiajs/vue3';

const props = defineProps({
    users: Object,
    filters: Object
})

const search = ref(props.filters.search)


watch(search, value => {
    router.get('/users', { search: value }, {preserveState: true, replace: true})
})

</script>
