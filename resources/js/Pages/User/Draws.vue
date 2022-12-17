<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-100 pl-4 sm:pl-0">Seus sorteios</h2>
        </template>
        <div class="container mx-auto max-w-screen-lg sm:py-6 py:4">
            <div class="overflow-x-auto relative shadow-md sm:rounded-lg mt-2">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6">Sorteio</th>
                        <th scope="col" class="py-3 px-6">R$ / número</th>
                        <th scope="col" class="py-3 px-6">Quantidade</th>
                        <th scope="col" class="py-3 px-6">R$ total</th>
                        <th scope="col" class="py-3 px-6">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(product, index) in products" :key="product.id"
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ product.name }}
                        </th>
                        <td class="py-4 px-6">{{ product.share_price }}</td>
                        <td class="py-4 px-6">{{ product.lucky_numbers.length }}</td>
                        <td class="py-4 px-6">{{ product.lucky_numbers.length * product.share_price }}</td>
                        <td class="py-4 px-6">
                            <button @click="showNumbers = true; productIndex = index">Ver números</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <Modal :show="showNumbers" @close="showNumbers = false">
                <div class="p-6">
                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        Números do sorteio: {{ products[productIndex].name }}
                    </h2>
                    <p class="mt-1 md:text-sm text-gray-500 dark:text-gray-400">
                        <span v-for="luckyNumber in products[productIndex].lucky_numbers">
                            {{ luckyNumber.number }},
                        </span>
                    </p>
                </div>
            </Modal>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import {ref} from "vue";
import Modal from "@/Components/Modal.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

const props = defineProps({
    user: Object,
    products: Object,
})

const showNumbers = ref(false)
const productIndex = ref(null)
</script>
