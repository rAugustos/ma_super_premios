<script setup>
import { Link } from '@inertiajs/inertia-vue3';
</script>

<template>
    <Link
        class="block w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out dark:bg-slate-800 dark:text-gray-400 dark:hover:text-gray-300 dark:hover:bg-slate-700"
    >
        <slot />
    </Link>
</template>
