<template>
    <div class="py-8 bg-gray-50 dark:bg-zinc-900 p-5">
        <div class="container mx-auto max-w-screen-lg flex flex-col items-center">
            <i class="bi bi-trophy-fill text-yellow-300 text-6xl"></i>
            <p class="text-3xl font-bold text-emerald-400">
                Últimos sorteios
            </p>
            <p class="dark:text-gray-300">
                Confira os últimos sorteios e saiba se você foi contemplado!
            </p>
            <div class="grid md:grid-cols-5 w-full gap-5 my-3">
                <ProductCard v-for="product in products" :product="product" :key="product.id" />
            </div>
            <Link :href="route('products.index')">
                <PrimaryButton>Ver mais</PrimaryButton>
            </Link>
        </div>
    </div>
</template>

<script setup>
import {Link} from '@inertiajs/inertia-vue3';
import PrimaryButton from "@/Components/PrimaryButton.vue";
import ProductCard from "@/Components/ProductCard.vue"

defineProps({
    products: Object
})
</script>
