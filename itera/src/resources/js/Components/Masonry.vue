<script setup>
/**
 * Muestra de forma masiva un montón de componentes pin
 * con los datos de las diferentes imágenes almacenadas 
 * en la base de datos.
 */
//Importa el componente Pin
import Pin from '@/Components/Pin/Pin.vue';
//Obtiene un array de objetos pictures
defineProps({

    pictures: Array
});
</script>

<template>
    <!--Muestra un mensaje si no hay imágenes-->
    <div v-if="pictures.length === 0" class="text-center p-4">
        <p>No tienes imágenes</p>
    </div>

    <!--
    Si hay imágenes las dispone en forma de tablas con tantas columnas
    como permita el ancho de la pantalla
    
    Crea tantas columnas de 220px como quepan
    
    Ancho máximo 7xl -> 80rem -> 1280px para controlar el ancho en 
    pantallas superiores a 1280px
    mx-auto centra horizontalmente en la pantalla
    -->
    <div v-else class="columns-[220px] gap-2 max-w-7xl mx-auto ">
        <!--
        Agrega pins
        :[nuevo objeto]="[objeto sacado por el bucle]"
        -->
        <Pin v-for="picture in pictures" :key="picture.id" :picture="picture" class="cursor-pointer" />
    </div>
</template>