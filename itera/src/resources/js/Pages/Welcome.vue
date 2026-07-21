<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
});
</script>

<template>

    <Head title="Bienvenido" />
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 sm:items-center py-4 sm:pt-0">

        <!-- Botones de Login / Registro arriba a la derecha -->
        <div v-if="canLogin" class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            <Link v-if="$page.props.auth.user" :href="route('home')" class="text-sm text-gray-700 underline">
                Entrar al Home
            </Link>

            <template v-else>
                <Link :href="route('login')" class="text-sm text-gray-700 underline">
                    Iniciar Sesión
                </Link>

                <Link v-if="canRegister" :href="route('register')" class="ml-4 text-sm text-gray-700 underline">
                    Registrarse
                </Link>
            </template>
        </div>

        <!-- Contenido Central -->
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 text-center">
            <h1 class="text-5xl font-extrabold text-gray-900 tracking-tight mb-4">
                Itera
            </h1>
            <p class="text-lg text-gray-600">
                Clone de pinterest.
            </p>
        </div>
    </div>
</template>