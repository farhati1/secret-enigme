<script setup>
import { Head, Link } from '@inertiajs/vue3';
import ApplicationLogo from "@/Components/ApplicationLogo.vue";

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
});

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
                                <ApplicationLogo class="h-40 w-40 fill-current mx-auto " />
                                <h2
                                    class="text-xl font-semibold text-black dark:text-white text-center"
                                >
                                    Bravo d’être arrivés jusqu’ici !

                                </h2>

                                <p class="mt-4 text-sm/relaxed">
                                    Votre persévérance et vos connaissances ont été mises à l’épreuve.
                                    Mais il vous reste une dernière énigme à découvrir pour cela cliquez sur le bouton ci-dessous.

                                </p>

                                <div class="my-12 flex items-center justify-center mx-auto">
                                    <Link href="/login" class="px-4 py-4 rounded-lg bg-amber-500 text-white font-medium hover:bg-amber-700" >
                                        Découvrir l'énigme
                                    </Link>

                                </div>
                            </div>
                        </div>
                    </div>
                </main>

            </div>
            <footer class="lg:absolute relative bottom-0 w-full text-center font-bold lg:text-lg text-sm text-gray-400 py-4 dark:text-white">
                &copy; {{ new Date().getFullYear() }}  by the WITCH 🧙🏽‍♀️| Tous droits réservés.
            </footer>
        </div>
    </div>
</template>
