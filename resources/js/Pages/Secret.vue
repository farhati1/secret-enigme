<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { ref } from 'vue';
import ApplicationLogo from "@/Components/ApplicationLogo.vue";

const props = defineProps({
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

const userResponse = ref('');
const isCorrect = ref(null);
const isInputDisabled = ref(false);
const isButtonVisible = ref(true);

function checkAnswer() {
    // Compare la réponse de l'utilisateur à la réponse correcte
    if (userResponse.value.toUpperCase() === props.user.reponse) {
        isCorrect.value = true; // Réponse correcte
        isInputDisabled.value = true;
        isButtonVisible.value = false;
    } else {
        isCorrect.value = false; // Réponse incorrecte
    }
}
</script>
<template>
    <Head title="Enigme n°1" />
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
        <div class="relative flex min-h-screen flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <main class="mt-6">
                    <div class="grid gap-6 lg:grid-cols-2 lg:gap-8">
                        <div class="flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800">
                            <div class="pt-3 sm:pt-5">
                                <ApplicationLogo class="h-40 w-40 fill-current mx-auto " />
                                <h2 class="text-xl font-semibold text-black dark:text-white text-center">
                                    Bienvenue <span class="text-amber-500">{{ user.name }}</span>
                                </h2>

                                <p class="mt-4 text-sm/relaxed">
                                    {{ user.devinette }}
                                </p>

                                <div class="flex flex-col">
                                    <input
                                        v-model="userResponse"
                                        placeholder="Entrez votre réponse"
                                        class="mt-4 p-2 border dark:text-amber-700 rounded"
                                        :disabled="isInputDisabled"
                                    />

                                    <button
                                        @click="checkAnswer"
                                        class="mt-4 flex justify-center mx-auto w-1/4 bg-amber-700 text-white p-2 rounded"
                                        :disabled="isInputDisabled"
                                        v-show="isButtonVisible"
                                    >
                                    Vérifier
                                    </button>

                                    <div class="mt-4 ">
                                        <p v-if="isCorrect === true" class="text-green-500">Bravo ! C'est correct !</p>
                                        <p v-if="isCorrect === false" class="text-red-500">Dommage, ce n'est pas ça. Essayez encore !</p>
                                    </div>
                                </div>

                                <!-- Liens après avoir trouvé la bonne réponse -->
                                <div v-show="isCorrect" class="my-12 flex items-center justify-center mx-auto">
                                    <Link href="/secret-demi-final" as="button" type="button" class="inline-flex items-center rounded-md border border-transparent bg-amber-500 hover:bg-amber-700 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white transition duration-150 ease-in-out focus:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 active:bg-gray-900">
                                        PASSER À LA  DEMI-FINALE
                                    </Link>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <footer class="lg:absolute relative bottom-0 w-full text-center font-bold lg:text-lg text-sm text-gray-400 py-4 dark:text-white">
            &copy; {{ new Date().getFullYear() }}  by the WITCH 🧙🏽‍♀️| Tous droits réservés.
        </footer>
    </div>
</template>
