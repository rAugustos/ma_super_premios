<template>
    <Head title="Produtos"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-100 pl-4 sm:pl-0">
                Sorteios
            </h2>
        </template>
        <div class="container mx-auto max-w-screen-lg p-5">
            <div class="grid sm:grid-cols-3 gap-4 mb-4 md:mt-8">
                <ProductCard v-for="product in products.data" :key="product.id" :product="product"/>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head} from '@inertiajs/inertia-vue3';
import ProductCard from "@/Components/ProductCard.vue"

defineProps({
    products: Object,
})
</script>
