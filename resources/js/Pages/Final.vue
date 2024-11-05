<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { ref } from 'vue';
import PrimaryButton from "@/Components/PrimaryButton.vue";



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

const show = ref(false);
const userResponse = ref(''); // Réponse de l'utilisateur
const isCorrect = ref(null); // Pour vérifier si la réponse est correcte

function handleImageError() {
    document.getElementById('screenshot-container')?.classList.add('!hidden');
    document.getElementById('docs-card')?.classList.add('!row-span-1');
    document.getElementById('docs-card-content')?.classList.add('!flex-row');
    document.getElementById('background')?.classList.add('!hidden');
}

function checkAnswer() {
    if (userResponse.value.toUpperCase() === 'FARHATI') {
        isCorrect.value = true; // Réponse correcte
    } else {
        isCorrect.value = false; // Réponse incorrecte
    }
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
                                    Dernière ligne droite <span class="text-amber-500">{{user.name}}</span>, vas tu trouver la réponse à cette devinette ?

                                </h2>

                                <p  class="mt-4 text-sm/relaxed">
                                    Félicitations ! Vous avez déchiffré chaque prénom et chaque indice. Mon nom porte en lui un immense bonheur. Qui suis-je ?
                                    <span class="text-center text-amber-900 font-italic"> (Veuillez écrire tout en minuscule)</span>
                                </p>
                                <div class="flex flex-col">
                                    <input
                                        v-model="userResponse"
                                        placeholder="Entrez votre réponse"
                                        class=" mt-4 p-2 border rounded"
                                    />
                                    <button
                                        @click="checkAnswer"
                                        class="mt-4  flex justify-center mx-auto w-1/4 bg-amber-700 text-white p-2 rounded"
                                    >
                                        Vérifier
                                    </button>
                                    <div class="mt-4 ">
                                        <p v-if="isCorrect === true" class="text-green-500">Bravo ! T'es smart Allahuma Baarik ! Mais bon c'était quand même assez facile e</p>
                                        <p v-if="isCorrect === false" class="text-red-500">Dommage, ce n'est pas ça. Essaye encore !</p>
                                    </div>
                                </div>


                                <div v-show="isCorrect" class="my-12 flex items-center justify-center mx-auto">
                                    <button v-on:click="show = !show">
                                        <p v-if="!show">Appuie pour découvrir le secret</p>
                                    </button>
                                    <transition name="bounce">
                                        <p v-if="show" class="lg:text-3xl font-bold text-sm text-amber-500 uppercase">Je vais me marier!!!!!!</p>
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

<style scoped>
.bounce-enter-active {
    animation: bounce-in 1s;
}
.bounce-leave-active {
    animation: bounce-in 1s reverse;
}
@keyframes bounce-in {
    0% {
        transform: scale(0);
    }
    50% {
        transform: scale(1.25);
    }
    100% {
        transform: scale(1);
    }
}
</style>
