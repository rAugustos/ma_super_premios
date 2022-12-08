<template>
    <AuthenticatedLayout>
        <LatestWinners />
        <Partners />
        <HowTo />
        <NewsLetter />
        <LatestDraws :products="products" />
    </AuthenticatedLayout>
</template>
<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import LatestWinners from "@/Pages/Index/Partials/LatestWinners.vue";
import Partners from "@/Pages/Index/Partials/Partners.vue";
import HowTo from "@/Pages/Index/Partials/HowTo.vue";
import NewsLetter from "@/Pages/Index/Partials/NewsLetter.vue";
import LatestDraws from "@/Pages/Index/Partials/LatestDraws.vue";

defineProps({
    products: Object
})
</script>
