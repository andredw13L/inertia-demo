<template>
    <h1 class="text-3xl font-bold">Users</h1>
    <div style="margin-top: 800px;">
        <p>The current time is {{ time }}.</p>
        <Link href="/users" class="text-blue-500" preserve-scroll>
        Refresh
        </Link>
    </div>
</template>


<script>

import Layout from '../Shared/Layout.vue';
import { Link } from '@inertiajs/vue3';

export default {
    layout: Layout,
    props: { time: String },
    components: { Link }
}

</script>
