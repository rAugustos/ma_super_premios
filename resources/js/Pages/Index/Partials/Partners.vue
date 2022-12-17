<template>
    <div class="pb-14 pt-10 px-6 sm:px-4 dark:bg-slate-900">
        <div class="container mx-auto max-w-screen-lg">
            <div class="flex flex-col">
            <p class="text-3xl font-bold dark:text-gray-300">Nossos Parceiros</p>
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-3 gap-8 sm:gap-6 mt-6 md:dark:bg-transparent md:p-0 md:mt-10 dark:bg-slate-800 p-6 rounded-2xl">
                <img
                    v-for="i in 6"
                    :key="i"
                    src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/ce/Coca-Cola_logo.svg/2560px-Coca-Cola_logo.svg.png"
                    class="dark:grayscale-0 grayscale dark:opacity-90 hover:grayscale-0 transition-75 cursor-pointer"/>
            </div>
        </div>
    </div>
</template>

<script setup></script>
