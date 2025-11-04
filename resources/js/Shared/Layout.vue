<template>
    <Head>
        <title>My App</title>
        <meta type="description" content="Default info" head-key="description">
    </Head>
    <AppSection class="bg-gray-200">
        <header class="flex justify-between">
            <div class="flex items-center">
                <h1 class="font-bold text-lg">My App</h1>
                <p class="text-sm ml-4">
                    Welcome Back, {{ name }}!
                </p>
            </div>
            <Nav></Nav>
        </header>
    </AppSection>
    
    <AppSection>
        <div class="max-w-3xl mx-auto">
            <iframe
                class="mb-6" 
                src='https://widget.spreaker.com/player?episode_id=42461607&theme=dark&chapters-image=true' 
                width='100%' 
                title='Fronteiras Invisíveis do Futebol #46 Trégua de Natal' 
                frameborder='0'>
            </iframe>
            <slot></slot>
        </div>
    </AppSection>
</template>

<script setup>
import { computed } from 'vue';
import AppSection from './AppSection.vue';
import Nav from './Nav.vue';
import { usePage } from '@inertiajs/vue3';

const page = usePage();

const name = computed(() => page.props.auth.user.name)

</script>