<template>
    <Link :href="route('products.show', product.id)" class="flex flex-col w-full">
        <div class="relative">
            <img
                :src="'/storage/' + product.images[0].path"
                alt="" class="rounded-lg w-full sm:max-h-44 object-cover mb-2 border shadow-sm" />
            <!--            <div-->
            <!--                class="absolute top-2 right-2 bg-{{ $count >= 90000 ? 'red' : 'emerald' }}-500 px-2 rounded-md text-white text-sm font-semibold">-->
            <!--                <p>-->
            <!--                    {{ $count >= 90000 ? 'Finalizado' : 'Disponível' }}-->
            <!--                </p>-->
            <!--            </div>-->
        </div>
        <div class="px-2 flex flex-col">
        <span class="font-bold dark:text-gray-100">
            {{ product.name }}
        </span>
            <span class="dark:text-gray-300">
            R$ {{ product.share_price }} / número
        </span>
        </div>
    </Link>
</template>

<script setup>
import {Link} from '@inertiajs/inertia-vue3'

defineProps({
    product: Object
})
</script>
