<script setup>
import { Link } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import Card from "@/Components/Card.vue";
import ListItem from "@/Components/ListItem.vue";
import ListLinkItem from "@/Components/ListLinkItem.vue";
import ImageLinkItem from "@/Components/ImageLinkItem.vue";

defineProps({
    user: Object
});
</script>

<template>
    <AppLayout class="flex-col">
        <div class="flex mx-4 items-center gap-4 my-4 justify-between">
            <div class="flex items-center gap-2">
                <Link :href="route('app.index')" class="bg-discord-fuchsia px-4 py-2 rounded text-white hover:bg-discord-red">
                    Back
                </Link>
                <div>
                    <h1 class="text-2xl font-bold text-gray-100">{{ user.global_name ?? user.username }}</h1>
                </div>
            </div>
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
                        <ImageLinkItem title="Avatar" :image="user.avatar_url" form="avatar" />
                        <ListItem title="Discriminator" :text="user.discriminator" />
                        <ListItem title="Public Flags" :text="user.public_flags" />
                        <ListItem title="Flags" :text="user.flags" />
                        <ImageLinkItem title="Banner" :image="user.banner_url" form="banner" />
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