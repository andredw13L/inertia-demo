<template>
    <AppSection class="bg-gray-200">
        <header class="flex justify-between">
            <div class="flex items-center">
                <h1 class="font-bold text-lg">My App</h1>
                <p class="text-sm ml-4">
                    Welcome Back, {{ username }}!
                </p>
            </div>
            <Nav></Nav>
        </header>
    </AppSection>
    
    <AppSection>
        <div class="max-w-3xl mx-auto">
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

const username = computed(() => page.props.auth.user.username)

</script>