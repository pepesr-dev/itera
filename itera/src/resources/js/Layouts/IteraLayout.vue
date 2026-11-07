<script setup>
import TopNav from "@/Components/TopNav.vue";
import AsideNav from "@/Components/AsideNav.vue";



</script>
<template>

    <div class="min-h-screen flex flex-col">

        <TopNav />

        <div class="flex flex-1 pt-16">
            <AsideNav />


            <main class="ml-16 pt-0 flex-1 p-1">
                <slot />
            </main>

        </div>
    </div>
</template>