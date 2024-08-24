<script setup>
import { Head, useForm } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { ExclamationTriangleIcon } from '@heroicons/vue/24/outline';

const form = useForm({
    token: ''
});

function submit() {
    form.post(route('app.settings.store'));
}
</script>

<template>
    <AppLayout>
        <Head>
            <title>API Token festlegen</title>
        </Head>
        <div class="flex justify-between absolute">
            <div v-if="$page.props.error" class="bg-red-500 rounded p-4 inline-flex items-center w-full max-w-md text-gray-200 font-black text-xl">
                <ExclamationTriangleIcon class="size-8" />
                {{ $page.props.error }}
            </div>
        </div>
        <div class="flex flex-col items-center h-full justify-center text-gray-100 w-full gap-2">
            <InputLabel for="token">API Token</InputLabel>
            <TextInput id="token" class="w-full" v-model="form.token" />
            <InputError :message="form.errors.token" />
            <PrimaryButton @click="submit">Speichern</PrimaryButton>
        </div>
    </AppLayout>
</template>

<style></style>