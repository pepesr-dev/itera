<script setup>
import IteraLayout from '@/Layouts/IteraLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import Masonry from '@/Components/Masonry.vue';
import ArrowBack from '@/Components/Icons/arrowBack.svg'
import { ref } from 'vue';
import EditForm from '@/Components/Forms/EditForm.vue';
import ImgDetails from '@/Components/ImgDetails.vue';
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



        <ImgDetails :picture="picture"></ImgDetails>




        <Masonry :pictures="pictures" @picture-to-edit="openEditForm" class="relative" />

    </IteraLayout>
</template>