<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import {Link, useForm, usePage} from '@inertiajs/inertia-vue3';
import {ref} from 'vue';

const props = defineProps({
    mustVerifyEmail: Boolean,
    status: String,
});

const user = usePage().props.value.auth.user;

const form = useForm({
    name: user.name,
    email: user.email,
    phone: user.phone,
    document: user.document,
});
</script>

<template>
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">Info. de perfil</h2>
            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Atualize as info. do seu perfil pessoal e seu e-mail.</p>
        </header>

        <form @submit.prevent="form.patch(route('profile.update'))" class="mt-6 space-y-6">
            <div>
                <InputLabel for="name" value="Nome"/>

                <TextInput
                    id="name"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.name"
                    autofocus
                    autocomplete="name"
                />

                <InputError class="mt-2" :message="form.errors.name"/>
            </div>

            <div>
                <InputLabel for="email" value="Telefone"/>

                <TextInput
                    id="phone"
                    type="tel"
                    class="mt-1 block w-full"
                    v-model="form.phone"
                />

                <InputError class="mt-2" :message="form.errors.phone"/>
            </div>

            <div>
                <InputLabel for="name" value="E-mail"/>

                <TextInput
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    v-model="form.email"
                />

                <InputError class="mt-2" :message="form.errors.email"/>
            </div>

            <div>
                <InputLabel for="name" value="CPF (opcional)"/>

                <TextInput
                    id="document"
                    type="tel"
                    class="mt-1 block w-full"
                    v-model="form.document"
                    v-mask="'###.###.###-##'"
                />

                <InputError class="mt-2" :message="form.errors.document"/>
            </div>

            <div v-if="props.mustVerifyEmail && user.email_verified_at === null">
                <p class="text-sm mt-2 text-gray-800">
                    Seu e-mail não está verificado.
                    <Link
                        :href="route('verification.send')"
                        method="post"
                        as="button"
                        class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        Clique aqui para enviar um e-mail de verificação.
                    </Link>
                </p>

                <div
                    v-show="props.status === 'verification-link-sent'"
                    class="mt-2 font-medium text-sm text-green-600"
                >
                    Um novo link de verificação foi enviado para sua caixa.
                </div>
            </div>

            <div class="flex items-center gap-4">
                <PrimaryButton :disabled="form.processing">Salvar</PrimaryButton>

                <Transition enter-from-class="opacity-0" leave-to-class="opacity-0" class="transition ease-in-out">
                    <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Salvo com sucesso.</p>
                </Transition>
            </div>
        </form>
    </section>
</template>
