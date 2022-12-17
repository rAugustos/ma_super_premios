<template>
    <div class="flex flex-col my-6">
        <p class="font-semibold text-xl dark:text-gray-100">Últimos números federal</p>
        <p class="dark:text-gray-400">Concurso de número: {{ federal.numero }}, data:
            {{ federal.dataApuracao }}</p>
        <div class="w-full rounded-lg bg-white dark:bg-slate-800 shadow my-3">
            <table class="table-auto w-full">
                <thead class="dark:text-gray-300">
                <tr class="text-left rounded-t-lg">
                    <th>Número</th>
                    <th>Vencedor</th>
                    <th>Sorteio</th>
                </tr>
                </thead>
                <tbody class="rounded-t-lg">
                <tr v-for="numero in federal.listaDezenas" class="dark:text-gray-100 hover:bg-gray-100 dark:hover:bg-slate-700">
                    <td>{{ numero }}</td>
                    <td>aorsitenarsoetanst</td>
                    <td>aorsitenarsotien</td>
                </tr>
                </tbody>
            </table>
        </div>
        <p class="dark:text-gray-400">
            Próximo concurso: {{ federal.numeroConcursoProximo }}
        </p>
    </div>
</template>
<script setup>
defineProps({
    federal: Object
})
</script>
<style scoped>
th, td {
    @apply px-4 py-2;
}
</style>
