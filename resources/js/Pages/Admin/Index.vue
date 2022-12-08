<template>
    <AdminLayout>
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <div class="min-w-full p-5 min-h-screen">
                <p class="font-semibold text-xl">Overview</p>
                <div class="my-3 grid grid-cols-3 gap-5">
                    <div class="bg-white dark:bg-zinc-700 shadow rounded-lg flex flex-col">
                        <div class="p-4 flex flex-row items-center gap-3">
                            <i class="bi text-2xl text-gray-500 bi-123"></i>
                            <div class="flex flex-col">
                                <p class="text-gray-500 text-sm font-medium">Números vendidos esse mês</p>
                                <p class="font-bold text-lg">10921</p>
                            </div>
                        </div>
                        <p class="text-blue-500 bg-gray-50 dark:bg-zinc-600 hover:bg-gray-100 py-2 px-4 cursor-pointer rounded-b-lg">
                            Ver todos
                        </p>
                    </div>
                    <div class="bg-white dark:bg-zinc-700 shadow rounded-lg flex flex-col">
                        <div class="p-4 flex flex-row items-center gap-3">
                            <i class="bi text-2xl text-gray-500 bi-123"></i>
                            <div class="flex flex-col">
                                <p class="text-gray-500 text-sm font-medium">Total arrecadado</p>
                                <p class="font-bold text-lg">10921</p>
                            </div>
                        </div>
                        <p
                            class="text-blue-500 bg-gray-50 dark:bg-zinc-600 hover:bg-gray-100 py-2 px-4 cursor-pointer rounded-b-lg">
                            Ver todos
                        </p>
                    </div>
                    <div class="bg-white dark:bg-zinc-700 shadow rounded-lg flex flex-col">
                        <div class="p-4 flex flex-row items-center gap-3">
                            <i class="bi text-2xl text-gray-500 bi-person"></i>
                            <div class="flex flex-col">
                                <p class="text-gray-500 text-sm font-medium">Novos usuários</p>
                                <p class="font-bold text-lg">50</p>
                            </div>
                        </div>
                        <p
                            class="text-blue-500 bg-gray-50 dark:bg-zinc-600 dark:hover:bg-zinc-500 hover:bg-gray-100 py-2 px-4 cursor-pointer rounded-b-lg">
                            Ver todos
                        </p>
                    </div>
                </div>
                <div class="flex flex-col my-6">
                    <p class="font-semibold text-xl">Últimos números federal</p>
                    <p>Concurso de número: {{ federal.numero }}, data: {{ federal.dataApuracao }}</p>
                    <div class="w-full rounded-lg bg-white dark:bg-zinc-700 shadow p-4 my-3">
                        <table class="table-auto">
                            <thead>
                            <tr class="text-left">
                                <th>Número</th>
                                <th>Vencedor</th>
                                <th>Sorteio</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="numero in federal.listaDezenas">
                                <td>{{ numero }}</td>
                                <td>aorsitenarsoetanst</td>
                                <td>aorsitenarsotien</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    Próximo concurso: {{ federal.numeroConcursoProximo }}
                </div>
            </div>
        </div>
    </AdminLayout>
</template>

<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";

defineProps({
    federal: Object
})
</script>
