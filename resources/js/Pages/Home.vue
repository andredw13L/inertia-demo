<template>
        <Head>
                <title>Home</title>
                <meta type="description" content="Home info" head-key="description">
        </Head>
        <h1 class="text-3xl font-bold">Home</h1>
        <blockquote class="text-lg italic mt-4 text-center">{{ message }}</blockquote>
</template>

<script setup>
import { usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

const page = usePage()

const message = computed(() => {
    const msg = page.props.inspire.message ?? ''
    return msg.replace(/<[^>]+>/g, '')
})

</script>
