<template>
    <div class="py-8 p-5 dark:bg-slate-900">
        <div class="container mx-auto max-w-screen-lg flex flex-col">
            <i class="bi bi-trophy-fill text-yellow-300 text-6xl mt-2"></i>
            <p class="text-3xl font-bold text-emerald-400 pt-4">Ganhadores</p>
            <p class="dark:text-gray-400 text-lg">Confira os últimos contemplados.</p>
            <div class="grid md:grid-cols-4 gap-5 my-3">
                <div class="grid grid-cols-2 bg-slate-800 p-4 gap-4 md:gap-1 md:flex md:flex-row md:flex-col rounded-2xl md:relative" v-for="i in 4" :key="i">
                    <img class="rounded-xl md:mb-2 shadow-xl md:shadow-md w-fit md:w-full"
                         src="https://s2.glbimg.com/C8DPoFEicKl_HlJ9FbPlSXw-IT4=/0x0:2200x1500/924x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_cf9d035bf26b4646b105bd958f32089d/internal_photos/bs/2021/p/W/DKjqzoTKKYzNfeb4CzWA/corollafrente.jpg"
                         alt="">
                    <div class="flex flex-col">
                        <div
                            class="rounded-md px-2 w-fit py-0.5 bg-slate-600 text-white text-sm mb-1">
                            <p class="font-medium">12/06/2022 - 18:33</p>
                        </div>
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
