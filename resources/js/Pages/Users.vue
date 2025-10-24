<template>
    <Layout>
        <h1 class="text-3xl font-bold">Users</h1>
        <div style="margin-top: 800px;">
            <p>The current time is {{ time }}.</p>
            <Link 
                href="/users" 
                class="text-blue-500" 
                preserve-scroll>
                Refresh
            </Link>
        </div>
    </Layout>
</template>

<script>

import { Link } from '@inertiajs/vue3';
import Layout from '../Shared/Layout.vue';

    export default {
        components: { Link, Layout },
        props: {time: String}
    };
</script>
