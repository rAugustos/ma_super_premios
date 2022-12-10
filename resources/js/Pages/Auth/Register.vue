<template>
    <GuestLayout>
        <form @submit.prevent="submit" class="flex flex-col gap-4">
            <div>
                <InputLabel for="name" value="Nome"/>

                <TextInput
                    id="name"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.name"
                    autocomplete="name"
                />

                <InputError class="mt-2" :message="form.errors.name"/>
            </div>
            <div>
                <InputLabel for="email" value="E-mail"/>

                <TextInput
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    v-model="form.email"
                    autocomplete="username"
                />

                <InputError class="mt-2" :message="form.errors.email"/>
            </div>
            <div>
                <InputLabel for="phone" value="Telefone"/>

                <TextInput
                    id="phone"
                    type="tel"
                    class="mt-1 block w-full"
                    v-model="form.phone"
                    v-mask="'(##) #####-####'"
                />

                <InputError class="mt-2" :message="form.errors.phone"/>
            </div>
            <div>
                <InputLabel for="document" value="CPF (opcional)"/>

                <TextInput
                    id="document"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.document"
                    v-mask="'###.###.###-##'"
                />

                <InputError class="mt-2" :message="form.errors.document"/>
            </div>
            <div>
                <InputLabel for="password" value="Senha"/>

                <TextInput
                    id="password"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password"
                />

                <InputError class="mt-2" :message="form.errors.password"/>
            </div>
            <div>
                <InputLabel for="password_confirmation" value="Confirme sua senha"/>

                <TextInput
                    id="password_confirmation"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password_confirmation"
                />

                <InputError class="mt-2" :message="form.errors.password_confirmation"/>
            </div>
            <div class="flex items-center justify-end mt-4">
                <Link
                    :href="route('login')"
                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                >
                    Já possui cadastro?
                </Link>

                <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Criar conta
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template>

<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import {Link, useForm} from '@inertiajs/inertia-vue3';

const form = useForm({
    name: '',
    email: '',
    phone: '',
    document: '',
    password: '',
    password_confirmation: '',
    terms: false,
});

const submit = () => {
    form.post(route('register'));
};
</script>
