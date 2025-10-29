<template>
    <div>
        <component 
            v-for="link in links" 
            :is="link.url ? 'Link' : 'span'" 
            :class="link.url ? '' : 'text-gray-500',
            {'font-bold underline': link.active }"
            class="px-2"
            :href="link.url" 
            v-html="link.label"
            preserve-scroll
            >
        </component>
    </div>
</template>

<script setup>

defineProps({
    links: Array
})

</script>