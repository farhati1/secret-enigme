<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div
        class="flex min-h-screen flex-col items-center bg-gray-100 dark:bg-black dark:text-white/50 pt-6 sm:justify-center sm:pt-0"
    >
        <div>
            <Link href="/">
                <ApplicationLogo class="h-40 w-40 fill-current " />
            </Link>
        </div>

        <div
            class="mt-6 w-full overflow-hidden bg-white px-6 py-4 sm:max-w-md sm:rounded-lg shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] dark:bg-zinc-900 dark:ring-zinc-800"
        >
            <slot />
        </div>
        <footer class="absolute bottom-0 w-full text-center font-bold lg:text-lg text-sm text-gray-400 py-4 dark:text-white">
            &copy; {{ new Date().getFullYear() }}  by the WITCH 🧙🏽‍♀️| Tous droits réservés.
        </footer>
    </div>
</template>
