<script setup>
defineProps({
    title: String,
    text: String,
});
</script>

<template>
    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
        <dt class="text-sm font-medium leading-6 text-gray-100">{{ title }}</dt>
        <dd class="mt-1 text-sm leading-6 text-gray-100 sm:col-span-2 sm:mt-0">{{ text }}</dd>
    </div>
</template>

<style scoped>

</style>