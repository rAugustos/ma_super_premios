<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import {Link} from '@inertiajs/inertia-vue3';
</script>

<template>
    <div class="min-h-screen flex flex-col sm:justify-center items-center p-6 bg-gray-100 dark:bg-slate-900">
        <div>
            <Link :href="route('index')">
                <ApplicationLogo class="w-20 h-20 fill-current text-gray-500 dark:text-gray-400"/>
            </Link>
        </div>

        <div
            class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg dark:bg-slate-800"
        >
            <slot/>
        </div>
    </div>
</template>
