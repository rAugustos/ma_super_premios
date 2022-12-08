<template>
    <div class="flex flex-col container max-w-screen-lg mx-auto my-4 p-5 sm:py-5 sm:px-0">
        <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
            <p class="block dark:text-gray-200">
                Quer ser informado sobre novos sorteios?
            </p>
            <p class="block text-emerald-400">
                Assine a nossa newsletter.
            </p>
        </h2>
        <div class="mt-3 flex flex-col">
            <label for="email">Digite seu e-mail</label>
            <input type="email" name="email" id="email" class="input sm:w-96 w-full">
            <PrimaryButton>Confirmar</PrimaryButton>
        </div>
    </div>
</template>

<script setup>import PrimaryButton from "@/Components/PrimaryButton.vue";</script>
