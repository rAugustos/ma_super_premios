<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Seus sorteios</h2>
        </template>
        <div class="container mx-auto max-w-screen-md">
            <div class="grid grid-cols-2 gap-3 my-4">
                <a v-for="number in luckyNumbers.data" :href="route('products.show', number.product_id)">
                    <div class="bg-white border shadow-sm rounded-xl p-4 flex flex-row gap-3">
                        <img
                            src="https://quatrorodas.abril.com.br/wp-content/uploads/2018/04/corolla_gli_2019.jpg?quality=70&strip=info"
                            alt="" class="rounded-lg h-32">
                        <div class="flex flex-col">
                            <p class="text-gray-600 text-sm font-medium">{{ number.created_at }}</p>
                            <p class="font-bold text-lg">{{ number.product.name }}</p>
                            <p class="font-semibold">R$ {{ number.product.price }}</p>
                            <p>{{ luckyNumbers.length }} números</p>
                            <p>R$ {{ luckyNumbers.length * luckyNumbers[0].product_id.price }}</p>
                        </div>
                    </div>
                </a>
                <!--        if vazio -->
                <!--        <p>-->
                <!--            Você ainda não está participando de nenhum sorteio.-->
                <!--        </p>-->
                <!--        <div>-->
                <!--            <a class="btn btn-primary" href="{{ url('/products') }}">-->
                <!--                Ver sorteios-->
                <!--            </a>-->
                <!--        </div>-->
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

defineProps({
    luckyNumbers: Object,
})
</script>
