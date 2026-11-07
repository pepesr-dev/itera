<script setup>

import { Link, router } from '@inertiajs/vue3';
//Hook para acceder a la información de la 
//página actual
import { usePage } from '@inertiajs/vue3';
import { ref } from 'vue';

import searchIcon from "@/Components/Icons/lupa-black.png";

//Obtener datos de usuario
const page = usePage();
//Almacena los datos del usuario autentificado
const user = page.props.auth.user;
const isOpen = ref(false);

function toggleMenu() {
    isOpen.value = !isOpen.value;
}

function logout() {
    router.post(route('logout'))
}


</script>
<template>

    <!-- Nav superior -->
    <nav class="h-16 gap-2  border-b flex items-center p-2 fixed top-0 left-16 right-0 z-10 bg-color-primary  ">
        <!--Buscador-->
        <div
            class="hover:cursor-pointer flex w-full p-2 gap-2 bg-color-tertiary rounded-md items-center transition-all duration-200 focus-within:ring-2 focus-within:ring-color-active focus-within:border-color-active">
            <img class="w-6 h-6 " :src="searchIcon" alt="search">
            <input class="w-full border-none rounded-md bg-color-tertiary" type="text" placeholder="Search">
        </div>
        <!--Perfil-->
        <div class="relative flex  items-center">
            <img class="cursor-pointer  hover:bg-color-tertiary w-12 rounded-full" src="../../../public/logo/sr-v3.png"
                alt="PepeSR icon">
            <p class="cursor-pointer p-0.5 m-1 hover:bg-color-tertiary rounded-md" @click="toggleMenu">&#9660;</p>
        </div>
        <!--Menú desplegable-->
        <div v-if="isOpen" class=" flex flex-col absolute bg-color-primary p-2 rounded-md top-16 right-2">

            <!--<span>{{ user.name }}</span>-->
            <Link :href="route('profile.edit')"> Perfil </Link>
            <button @click="logout">Cerrar sesión</button>
        </div>

    </nav>

</template>