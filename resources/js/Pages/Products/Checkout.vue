<template>
    <!--    TODO: colocar tudo num <authenticated-layout-->
    <div class="container mx-auto max-w-[35rem] p-5 relative">
        <div v-if="step==1">
            <p class="font-bold text-3xl">Confirmação do pedido</p>
            <p class="text-gray-500 text-sm mt-2">
                Valide os dados do seu pedido, caso tudo esteja de acordo clique em continuar, caso queira voltar para
                a tela do sorteio para fazer alguma alteração, clique em voltar.
            </p>
            <div class="my-4">
                <div>
                    <img
                        src="https://quatrorodas.abril.com.br/wp-content/uploads/2018/04/corolla_gli_2019.jpg?quality=70&strip=info"
                        alt="" srcset="" class="rounded-2xl">
                </div>
                <div class="flex flex-col mt-3">
                    <p class="font-bold text-lg">{{ product.name }}</p>
                    <p>R$ {{ product.share_price }} / número</p>
                    <p>{{ quantity }} números</p>
                </div>
            </div>
            <hr>
            <div class="my-4">
                <p class="text-sm">Total</p>
                <p class="font-bold text-lg">R$ {{ product.share_price * quantity }}</p>
                <div class="flex flex-row gap-3 mt-2">
                    <PrimaryButton @click="step++">Prosseguir</PrimaryButton>
                    <SecondaryButton>Voltar</SecondaryButton>
                </div>
            </div>
        </div>
        <div v-if="step==2">
            <button @click="step--"
                    class="flex flex-row items-center gap-2 rounded-lg mb-2 hover:bg-gray-100 w-fit px-2 py-1 cursor-pointer">
                <i class="bi bi-chevron-left"></i>
                <p class="text-gray-600 text-sm">Voltar</p>
            </button>
            <p class="font-bold text-3xl">Pagamento</p>
            <p class="text-gray-500 text-sm mt-2">
                Para finalizarmos o checkout e você receber os seus números da sorte, é preciso efetuar o pagamento via
                PIX.
                Você pode utilizar tanto o QR code quanto a chave copia e cola.
            </p>
            <div class="border p-3 rounded w-3/4 aspect-square mt-4">
                <img src="http://faq-login-unico.servicos.gov.br/en/latest/_images/imagem_qrcode_exemplo.jpg" alt=""
                     class="w-full aspect-square">
            </div>
            <p class="mt-2 mb-1 font-semibold">Chave copia e cola:</p>
            <div class="flex flex-row w-full">
                <div class="rounded-l-md border-emerald-400 border-dashed border-2 bg-gray-50 p-3 overflow-hidden">
                    <div class="flex flex-row justify-between gap-1">
                        <p class="text-emerald-400 font-bold whitespace-nowrap">
                            2022-11-18 16:14:27 UTC 2022-11-18 16:14:27 UTC 2022-11-18 16:14:27 UTC
                            2022-11-18
                            16:14:27 2022-11-18 16:14:27 UTC 2022-11-18 16:14:27 UTC 2022-11-18 16:14:27 UTC
                            2022-11-18
                            16:14:27
                            UTC
                        </p>
                    </div>
                </div>
                <button
                    class="bg-gray-200 grid place-items-center p-3 rounded-r-md border border-gray-300 cursor-pointer rounded-l-none"
                    @click="endCheckout()">
                    <i class="bi bi-clipboard"></i>
                </button>
            </div>
        </div>
        <div v-if="step==3">
            <div class="flex flex-col items-center text-center">
                <img src="https://openjournalsystems.com/file/2017/07/payment-success.png" alt="">
                <div class="">
                    <h1 class="font-bold text-2xl mt-2">Pagamento confirmado</h1>
                    <p class="text-gray-600">
                        Seu pagamento foi confirmado e
                        seus números foram gerados!
                        <br>
                        Cruze os dedos e boa sorte!
                    </p>
                    <Link :href="route('numbers')">
                        <PrimaryButton>Ver meus sorteios</PrimaryButton>
                    </Link>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import {ref} from "vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import {Link} from '@inertiajs/inertia-vue3'

const step = ref(1);

defineProps({
    product: Object,
    quantity: Number,
})

function copyPIX(text) {
    navigator.clipboard.writeText(text)
}

function endCheckout() {
    //generate numbers
    this.step++
}

function generateNumbers() {
    // for ($i = 0; $i < $this->quantity; $i++) {
    //     $number = LuckyNumber::generateNumber($this->product->id);
    //
    //     LuckyNumber::create([
    //         'user_id' => auth()->id(),
    //         'product_id' => $this->product->id,
    //         'number' => $number,
    // ]);
    // }
}
</script>
