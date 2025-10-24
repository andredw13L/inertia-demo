<template>
    <AppSection class="bg-gray-200">
        <Header class="flex justify-between">
            <h1 class="font-bold text-lg">My App</h1>
            <Nav></Nav>
        </Header>
    </AppSection>
    
    <AppSection>
        <div class="max-w-3xl mx-auto">
            <slot></slot>
        </div>
    </AppSection>
</template>

<script>
import AppSection from './AppSection.vue';
import Nav from './Nav.vue';

export default {
    components: { Nav, AppSection }
}
</script>