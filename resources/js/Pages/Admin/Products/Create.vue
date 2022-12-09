<template>
    <AdminLayout>
        <div class="container mx-auto max-w-screen-md p-5">
            <form @submit.prevent="submit()">
                <h1 class="font-bold text-3xl">Criação de sorteio</h1>

                <!--                @error('images')-->
                <!--                <div class="bg-red-100 border border-red-400 p-4 rounded-lg mt-3">-->
                <!--                    <p class="font-semibold text-gray-800">-->
                <!--                        {{ $message }}-->
                <!--                    </p>-->
                <!--                </div>-->
                <!--                @enderror-->

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

                <!--                <div class="mt-4">-->
                <!--                    <div class="flex items-center justify-center w-full">-->
                <!--                        <label for="dropzone-file"-->
                <!--                               class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">-->
                <!--                            <div class="flex flex-col items-center justify-center pt-5 pb-6">-->
                <!--                                <i class="bi bi-cloud-upload text-3xl mb-1"></i>-->
                <!--                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">-->
                <!--                                <span class="font-semibold">-->
                <!--                                    Clique aqui-->
                <!--                                </span>-->
                <!--                                    ou arraste seus arquivos-->
                <!--                                </p>-->
                <!--                                <p class="text-xs text-gray-500 dark:text-gray-400">-->
                <!--                                    PNG, JPG ou JPEG (max. 800x400px)-->
                <!--                                </p>-->
                <!--                            </div>-->
                <!--                            <input id="dropzone-file" type="file" class="hidden" name="images[]" multiple/>-->
                <!--                        </label>-->
                <!--                    </div>-->
                <!--                </div>-->

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

                <!--                <div class="flex flex-row items-center my-4">-->
                <!--                    <input id="comments" name="comments" type="checkbox"-->
                <!--                           class="h-4 w-4 rounded border-gray-300 text-emerald-400 focus:ring-emerald-400">-->
                <!--                    <div class="ml-3 text-sm">-->
                <!--                        <label for="comments">-->
                <!--                            Notificar usuários-->
                <!--                        </label>-->
                <!--                        <p class="text-gray-500">-->
                <!--                            Enviar e-mail para os usuários informando sobre o novo sorteio.-->
                <!--                        </p>-->
                <!--                    </div>-->
                <!--                </div>-->

                <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">Criar
                    sorteio
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

const form = useForm({
    name: "",
    images: null,
    share_price: null,
    share_lot_price: null,
    price: null,
    buttons_value: 50,
})

function submit() {
    form.post(route('admin.products.store'))
}
</script>
