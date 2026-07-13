<script setup>

import { Link, router } from '@inertiajs/vue3';
//Hook para acceder a la información de la 
//página actual
import { usePage } from '@inertiajs/vue3';



//Iconos
import { HomeIcon, UserIcon, Cog8ToothIcon, PlusIcon, Squares2X2Icon } from '@heroicons/vue/24/outline';

//Centralizar estilos
const buttonClass = "block p-2 rounded hover:text-gray-900 hover:bg-color-tertiary cursor-pointer transition-colors";

//Centraliza la lógica de navegación en bucle
const navItems = [
    { name: 'Inicio', icon: HomeIcon, route: 'home' },
    { name: 'Añadir', icon: PlusIcon, route: 'pictures.create' }, // Cambiar null por la ruta si existe
    { name: 'Dashboard', icon: Squares2X2Icon, route: null },
];


//Obtener datos de usuario
const page = usePage();
//Almacena los datos del usuario autentificado
const user = page.props.auth.user;


function logout() {
    router.post(route('logout'))
}
</script>

<template>
    <div class="min-h-screen flex flex-col">

        <!-- Nav superior -->
        < <nav class="h-16 bg-white border-b flex items-center px-4 fixed top-0 left-16 right-0 z-10">
            <div>

                <span>{{ user.name }}</span>
                <Link :href="route('profile.edit')"> Perfil </Link>
                <button @click="logout">Cerrar sesión</button>
            </div>
            </nav>
            -
            <!--+++++++++++++++-->









            <div class="flex flex-1 pt-16">

                <aside
                    class="fixed top-0 left-0 h-screen w-16 bg-white border-r pt-4 px-4 flex flex-col items-center justify-between">

                    <!-- Bloque Superior: Logo + Navegación Principal -->
                    <div class="flex flex-col items-center gap-y-6 w-full">
                        <!-- Logotipo -->
                        <Link :href="route('home')" class="mb-2">
                            <span class="font-bold text-xl block">
                                <img src="../../../public/logo/iteraLogo-2.svg" alt="Logo" class="w-full">
                            </span>
                        </Link>

                        <!-- CONTENEDOR DE ICONOS CON V-FOR -->
                        <nav class="flex flex-col gap-y-4 w-full items-center">
                            <template v-for="item in navItems" :key="item.name">
                                <!-- Si tiene ruta usa Link -->
                                <Link v-if="item.route" :href="route(item.route)" :class="buttonClass"
                                    :title="item.name">
                                    <component :is="item.icon" class="w-6 h-6" />
                                </Link>
                                <!-- Si no tiene ruta (acción/click) usa un botón o span -->
                                <button v-else :class="buttonClass" :title="item.name">
                                    <component :is="item.icon" class="w-6 h-6" />
                                </button>
                            </template>
                        </nav>
                    </div>

                    <!-- Bloque Inferior: Configuración -->
                    <div class="w-full flex justify-center mb-4">
                        <button :class="buttonClass" title="Configuración">
                            <Cog8ToothIcon class="w-6 h-6" />
                        </button>
                    </div>

                </aside>

                <main class="ml-16 pt-0 flex-1 p-4">
                    <slot />
                </main>

            </div>
    </div>
</template>