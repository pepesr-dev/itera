<script setup>

import { Link } from '@inertiajs/vue3';

import EditIcon from '@/Components/Icons/edit-black.svg';

//Declara que el props del mason contiene un objeto picture
const PROPS = defineProps({
    picture: Object
});

//Declara el emit
const EMIT = defineEmits(['picture-to-edit']);

//Captura el click y envía el objeto picture
const emitSelectedPicture = (event) => {
    event.preventDefault();
    //Emit picture-to-edit emite un picture al padre (masonry))
    EMIT('picture-to-edit', PROPS.picture);
};


</script>

<template>

    <div class="break-inside-avoid mb-4">

        <Link :href="route('pictures.show', picture.id)">

            <div class="group relative rounded-lg overflow-hidden">

                <img :src="picture.picture_url" :alt="picture.title" class="w-full" />

                <div class="absolute inset-0  bg-black/50 hidden group-hover:block">

                    <div class="text-xs flex justify-between p-2">

                        <p class="p-1 w-fit rounded hover:bg-black/75 text-white font-bold transition">
                            {{ picture.user?.username }} &#709;
                        </p>

                        <p
                            class="p-1 w-fit rounded bg-color-accent hover:brightness-75 text-white font-bold transition">
                            Guardar
                        </p>
                    </div>


                    <img @click="emitSelectedPicture" class="p-1 w-8 rounded bg-color-tertiary" :src="EditIcon"
                        alt="editar Pin">

                </div>
            </div>

        </Link>
    </div>

</template>
