<script setup>
import { Link } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import Card from "@/Components/Card.vue";
import ListItem from "@/Components/ListItem.vue";
import ListLinkItem from "@/Components/ListLinkItem.vue";

defineProps({
    user: Object
});
</script>

<template>
    <AppLayout class="flex-col">
        <div class="flex mx-4 items-center gap-4 mb-4 justify-between">
            <div class="flex items-center gap-2">
                <Link :href="route('app.index')" class="bg-discord-fuchsia px-4 py-2 rounded text-white hover:bg-discord-red">
                    Back
                </Link>
                <div class="flex-shrink-0">
                    <div class="relative">
                        <img class="h-16 w-16 rounded-full" :src="user.avatar_url" alt="" />
                    </div>
                </div>
                <div>
                    <h1 class="text-2xl font-bold text-gray-100">{{ user.global_name ?? user.username }}</h1>
                </div>
            </div>
            <img :src="user.banner_url" class="rounded"  alt="" />
        </div>

        <Card class="flex-col">
            <div>
                <div class="px-4 sm:px-0">
                    <h3 class="text-base font-semibold leading-7 text-gray-100">Profile Information</h3>
                </div>
                <div class="mt-6 border-t border-gray-400">
                    <dl class="divide-y divide-gray-400">
                        <ListItem title="ID" :text="user.id" />
                        <ListItem title="Name" :text="user.username" />
                        <ListLinkItem title="Avatar" :text="user.avatar" :link="user.avatar_url" />
                        <ListItem title="Discriminator" :text="user.discriminator" />
                        <ListItem title="Public Flags" :text="user.public_flags" />
                        <ListItem title="Flags" :text="user.flags" />
                        <ListLinkItem title="Banner" :text="user.banner" :link="user.banner_url" />
                        <ListItem title="Accent Color" :text="user.accent_color" />
                        <ListItem title="Global Name" :text="user.global_name" />
                        <ListItem title="Banner Color" :text="user.banner_color" />
                        <ListItem title="Clan" :text="user.clan" />
                    </dl>
                </div>
            </div>
        </Card>
    </AppLayout>
</template>