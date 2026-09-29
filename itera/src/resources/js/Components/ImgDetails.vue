<script setup>
import IteraLayout from '@/Layouts/IteraLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import Masonry from '@/Components/Masonry.vue';
import ArrowBack from '@/Components/Icons/arrowBack.svg'
import { ref } from 'vue';
import EditForm from '@/Components/Forms/EditForm.vue';

defineProps({
    //Retorna array por defecto
    pictures: {
        type: Array,
        default: () => []
    },
    picture: Object,
});


//Obtiene la imagen que se va a editar
const SELECTED_PICTURE = ref(null);
//Formulario cerrado por defecto
const SHOW_EDIT_FORM = ref(false);


//Se ejecuta cuando el hijo emite el evento
const openEditForm = (picture) => {
    //Almacena los datos del picture recibidos
    //id, title, description...
    SELECTED_PICTURE.value = picture;
    SHOW_EDIT_FORM.value = true;
};

</script>



<template>
    <Link class="z-10 absolute p-1 m-1 bg-color-primary hover:bg-color-tertiary rounded" :href="route('home')">
        <img :src="ArrowBack" alt="Volver">
    </Link>
    <div
        class="mb-2 flex flex-col md:flex-row items-center md:items-start relative w-full max-w-4xl mx-auto border border-black rounded-lg overflow-hidden">
        <!-- Lado de la imagen -->
        <div class=" bg-color-tertiary w-full md:w-2/3 flex justify-center p-2">
            <img class="w-full max-w-[400px]  object-contain" :src="picture?.picture_url" :alt="picture?.title">
        </div>

        <!-- Lado del texto -->
        <div class="flex flex-col p-3 w-full md:w-1/3 text-sm">
            <div class="flex gap-2">
                <p>fav</p>
                <p>guardar</p>
            </div>
            <div>
                <p>@{{ picture?.user?.username }}</p>
                <p class="font-bold">{{ picture?.title }}</p>
                <p class="text-xs">{{ picture?.description }}</p>
            </div>
        </div>
    </div>
</template>