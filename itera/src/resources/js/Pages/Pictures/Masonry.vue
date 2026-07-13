<!--Carga la -->
<script setup>
import { Link } from '@inertiajs/vue3';

//Constante que recibe el array de imágenes
defineProps({
    pictures: Array
});



</script>

<template>


    <div class="columns-2 md:columns-4 lg:columns-6 gap-4">



        <!--Si no hay imágenes muestra un mensaje-->
        <div v-if="pictures.length === 0">
            <p>No tienes imágenes</p>
        </div>

        <!--Recorrerá cada imagen por su id correspondiente  -->
        <div v-for="picture in pictures" :key="picture.id" class="break-inside-avoid mb-4">

            <Link :href="route('pictures.show', picture.id)">
                <div class="group relative rounded-lg overflow-hidden">
                    <img :src="picture.picture_url" :alt="picture.title" class="w-full " />
                    <!--inserta variables-->
                    <div class=" absolute inset-0 bg-black/50 hidden group-hover:block">
                        <div class="text-sm flex justify-between">
                            <p class="w-fit m-1 p-1 rounded-lg hover:bg-black/75  text-white font-bold mt-2 transition">
                                {{
                                    picture.user.username }}
                                &#709</p>
                            <p
                                class="w-fit m-1 p-1 rounded-lg bg-color-accent hover:brightness-75 text-white font-bold mt-2 transition">
                                Guardar
                            </p>
                        </div>
                    </div>

                </div>
            </Link>



        </div>
    </div>



</template>