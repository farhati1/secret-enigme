<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { ref } from 'vue';
import PrimaryButton from "@/Components/PrimaryButton.vue";
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

const show = ref(false);
const showButton = ref(false);
const userResponse = ref(''); // Réponse de l'utilisateur
const isCorrect = ref(null); // Pour vérifier si la réponse est correcte
const isInputDisabled = ref(false);
const isButtonVisible = ref(true);


function handleImageError() {
    document.getElementById('screenshot-container')?.classList.add('!hidden');
    document.getElementById('docs-card')?.classList.add('!row-span-1');
    document.getElementById('docs-card-content')?.classList.add('!flex-row');
    document.getElementById('background')?.classList.add('!hidden');
}

function checkAnswer() {
    if (userResponse.value === '440') {
        isCorrect.value = true; // Réponse correcte
        isInputDisabled.value = true;
        isButtonVisible.value = false;
    } else {
        isCorrect.value = false; // Réponse incorrecte
    }
}
</script>

<template>
    <Head title="Enigme finale" />
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
                            <div v-if="!show" class="pt-3 sm:pt-5">
                                <ApplicationLogo class="h-40 w-40 fill-current mx-auto " />
                                <h2
                                    class="text-xl font-semibold text-black dark:text-white text-center"
                                >
                                    Dernier indice <span class="text-amber-500">{{user.name}}</span>, vas tu trouver la réponse à cette devinette ?

                                </h2>

                                <p  class="mt-4 text-sm/relaxed">
                                    Le code est dissimulé tout autour de vous, caché dans les recoins familiers du <span class="text-amber-700 text-sm font-bold">Centre Malezi</span>. Explorez chaque indice laissé et suivez chaque piste. Rassemblez les quatres nombres pour former un code à 3 chiffres. Vous trouverez le secret au bout de cette quête... si vous parvenez à percer le mystère ...
                                </p>

                                <div  class="my-12 flex items-center justify-center mx-auto">
                                    <button
                                        v-on:click="show = !show"
                                        class="mt-4  flex justify-center mx-auto w-1/4 bg-amber-700 text-white p-2 rounded"
                                    >
                                       Suivant
                                    </button>

                                </div>
                            </div>
                            <div v-if="show" class="pt-3 sm:pt-5">
                                <ApplicationLogo class="h-40 w-40 fill-current mx-auto " />
                                <h2
                                    class="text-xl font-semibold text-black dark:text-white text-center"
                                >
                                    À  vous de jouer ! 🕵🏾‍♂️
                                </h2>

                                <p  class="mt-4 text-sm/relaxed">
                                    Je suis souvent là quand vous êtes assis pour apprendre, parfois ignorée mais toujours présente. Pourtant, dans le cadre de votre quête, je suis le point de départ. « Cherchez la connaissance, même jusqu'en Chine. » (Sunan Ibn Majah, Hadith 224). Je suis discrète, mais sans moi, vous ne trouverez pas votre prochain indice. Où suis-je ?"
                                    <span class=" flex text-center text-amber-900 font-medium"> Saisissez le code dès que vous aurez trouvé tous les indices</span></p>
                                <div class="flex text-center flex-col">
                                    <input
                                        v-model="userResponse"
                                        placeholder="Entrez le code"
                                        class=" mt-4 p-2 border rounded dark:text-amber-700"
                                        :disabled="isInputDisabled"
                                    />
                                    <button
                                        @click="checkAnswer"
                                        class="mt-4  flex justify-center mx-auto w-1/4 bg-amber-700 text-white p-2 rounded"
                                        v-show="isButtonVisible"
                                    >
                                        Vérifier
                                    </button>
                                    <div class="mt-4 ">
                                        <p v-if="isCorrect === true" class="text-green-500">Excellent ! Tu peux être fier(e) de toi !  </p>
                                        <p v-if="isCorrect === false" class="text-red-500">Dommage, ce n'est pas ça. Essaye encore !</p>
                                    </div>
                                </div>


                                <div v-show="isCorrect" class="my-12 flex flex-col items-center justify-center mx-auto">
                                    <button v-on:click="showButton = !showButton">
                                        <p v-if="!showButton ">Appuie pour découvrir le secret 🤫</p>
                                    </button>
                                    <transition name="bounce">
                                        <p v-if="showButton " class="lg:text-3xl font-bold text-sm text-amber-500 uppercase">🎊Je vais me marier!!!!! 🎊</p>
                                    </transition>

                                        <p v-if="showButton " class=" flex flex-col  lg:text-xl font-bold text-sm mt-3 ">Attends que les autres aient fini pour réagir please 🤗</p>


                                </div>
                            </div>
                        </div>
                    </div>
                </main>

            </div>
        </div>
        <footer class="absolute bottom-0 w-full text-center font-bold lg:text-lg text-sm text-gray-400 py-4 dark:text-white">
            &copy; {{ new Date().getFullYear() }}  by the WITCH 🧙🏽‍♀️| Tous droits réservés.
        </footer>
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
