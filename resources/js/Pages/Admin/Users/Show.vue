<template>
    <AdminLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ user.name }}</h2>
        </template>
        <div class="container mx-auto max-w-screen-lg">
            <div>
                <p>E-mail</p>
                <p>{{ user.email }}</p>
            </div>
            <div>
                <p>Telefone</p>
                <p>{{ user.phone }}</p>
            </div>
            <div>
                <p>CPF</p>
                <p>{{ user.document || 'Não informado' }}</p>
            </div>
            <hr>
            <p class="font-semibold text-lg">Sorteios</p>
            <div class="overflow-x-auto relative shadow-md sm:rounded-lg mt-4">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6">Sorteio</th>
                        <th scope="col" class="py-3 px-6">R$ número</th>
                        <th scope="col" class="py-3 px-6">Quantidade</th>
                        <th scope="col" class="py-3 px-6">R$ total</th>
                        <th scope="col" class="py-3 px-6">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="product in products" :key="product.id"
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ product.name }}
                        </th>
                        <td class="py-4 px-6">{{ product.share_price }}</td>
                        <td class="py-4 px-6">{{product.name}}</td>
<!--                        <td class="py-4 px-6">{{count}}</td>-->
                        <td class="py-4 px-6">Ver números</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AdminLayout>
</template>

<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";

const props = defineProps({
    user: Object,
    products: Object,
    count: Object
})

</script>
