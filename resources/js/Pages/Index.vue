<script setup>
import {Head, Link, useForm} from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";
import TextInput from "@/Components/TextInput.vue";
import Card from "@/Components/Card.vue";

const form = useForm({
    userid: ''
});

function submit() {
    form.post(route('app.profile'));
}
</script>

<template>
    <Head>
        <title>Startseite</title>
    </Head>
    <AppLayout class="flex-col">
        <Card class="w-full flex-col">
            <InputLabel for="userId" class="text-gray-100 text-xl">User ID</InputLabel>
            <TextInput v-model="form.userid" required></TextInput>
            <InputError :message="form.errors.userid" />
        </Card>
        <div class="flex w-full justify-center">
            <button type="button" @click="submit" class="bg-green-500 hover:bg-green-800 px-4 py-2 rounded justify-center items-center mx-4 text-white">Show Profile</button>
        </div>
    </AppLayout>
</template>

<style scoped>

</style>