<template>
    <div class="py-8 bg-gray-50 dark:bg-slate-900 p-5">
        <div class="container mx-auto max-w-screen-lg flex flex-col">
            <i class="bi bi-trophy-fill text-yellow-300 text-6xl mt-2"></i>
            <p class="text-3xl font-bold text-emerald-400 pt-4">Últimos sorteios</p>
            <p class="dark:text-gray-400 text-lg mb-2">
                Confira os últimos sorteios e saiba se você foi contemplado!
            </p>
            <div class="grid md:grid-cols-4 w-full gap-5 my-3" v-if="products">
                <ProductCard v-for="product in products" :product="product" :key="product.id"/>
                <div v-if="products.length < 4" v-for="i in (4 - products.length)"
                     class="grid grid-cols-2 bg-slate-800 p-4 gap-4 md:gap-1 md:flex md:flex-row md:flex-col rounded-2xl md:relative">
                    <div class="relative">
                        <img src="https://developers.elementor.com/docs/assets/img/elementor-placeholder-image.png"
                             alt="" class="rounded-xl md:mb-2 shadow-xl md:shadow-md w-fit md:w-full"/>
                    </div>
                    <div class="flex flex-col">
                        <p class="font-bold dark:text-gray-100">Em breve...</p>
                        <p class="dark:text-gray-300">Fique atento ao seu e-mail</p>
                    </div>
                </div>
            </div>
            <div class="grid md:grid-cols-5 w-full gap-5 my-3" v-else>
                <p>
                    Ops, parece que não temos nenhum sorteio por enquanto, assine nossa newsletter para ficar sabendo.
                </p>
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
