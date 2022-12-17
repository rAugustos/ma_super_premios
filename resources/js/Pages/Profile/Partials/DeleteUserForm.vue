<script setup>
import DangerButton from '@/Components/DangerButton.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import Modal from '@/Components/Modal.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import {useForm} from '@inertiajs/inertia-vue3';
import {nextTick, ref} from 'vue';

const confirmingUserDeletion = ref(false);
const passwordInput = ref(null);

const form = useForm({
    password: '',
});

const confirmUserDeletion = () => {
    confirmingUserDeletion.value = true;

    nextTick(() => passwordInput.value.focus());
};

const deleteUser = () => {
    form.delete(route('profile.destroy'), {
        preserveScroll: true,
        onSuccess: () => closeModal(),
        onError: () => passwordInput.value.focus(),
        onFinish: () => form.reset(),
    });
};

const closeModal = () => {
    confirmingUserDeletion.value = false;

    form.reset();
};
</script>

<template>
    <section class="space-y-6">
        <header>
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">Deleção de conta</h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                Uma vez deletada, sua conta e todas as suas informações serão apagadas permanentemente. Tenha certeza do
                que está fazendo antes de prosseguir.
            </p>
        </header>

        <DangerButton @click="confirmUserDeletion">Apagar minha conta</DangerButton>

        <Modal :show="confirmingUserDeletion" @close="closeModal">
            <div class="p-6">
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    Tem certeza de que deseja apagar a sua conta?
                </h2>

                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    Uma vez deletada, sua conta e todas as suas informações serão apagadas permanentemente. Tenha
                    certeza do
                    que está fazendo antes de prosseguir.
                </p>

                <div class="mt-6">
                    <InputLabel for="password" value="Digite sua senha para prosseguir"/>

                    <TextInput
                        id="password"
                        ref="passwordInput"
                        v-model="form.password"
                        type="password"
                        class="mt-1 block w-full"
                        @keyup.enter="deleteUser"
                    />

                    <InputError :message="form.errors.password" class="mt-2"/>
                </div>

                <div class="mt-6 flex justify-end">
                    <SecondaryButton @click="closeModal"> Cancelar</SecondaryButton>

                    <DangerButton
                        class="ml-3"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                        @click="deleteUser"
                    >
                        Apagar minha conta
                    </DangerButton>
                </div>
            </div>
        </Modal>
    </section>
</template>
