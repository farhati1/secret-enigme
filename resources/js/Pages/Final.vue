<script setup>
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';
import ApplicationLogo from "@/Components/ApplicationLogo.vue";

// Données pour les étapes
const steps = [
    {
        title: "À vous de jouer ! 🕵🏾‍♂️",
        description: `Le code est la fusion des résultats des devinettes envoyés sur Whatsapp. Trouvez-le pour débloquer le message final.`,
        buttonText: "Suivant",
    },
    {
        title: 'Indice <span class="text-amber-500">n°1</span>',
        description: `Je suis souvent là quand vous êtes assis pour apprendre, parfois ignorée mais toujours présente. Pourtant, dans le cadre de votre quête, je suis le point de départ. « Cherchez la connaissance, même jusqu'en Chine. » (Sunan Ibn Majah, Hadith 224). Où suis-je ?`,
        hint: `Saisissez le code dès que vous aurez trouvé tous les indices`,
        buttonText: "Vérifier",
    },
    {
        title: "Félicitations !",
        description: `le logo AF... Ces deux lettres ont une signification bien plus profonde que vous ne le pensez. Chaque détail compte ...`,
        message: `🎊 Je vais me marier même si tu le savais déjà!!!!! 🎊`,
        finalHint: `Merci de l'avoir quand même fait. Please  pas un mot aux foundis, leur tours viendra après bi idniLlah par mon père et non moi 🤗`,
        buttonText: null,
    },
];

const currentStep = ref(0);
const userResponse = ref(''); // Réponse de l'utilisateur
const isCorrect = ref(null); // Pour vérifier si la réponse est correcte
const isInputDisabled = ref(false);
const isButtonVisible = ref(true);
const showFinalMessage = ref(false); // Pour révéler le message final

// Fonction de vérification de la réponse
function checkAnswer() {
    if (userResponse.value === '440') { // Code correct est '440'
        isCorrect.value = true;
        isInputDisabled.value = true;
        isButtonVisible.value = false;
        currentStep.value++; // Passe automatiquement à l'étape 3 en cas de bonne réponse
    } else {
        isCorrect.value = false;
    }
}

// Fonction pour passer à l'étape suivante
function nextStep() {
    if (currentStep.value < steps.length - 1) {
        currentStep.value++;
    }
}
</script>

<template>
    <Head title="Enigme finale" />
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
        <div class="relative flex min-h-screen flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <main class="mt-6">
                    <div class="grid gap-6 lg:grid-cols-2 lg:gap-8">
                        <div class="flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800">

                            <!-- Étape 1 : Affichage de l'indice -->
                            <div v-if="currentStep === 0" class="pt-3 sm:pt-5">
                                <ApplicationLogo class="h-40 w-40 fill-current mx-auto" />
                                <h2 v-html="steps[currentStep].title" class="lg:text-3xl text-xl font-semibold text-black dark:text-white text-center">
                                </h2>
                                <p class="mt-4 text-sm/relaxed" v-html="steps[currentStep].description"></p>
                                <div class="my-4 flex items-center justify-center mx-auto">
                                    <button @click="nextStep" class="mt-4 flex justify-center mx-auto w-1/4 bg-amber-700 text-white p-2 rounded">
                                        {{ steps[currentStep].buttonText }}
                                    </button>
                                </div>
                            </div>

                            <!-- Étape 2 : Saisir le code -->
                            <div v-else-if="currentStep === 1" class="pt-3 sm:pt-5">
                                <ApplicationLogo class="h-40 w-40 fill-current mx-auto" />
                                <h2 class="text-xl font-semibold text-black dark:text-white text-center">
                                    {{ steps[currentStep].title }}
                                </h2>
                                <p class="mt-4 text-sm/relaxed" v-html="steps[currentStep].description"></p>
                                <span class="flex text-center text-amber-800 font-medium">{{ steps[currentStep].hint }}</span>
                                <div class="flex text-center flex-col">
                                    <input v-model="userResponse" placeholder="Entrez le code" class="mt-4 p-2 border rounded dark:text-amber-700" :disabled="isInputDisabled" />
                                    <button @click="checkAnswer" class="mt-4 flex justify-center mx-auto w-1/4 hover:bg-amber-700 bg-amber-500 text-white p-2 rounded" v-show="isButtonVisible">
                                        {{ steps[currentStep].buttonText }}
                                    </button>
                                    <div class="mt-4">
                                        <p v-if="isCorrect === true" class="text-green-500">Excellent ! Tu peux être fier(e) de toi !</p>
                                        <p v-if="isCorrect === false" class="text-red-500">Dommage, ce n'est pas ça. Je sens que tu y es presque réfléchis bien sur la troisièeme devinette n°3!</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Étape 3 : Message final mystérieux -->
                            <div v-else-if="currentStep === 2" class="pt-3 sm:pt-5">
                                <ApplicationLogo class="h-40 w-40 fill-current mx-auto" />
                                <h2 class="lg:text-3xl text-xl font-semibold text-black dark:text-white text-center">
                                    {{ steps[currentStep].title }}
                                </h2>
                                <p class="mt-4 text-sm/relaxed" v-html="steps[currentStep].description"></p>
                                <p class="mb-4 text-sm/relaxed">Ce quiz sur le fiqh du mariage n'était qu'un prélude, une initiation secrète à un chapitre bien plus grand.</p>
                                <transition name="bounce">
                                    <p v-if="!showFinalMessage" class="mt-4 text-center text-amber-500 font-bold cursor-pointer" @click="showFinalMessage = true">
                                        Appuie pour découvrir le secret 🤫
                                    </p>
                                </transition>
                                <transition name="bounce">
                                    <p v-if="showFinalMessage" class="lg:text-3xl mt-8  font-bold text-center text-sm text-amber-500 uppercase">
                                        {{ steps[currentStep].message }}
                                    </p>
                                </transition>
                                <p v-if="showFinalMessage" class="flex flex-col  text-center lg:text-xl font-bold text-sm mt-3">
                                    {{ steps[currentStep].finalHint }}
                                </p>
                            </div>

                        </div>
                    </div>
                </main>
            </div>
        </div>
        <footer class="lg:absolute relative bottom-0 w-full text-center font-bold lg:text-lg text-sm text-gray-400 py-4 dark:text-white">
            &copy; {{ new Date().getFullYear() }} by the WITCH 🧙🏽‍♀️| Tous droits réservés.
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
