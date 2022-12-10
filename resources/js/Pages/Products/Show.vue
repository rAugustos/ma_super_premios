<template>
    <Head title="Produtos"/>

    <AuthenticatedLayout>
        <div class="container mx-auto max-w-screen-lg">
            <div class="grid sm:grid-cols-8 gap-6 p-5">
                <div class="w-full flex flex-col gap-3 col-span-5">
                    <div class="flex items-center w-full sm:h-96">
                        <div class="w-full flex">
                            <img class="w-full rounded-2xl object-cover sm:h-96"
                                 :src="'/storage/' + image" alt=""/>
                        </div>
                    </div>
                    <div class="flex mt-1 gap-2 overflow-auto">
                        <img v-for="productImage in product.images"
                             @click="image = productImage.path"
                             :src="'/storage/' + productImage.path" alt=""
                             class="rounded-2xl h-28 object-cover w-40 cursor-pointer"/>
                    </div>
                </div>
                <div class="col-span-3">
                    <p class="text-2xl font-bold">
                        {{ product.name }}
                    </p>
                    <div class="bg-emerald-400 px-2 py-1 rounded-xl my-2 w-fit">
                        <p class="font-semibold">
                            R$ {{ product.share_price }}
                        </p>
                    </div>
                    <div class="my-4">
                        <p class="text-lg font-bold">
                            Compartilhe
                        </p>
                        <div class="flex flex-row gap-3 mt-2">
                            <a :href="'https://www.facebook.com/sharer/sharer.php?u=' + url"
                               class="rounded-full cursor-pointer p-0 bg-blue-500 grid place-items-center text-white w-10 aspect-square">
                                <i class="bi bi-facebook text-2xl"></i>
                            </a>
                            <a :href="'whatsapp://send?text=Esse ' + product.name + ' pode ser seu! participe: ' + url + '. Somente no Super Prêmios'"
                               class="rounded-full cursor-pointer p-0 bg-green-400 grid place-items-center text-white w-10 aspect-square">
                                <i class="bi bi-whatsapp text-2xl"></i>
                            </a>
                            <a :href="'https://twitter.com/intent/tweet?url=' + url + '&text=Esse%20' + product.name + '%20pode%20ser%20seu!%20Participe:' "
                               class="rounded-full cursor-pointer p-0 bg-blue-500 text-white w-10 aspect-square grid place-items-center">
                                <i class="bi bi-twitter text-2xl"></i>
                            </a>
                            <a :href="'https://telegram.me/share/url?url=' + url"
                               class="rounded-full cursor-pointer p-0 bg-black text-white w-10 aspect-square grid place-items-center">
                                <i class="bi bi-telegram text-2xl"></i>
                            </a>
                        </div>
                    </div>
                    <div class="my-4">
                        <p class="text-lg font-bold">
                            Promoções
                        </p>
                        <div class="grid grid-cols-2 gap-2 mt-2 w-72">
                            <button @click="quantity = 10"
                                    class="border text-gray-700 font-normal border-gray-300 px-3 cursor-pointer py-1 rounded-lg hover:border-emerald-400 hover:text-emerald-400 transition-all">
                                10 - R$ {{ 10 * product.share_price }}
                            </button>
                            <button @click="quantity = 20"
                                    class="border text-gray-700 font-normal border-gray-300 px-3 cursor-pointer py-1 rounded-lg hover:border-emerald-400 hover:text-emerald-400 transition-all">
                                20 - R$ {{ 20 * product.share_price }}
                            </button>
                            <button @click="quantity = 30"
                                    class="border text-gray-700 font-normal border-gray-300 px-3 cursor-pointer py-1 rounded-lg hover:border-emerald-400 hover:text-emerald-400 transition-all">
                                30 - R$ {{ 30 * product.share_price }}
                            </button>
                            <button @click="quantity = 40"
                                    class="border text-gray-700 font-normal border-gray-300 px-3 cursor-pointer py-1 rounded-lg hover:border-emerald-400 hover:text-emerald-400 transition-all">
                                40 - R$ {{ 40 * product.share_price }}
                            </button>
                        </div>
                    </div>
                    <div class="my-2 flex flex-col">
                        <p class="text-sm">
                            Total
                        </p>
                        <p class="text-2xl font-bold">
                            R$ {{ quantity * product.share_price }}
                        </p>
                        <div class="flex flex-row items-center gap-3 mt-3">
                            <button
                                @click="quantity = quantity >= product.buttons_value ? quantity - product.buttons_value : 0"
                                class="rounded-full text-gray-700 border border-gray-300 place-items-center hover:text-red-500 hover:border-red-500 transition-all p-1 aspect-square">
                                -{{ product.buttons_value }}
                            </button>
                            <p>
                                {{ quantity }} cotas
                            </p>
                            <button @click="quantity += product.buttons_value"
                                    class="rounded-full text-gray-700 aspect-square grid place-items-center border border-gray-300 hover:border-emerald-400 hover:text-emerald-400 p-1 transition-all">
                                +{{ product.buttons_value }}
                            </button>
                        </div>
                    </div>
                    <div class="mt-5 flex flex-row gap-2 items-center">
                        <Link :href="route('products.checkout', {'product': product.id, 'quantity': quantity})">
                            <PrimaryButton>Prosseguir <i class="bi bi-cart-check"></i></PrimaryButton>
                        </Link>
                        <Link :href="route('numbers')">
                            <SecondaryButton>Ver meus números</SecondaryButton>
                        </Link>
                    </div>
                </div>
            </div>
            <FAQ/>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head} from '@inertiajs/inertia-vue3';
import FAQ from "@/Components/FAQ.vue";
import {Link} from '@inertiajs/inertia-vue3';
import PrimaryButton from "@/Components/PrimaryButton.vue";
import {ref} from "vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";

const props = defineProps({
    product: Object,
    url: String
})

const image = ref(props.product.images[0].path);

const quantity = ref(0)
</script>
