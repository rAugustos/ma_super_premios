<template>
    <div class="flex flex-col container max-w-screen-lg mx-auto p-5 py-10 sm:px-0 dark:bg-slate-900">
        <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
            <p class="block dark:text-gray-200">Quer ser informado sobre novos sorteios?</p>
            <p class="block text-emerald-400">Assine a nossa newsletter.</p>
        </h2>
        <div class="mt-3 flex flex-col">
            <div>
                <InputLabel for="email" value="Digite seu e-mail"/>
                <TextInput id="email"
                           type="email"
                           class="mt-1 block w-full md:w-96"
                           placeholder="examplo@exemplo.com"
                           v-model="form.email"/>
                <InputError :message="form.errors.email"/>
            </div>
            <PrimaryButton>Assinar</PrimaryButton>
        </div>
    </div>
</template>

<script setup>
import PrimaryButton from "@/Components/PrimaryButton.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import {useForm} from "@inertiajs/inertia-vue3";

const form = useForm({
    email: ""
})
</script>
