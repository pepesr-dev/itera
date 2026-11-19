<script setup>

import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
});

</script>



<template>

    <Head title="Itera | Buscador visual" />


    <div class="flex flex-col items-center justify-center text-center h-screen w-full">

        <figure class="flex flex-col items-center justify-center">
            <img class="w-80 mx-auto" src="/logo/iteraLogo.svg" alt="logo de itera">
            <figcaption class="p-2">
                <h1>Buscador visual y red social</h1>
                <p>Replica la lógica y el diseño de Pinterest.</p>
            </figcaption>
        </figure>



        <!-- Botones de Login -->
        <nav class="p-2">
            <div v-if="canLogin">
                <!--Usuario ya logeado-->
                <Link v-if="$page.props.auth.user" :href="route('home')" class=" btn--action">
                    Ver galería
                </Link>

                <!--Usuario sin logear-->
                <template v-else>
                    <div class="flex gap-2 items-center">
                        <Link :href="route('login')" class=" btn--action">Iniciar Sesión</Link>
                        <Link v-if="canRegister" :href="route('register')" class="underline hover:no-underline">
                            Registrarse</Link>
                    </div>
                </template>
            </div>
        </nav>

    </div>

</template>