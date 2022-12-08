<template>
    <AdminLayout>
        <div class="container mx-auto max-w-screen-md p-5">
            <form @submit.prevent="form.put(route('admin.products.update', product.id))">
                <h1 class="font-bold text-3xl">Edição de sorteio</h1>

                <input
                    type="file"
                    multiple
                    ref="images"
                    name="images[]"
                    id="images"
                    @input="form.images = $event.target.files"
                />

                <div class="flex flex-col gap-3 my-4">
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

                <PrimaryButton>Atualizar sorteio</PrimaryButton>
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

const props = defineProps({
    product: Object,
})

const form = useForm({
    name: props.product.name,
    share_price: props.product.share_price,
    share_lot_price: props.product.share_lot_price,
    price: props.product.price,
    buttons_value: props.product.buttons_value,
})
</script>
