<script setup>

//Importa las acciones mínima de inertial
//el componente title y la navegación sin recarga
//Link
import { Head, Link } from '@inertiajs/vue3';

//Maneja errores de carga en los componentes
function handleImageError() {
}
</script>

<template>

    <Head title="Itera"></Head>



    <Link :href="route('login')">Inicia sesión</Link>
    <br>
    <Link :href="route('register')">Regístrate</Link>


</template>