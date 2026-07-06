<!--Carga la -->
<script setup>
//Importa la cabecera principal de la app
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

//Importa el title y las rutas
import { Head, Link } from '@inertiajs/vue3';

//Constante que recibe el array de imágenes
defineProps({ pictures: Array });



</script>

<template>
    <!--Cambia el título de la pestaña-->

    <Head title="Itera" />

    <!--Lienzo para usuarios autentificados-->
    <AuthenticatedLayout>
        <!--Título de la página-->
        <!--Pone lo indicado en #-->
        <template #header>
            <h2>Itera</h2>

        </template>
        <!--Enlace a la ruta añadir imágenes-->
        <div>
            <Link :href="route('pictures.create')">
                Añadir imagen
            </Link>
        </div>

        <!--Si no hay imágenes muestra un mensaje-->
        <div v-if="pictures.length === 0">
            <p>No tienes imágenes</p>
        </div>

        <!--Recorrerá cada imagen por su id correspondiente  -->
        <div v-for="picture in pictures" :key="picture.id">

            <img :src="picture.picture_url" :alt="picture.title" />
            <!--inserta variables-->
            <h3>{{ picture.title }}</h3>
            <p>{{ picture.description }}</p>

            <!--
            Enlace a las rutas mostrar y editar la imagen
            correspondiente a su id
            -->
            <Link :href="route('pictures.show', picture.id)">Ver</Link>
            <Link :href="route('pictures.edit', picture.id)">Editar</Link>

        </div>
    </AuthenticatedLayout>


</template>