<script setup>
import { Head, Link, usePage, router } from "@inertiajs/vue3";
import { XMarkIcon, MinusIcon } from "@heroicons/vue/24/outline/index.js";

function minimize() {
    router.post(route('app.minimizeWindow'));
}

function close() {
    router.post(route('app.closeWindow'));
}
</script>

<template>
    <div class="flex flex-row w-full h-8 justify-between gap-2 bg-discord-blurple px-2 select-none">
        <div class="flex-shrink-0 items-center inline-flex gap-1">
            <img src="../../img/discord-mark-white.svg" height="16" width="16" alt="Discord Logo" class="size-6" />
            <span class="text-white">User Profile</span>
        </div>
        <div class="w-full" style="-webkit-app-region: drag;"></div>
        <div class="inline-flex items-center gap-2">
            <MinusIcon class="size-6 text-white cursor-pointer" @click="minimize" />
            <XMarkIcon class="size-6 text-white cursor-pointer" @click="close" />
        </div>
    </div>
    <div class="flex w-full flex-col gap-2">
        <slot />
    </div>
</template>