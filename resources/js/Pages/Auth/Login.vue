<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';



const form = useForm({
    name: '',
    code: '',
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('code'),

    });
};
</script>

<template>
    <Head title="Connexion"  />
    <GuestLayout>



        <form @submit.prevent="submit" >
            <div>
                <InputLabel for="name" value="Nom" class="dark:text-white"/>

                <TextInput
                    id="name"
                    type="text"
                    class="mt-1 block w-full  dark:text-amber-700"
                    v-model="form.name"
                    required
                    autofocus
                    autocomplete="username"
                />

                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div class="mt-4">
                <InputLabel for="code" value="Code" class="dark:text-white" />

                <TextInput
                    id="code"
                    type="password"
                    class="mt-1 block w-full dark:text-amber-700"
                    v-model="form.code"
                    required
                    autocomplete="current-password"
                />

                <InputError class="mt-2" :message="form.errors.code" />
            </div>


            <div class="mt-4 flex items-center justify-end">

                <PrimaryButton
                    class="ms-4"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                   Valider
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template>
