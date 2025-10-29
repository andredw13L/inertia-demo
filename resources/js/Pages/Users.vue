<template>

    <Head>
        <title>Users</title>
    </Head>

    <h1 class="text-3xl font-bold mb-6">Users</h1>

    <div class="p-4">
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

import Pagination from '../Shared/Pagination.vue';

defineProps({
    users: Object
})



</script>
