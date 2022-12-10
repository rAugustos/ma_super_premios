<template>
    <AdminLayout>
        <div class="container mx-auto max-w-screen-md p-5">
            <form @submit.prevent="submit()">
                <h1 class="font-bold text-3xl">Edição de sorteio</h1>

                <div class="grid grid-cols-2 md:grid-cols-3 gap-5 my-5">
                    <div v-for="image in product.images" class="relative">
                        <img :src="'/storage/' + image.path" alt=""
                             class="rounded-md h-28 md:h-36 object-cover w-full"/>
                        <div class="absolute w-6 h-6 grid place-items-center top-2 right-2 bg-red-500 rounded-full p-0">
                            <Link :href="route('index')">
                                <i class="bi bi-trash2-fill text-sm text-white"></i>
                            </Link>
                        </div>
                    </div>
                </div>

                <div>
                    <label for="product-image">Imagens</label>
                    <input
                        type="file"
                        multiple
                        ref="images"
                        name="images[]"
                        id="images"
                        @input="form.images = $event.target.files"
                    />
                    <InputError class="mt-2" :message="form.errors.images"/>
                </div>

                <div class="flex flex-col gap-3 mt-4 mb-2">
                    <div>
                        <InputLabel for="name" value="Nome"/>
                        <TextInput
                            id="name"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.name"
                            autocomplete="name"
                        />
                        <InputError class="mt-2" :message="form.errors.name"/>
                    </div>
                    <div>
                        <InputLabel for="share_price" value="R$ / número"/>
                        <TextInput
                            id="share_price"
                            type="number"
                            class="mt-1 block w-full"
                            v-model="form.share_price"
                        />
                        <InputError class="mt-2" :message="form.errors.share_price"/>
                    </div>
                    <div>
                        <InputLabel for="share_lot_price" value="R$ / lote"/>
                        <TextInput
                            id="share_lot_price"
                            type="number"
                            class="mt-1 block w-full"
                            v-model="form.share_lot_price"
                        />
                        <InputError class="mt-2" :message="form.errors.share_lot_price"/>
                    </div>
                    <div>
                        <InputLabel for="price" value="Meta de arrecadação"/>
                        <TextInput
                            id="price"
                            type="number"
                            class="mt-1 block w-full"
                            v-model="form.price"
                        />
                        <InputError class="mt-2" :message="form.errors.price"/>
                    </div>
                    <div>
                        <InputLabel for="buttons_value" value="Valor dos botões adicionar / remover"/>
                        <TextInput
                            id="buttons_value"
                            type="number"
                            class="mt-1 block w-full"
                            v-model="form.buttons_value"
                        />
                        <InputError class="mt-2" :message="form.errors.buttons_value"/>
                        <p class="text-sm text-gray-600">
                            quantia de números da sorte que será adicionada / removida usando os botões de + e -
                        </p>
                    </div>
                </div>

                <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Atualizar sorteio
                </PrimaryButton>
            </form>
        </div>
    </AdminLayout>
</template>

<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";
import {useForm} from "@inertiajs/inertia-vue3";
import {Link} from "@inertiajs/inertia-vue3";

const props = defineProps({
    product: Object
})

const form = useForm({
    name: props.product.name,
    images: null,
    share_price: props.product.share_price,
    share_lot_price: props.product.share_lot_price,
    price: props.product.price,
    buttons_value: props.product.buttons_value,
})

function submit() {
    form.post(route('admin.products.update', {
        product: props.product.id,
        _method: 'PUT'
    }))
}
</script>
