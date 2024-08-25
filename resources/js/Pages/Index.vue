<script setup>
import {Head, Link, router, useForm} from "@inertiajs/vue3";
import moment from "moment";
import AppLayout from "@/Layouts/AppLayout.vue";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";
import TextInput from "@/Components/TextInput.vue";
import Card from "@/Components/Card.vue";

defineProps({
    lookups: Object,
    error: Boolean,
});

const form = useForm({
    userid: ''
});

function submit() {
    form.post(route('app.profile'));
}

function openProfile(key) {
    console.log(key);
    router.post(route('app.profile', { userid: key }));
}
</script>

<template>
    <Head>
        <title>Startseite</title>
    </Head>
    <AppLayout>
        <Card class="w-full flex-col">
            <InputLabel for="userId" class="text-gray-100 text-xl">User ID</InputLabel>
            <TextInput v-model="form.userid" required></TextInput>
            <InputError :message="form.errors.userid" />
            <span v-if="error" class="text-red-500">There was a error with your request.</span>
        </Card>
        <div class="flex w-full justify-center">
            <button type="button" @click="submit" class="bg-discord-green hover:bg-discord-yellow px-4 py-2 rounded justify-center items-center mx-4 text-gray-800">Show Profile</button>
        </div>
        <Card class="flex-col gap-2">
            <div @click="openProfile(item.userid)" v-if="lookups.data.length > 0" class="flex flex-row gap-2 items-center w-full hover:bg-discord-fuchsia p-4 cursor-pointer" v-for="item in lookups.data" :key="item.id">
                <img :src="item.avatar_url" class="size-12 rounded-full" alt="" />
                <div class="flex flex-col">
                    <p>{{ item.username }}</p>
                    <p>Last lookup: {{ moment(item.updated_at).format('DD.MM.YYYY HH:mm:ss')}}</p>
                </div>
            </div>
        </Card>
    </AppLayout>
</template>

<style scoped>

</style>