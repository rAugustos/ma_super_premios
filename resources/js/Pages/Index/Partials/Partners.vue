<template>
    <div class="pb-14 pt-10 px-4">
        <div class="container mx-auto max-w-screen-lg">
            <div class="flex flex-col">
            <span class="text-3xl font-bold text-center mb-5 dark:text-gray-300">Parceiros</span>
            </div>
            <div class="grid sm:grid-cols-3 gap-6 mt-6">
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
