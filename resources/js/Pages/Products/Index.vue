<template>
    <Head title="Produtos"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Sorteios
            </h2>
        </template>
        <div class="container mx-auto max-w-screen-lg p-5">
            <!--            <h1 class="font-bold text-3xl mt-8">-->
            <!--                Sorteios-->
            <!--            </h1>-->
            <div class="grid sm:grid-cols-3 gap-4 mb-4 mt-8">
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
