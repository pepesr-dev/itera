<script setup>
/**
 * Pin
 * Tarjeta estilizada que muestra una imagen y
 * diferentes elementos interactivos.
 * Además enlaza con la función show()
 * 
 */
import { inject } from 'vue';
import { Link } from '@inertiajs/vue3';

import EditIcon from '@/Components/Icons/edit-black.svg';

defineProps({
    // Recibe solo una imagen
    picture: Object
});

const openEditPanel = inject('openEditPanel');
</script>

<template>
    <!--
    Si la tarjeta no cabe al final, la pone al priincipio de
    la siguiente línea.
    -->
    <div class="break-inside-avoid mb-4">
        <!--
        Enlaza con la función del controlador show(), que
        recibe el objeto por id.
        -->
        <Link :href="route('pictures.show', picture.id)">
            <!--
            Activa un cambio visual.
            Posiciona dentro de los límites de la tarjeta.
            Redondéa los bordes
            Oculta los bordes que sobresalen del contenedor redondeado.
            -->
            <div class="group relative rounded-lg overflow-hidden">
                <!--
                Carga los datos de la imagen.
                Ocupa todo el ancho.
                -->
                <img :src="picture.picture_url" :alt="picture.title" class="w-full" />
                <!--
                Posición absoluta
                Oculto por defecto
                Al hacer hover habrá un fondo oscuro 
                group-hover:block (se hace visible)
                -->
                <div class="absolute inset-0  bg-black/50 hidden group-hover:block">
                    <!--
                    Texto muy pequeño
                    Posición horizontal con espació etre elementos
                    Padding-2
                    -->
                    <div class="text-xs flex justify-between p-2">
                        <!--
                        Ancho adaptado al contenido
                        Obtiene el nombre de usuario del propietario
                        de la imagen
                        -->
                        <p class="p-1 w-fit rounded hover:bg-black/75 text-white font-bold transition">
                            {{ picture.user?.username }} &#709;
                        </p>

                        <p
                            class="p-1 w-fit rounded bg-color-accent hover:brightness-75 text-white font-bold transition">
                            Guardar
                        </p>
                    </div>



                    <button @click.stop.prevent="openEditPanel(picture)">
                        <img class="p-1 bg-color-primary" :src="EditIcon" alt="editar Pin">
                    </button>
                </div>
            </div>

        </Link>
    </div>

</template>