<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { ref } from 'vue';


defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
    user: {
        type: Object,
        required: true,
    },
});

const show = ref(false);

function handleImageError() {
    document.getElementById('screenshot-container')?.classList.add('!hidden');
    document.getElementById('docs-card')?.classList.add('!row-span-1');
    document.getElementById('docs-card-content')?.classList.add('!flex-row');
    document.getElementById('background')?.classList.add('!hidden');
}
</script>

<template>
    <Head title="Welcome" />
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">

        <div
            class="relative flex min-h-screen flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white"
        >
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">

                <main class="mt-6">
                    <div class="grid gap-6 lg:grid-cols-2 lg:gap-8">


                        <div
                            class="flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800"
                        >
                            <div class="pt-3 sm:pt-5">

                                <h2
                                    class="text-xl font-semibold text-black dark:text-white text-center"
                                >
                                    Bienvenue  <span class="text-amber-500">{{user.name}}</span>

                                </h2>

                                <p class="mt-4 text-sm/relaxed">
                                    Mon prénom en arabe signifie "ma joie".
                                    Et si cette joie allait bientôt se concrétiser d’une manière inattendue ?


                                </p>

                                <div class="my-12 flex items-center justify-center mx-auto">
                                    <button v-on:click="show = !show">
                                       <p v-if="!show">Appuie pour découvrir le secret</p>
                                    </button>
                                    <transition name="slide">
                                        <p v-if="show" class="text-3xl text-amber-500">Je vais me marier!!!!!!</p>
                                    </transition>

                                </div>
                            </div>
                        </div>
                    </div>
                </main>

            </div>
        </div>
    </div>
</template>
