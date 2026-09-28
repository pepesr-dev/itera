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

    <Head title="Itera" />
    <IteraLayout>
        <EditForm v-if="SHOW_EDIT_FORM" @close="SHOW_EDIT_FORM = false" :pictureToEdit="SELECTED_PICTURE" />

        <Link class="z-10 absolute p-1 m-1 bg-color-primary hover:bg-color-tertiary rounded" :href="route('home')">
            <img :src="ArrowBack" alt="Volver">
        </Link>


        <div
            class=" mb-2 flex flex-col md:flex-row  md:justify-around  items-center md:items-start relative w-full border border-black rounded-lg overflow-hidden">
            <div class="w-full md:w-1/2 flex justify-center bg-color-active">

                <img class="w-full max-w-[300px] h-auto object-contain" :src="picture.picture_url" :alt="picture.title">

            </div>
            <div class=" flex flex-col md:justify-start md:items-start p-2 w-full md:w-1/2 ">
                <div class="flex gap-2">
                    <p>fav</p>
                    <p>guardar</p>
                </div>
                <div>
                    <p>@{{ picture.user.username }}</p>
                    <p>{{ picture.title }}</p>
                    <p>{{ picture.description }}</p>
                </div>

            </div>
        </div>

        <Masonry :pictures="pictures" @picture-to-edit="openEditForm" class="relative" />
    </IteraLayout>
</template>