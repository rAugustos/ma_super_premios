<template>
    <Link :href="route('products.show', product.id)"
          class="grid grid-cols-2 dark:bg-slate-800 dark:p-4 gap-4 md:gap-1 md:flex md:flex-row md:flex-col rounded-2xl md:relative">
        <div class="relative">
            <img
                :src="'/storage/' + product.images[0].path"
                alt="" class="rounded-xl md:mb-2 shadow-xl md:shadow-lg w-fit md:w-full"/>

        </div>
        <div class="flex flex-col">
            <div
                class="rounded-md px-2 w-fit py-0.5 bg-slate-600 text-white text-sm mb-1">
                <p class="font-medium"><!--                    {{ product.luckyNumbers.length >= 90000 ? 'Finalizado' : 'Disponível' }}-->
                    Finalizado
                </p>
            </div>
            <p class="font-bold dark:text-gray-100">{{ product.name }}</p>
            <p class="dark:text-gray-300">R$ {{ product.share_price }} / número</p>
        </div>
    </Link>
</template>

<script setup>
import {Link} from '@inertiajs/inertia-vue3'

defineProps({
    product: Object
})
</script>
