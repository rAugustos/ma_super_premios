<template>
    <AdminLayout>
        <div class="max-w-screen-lg mx-auto">
            <div class="min-w-full p-5 min-h-screen">
                <Overview/>
                <LatestDraws :federal="federal"/>
            </div>
        </div>
    </AdminLayout>
</template>

<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import LatestDraws from "@/Pages/Admin/Index/Partials/LatestDraws.vue";
import Overview from "@/Pages/Admin/Index/Partials/Overview.vue";

defineProps({
    federal: Object
})
</script>
