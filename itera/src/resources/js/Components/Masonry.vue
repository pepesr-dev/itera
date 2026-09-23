<script setup>

import Pin from '@/Components/Pin/Pin.vue';
//Define el objeto pictures del tipo array
defineProps({

    pictures: Array
});
</script>

<template>
    <div v-if="pictures.length === 0" class="text-center p-4">
        <p>No tienes imágenes</p>
    </div>


    <div v-else class="columns-[220px] gap-2 max-w-7xl mx-auto ">

        <!--Continua la emisión del picture seleccionado hacia Home-->
        <Pin v-for="picture in pictures" :key="picture.id" :picture="picture"
            @picture-to-edit="$emit('picture-to-edit', $event)" class="cursor-pointer" />
    </div>
</template>