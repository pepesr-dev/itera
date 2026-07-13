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
    <header>
        <nav>

            <Link :href="route('login')">Iniciar sesión</Link>
            <Link :href="route('register')">Registro</Link>

        </nav>
    </header>
</template>