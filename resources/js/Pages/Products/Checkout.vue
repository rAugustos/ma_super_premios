<template>
    <!--    TODO: colocar tudo num <authenticated-layout-->
    <div class="container mx-auto max-w-[35rem] p-5 relative">
        <div v-if="step===1">
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
                    <PrimaryButton @click="generatePIX()">Prosseguir</PrimaryButton>
                    <SecondaryButton>Voltar</SecondaryButton>
                </div>
            </div>
        </div>
        <div v-if="step===2">
            <button @click="step--"
                    class="text-gray-600 text-sm flex flex-row items-center gap-2 rounded-lg mb-2 hover:bg-gray-100 w-fit px-2 py-1 cursor-pointer">
                <i class="bi bi-chevron-left"></i> Voltar
            </button>
            <p class="font-bold text-3xl">Pagamento</p>
            <p class="text-gray-500 text-sm mt-2">
                Para finalizarmos o checkout e você receber os seus números da sorte, é preciso efetuar o pagamento via
                PIX.
                Você pode utilizar tanto o QR code quanto a chave copia e cola.
            </p>

            <div class="border p-2 rounded w-48 aspect-square mt-4">
                <img src="http://faq-login-unico.servicos.gov.br/en/latest/_images/imagem_qrcode_exemplo.jpg" alt=""
                     class="w-full aspect-square">
            </div>
            <p class="mt-3 mb-1.5 font-semibold">Chave copia e cola:</p>
            <div class="flex flex-row w-full">
                <div class="rounded-l border-emerald-400 border-dashed border-2 bg-gray-50 p-2 overflow-hidden">
                    <div class="flex flex-row justify-between gap-1">
                        <p class="text-emerald-400 font-bold whitespace-nowrap text-sm">
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
                    class="bg-gray-200 grid place-items-center py-2 px-4 rounded-r border border-gray-300 cursor-pointer rounded-l-none"
                    @click="copyPIX()">
                    <i class="bi bi-clipboard text-gray-600"></i>
                </button>
            </div>
        </div>
        <div v-if="step===3">
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
import {reactive, ref} from "vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import {Link} from '@inertiajs/inertia-vue3'
import axios from "axios"

const step = ref(1);
const pix = reactive({});

const props = defineProps({
    product: Object,
    quantity: Number,
})

const sandbox_url = "https://devportal.itau.com.br/sandboxapi";

const auth = {
    client_id: "d4b0717d-da08-3baa-adee-77eb85f59566",
    sandbox_token: "eyJhbGciOiJIUzI1NiJ9.eyJzb3VyY2UiOiJzdHMtc2FuZGJveCIsImVudiI6IlAiLCJmbG93IjoiQ0MiLCJzY29wZSI6InBpeF9yZWNlYmltZW50b3NfZXh0X3YyLXNjb3BlLCBwYWdhbWVudG9zLXBpeGluZGlyZXRvcy12MS1leHQtYXdzLXNjb3BlLCBwaXhfcmVjZWJpbWVudG9zX2NvbmNpbGlhY29lc192Ml9leHQtc2NvcGUsIHNpc3BhZ19leHQtc2NvcGUsIGRpY3QtaW5kaXJldG8tdjItZXh0LWF3cy1zY29wZSIsInN1YiI6ImQ0YjA3MTdkLWRhMDgtM2JhYS1hZGVlLTc3ZWI4NWY1OTU2NiIsImlhdCI6MTY3MTAzNjg3NSwiZXhwIjoxNjcxMDM3NDc1fQ.TMJUzuatS6AdS_8uwILNAkCm90XSca_W3VjGiC4Lfac", // todo: gerar função para gerar token
    client_secret: "f7ea714f-fdd7-4a4d-990e-f081fa7af269"
}

async function generatePIX() {
    try {
        const response = await axios.post(
            `${sandbox_url}/pix_recebimentos_ext_v2/v2/cob`,
            {
                calendario: {
                    expiracao: 3600
                },
                valor: {
                    original: props.product.price * props.quantity,
                    modalidadeAlteracao: 1
                },
                chave: "7d9f0335-8dcc-4054-9bf9-0dbd61d36906"
            },
            {
                headers: {
                    "client_id": this.auth.client_id,
                    "client_secret": this.auth.client_secret,
                    "Authorization": `Bearer ${this.auth.sandbox_token}`,
                    "x-itau-apikey": this.auth.client_id,
                    "x-sandbox-token": this.auth.sandbox_token
                }
            }
        )

        this.pix = response.data
        console.log(this.pix)
    } catch (e) {
        console.error(e)
    }

    this.step++
}

function copyPIX(text) {
    navigator.clipboard.writeText(text)
    alert('Chave copiada com sucesso.')
}

async function generateNumbers() {
    try {
        const response = await axios.post(route('generate-numbers', {
            product_id: props.product.id,
            quantity: props.quantity
        }))

        console.log(response.data)
    } catch (error) {
        console.error(error);
    }
}

function endCheckout() {
    this.generateNumbers();
    this.step++
}
</script>
