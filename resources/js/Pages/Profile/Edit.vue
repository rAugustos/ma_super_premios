<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import DeleteUserForm from './Partials/DeleteUserForm.vue';
import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue';
import {Head} from '@inertiajs/inertia-vue3';

defineProps({
    mustVerifyEmail: Boolean,
    status: String,
});
</script>

<template>
    <Head title="Perfil"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-100 pl-4 sm:pl-0">Perfil</h2>
        </template>

        <div class="p-5">
            <div class="max-w-screen-md mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-5 sm:p-8 bg-white dark:bg-slate-800 shadow rounded-lg">
                    <UpdateProfileInformationForm
                        :must-verify-email="mustVerifyEmail"
                        :status="status"
                    />
                </div>

                <div class="p-5 sm:p-8 bg-white dark:bg-slate-800 shadow rounded-lg">
                    <UpdatePasswordForm/>
                </div>

                <div class="p-5 sm:p-8 bg-white dark:bg-slate-800 shadow rounded-lg">
                    <DeleteUserForm/>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
