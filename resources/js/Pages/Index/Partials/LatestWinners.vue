<template>
    <div class="py-8 p-5">
        <div class="container mx-auto max-w-screen-lg flex flex-col items-center">
            <i class="bi bi-trophy-fill text-yellow-300 text-6xl"></i>
            <p class="text-3xl font-bold text-emerald-400">Ganhadores</p>
            <p class="dark:text-gray-300">Confira os últimos contemplados.</p>
            <div class="grid grid-cols-4 gap-3 my-3">
                <div class="flex flex-col rounded-2xl relative" v-for="i in 4" :key="i">
                    <img class="rounded-2xl mb-2 shadow-md"
                         src="https://s2.glbimg.com/C8DPoFEicKl_HlJ9FbPlSXw-IT4=/0x0:2200x1500/924x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_cf9d035bf26b4646b105bd958f32089d/internal_photos/bs/2021/p/W/DKjqzoTKKYzNfeb4CzWA/corollafrente.jpg"
                         alt="">
                    <div class="absolute rounded-md px-2 py-0.5 top-1 right-1 bg-slate-600 text-white text-sm">
                        <p class="font-medium">12/06/2022 - 18:33</p>
                    </div>
                    <div class="px-2 flex flex-col">
                        <p class="font-bold dark:text-gray-100">Francisco de Souza</p>
                        <p class="dark:text-gray-300">Toyotta Corolla XEI 2022</p>
                    </div>
                </div>
            </div>
            <PrimaryButton>Ver mais</PrimaryButton>
        </div>
    </div>
</template>

<script setup>
import PrimaryButton from "@/Components/PrimaryButton.vue";</script>
