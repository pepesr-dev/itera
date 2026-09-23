<script setup>
import IteraLayout from '@/Layouts/IteraLayout.vue';
import { Head } from '@inertiajs/vue3';
import Masonry from '@/Components/Masonry.vue';
import EditForm from '@/Components/Forms/EditForm.vue';

import { ref } from 'vue';
defineProps({
    //Array recibido de la función index del controlador
    pictures: Array
});

//Obtiene la imagen que se va a editar
const SELECTED_PICTURE = ref(null);

//Se ejecuta cuando el hijo emite el evento
const openEditForm = (picture) => {
    //Almacena los datos del picture recibidos
    //id, title, description...
    SELECTED_PICTURE.value = picture;
};
</script>

<template>

    <Head title="Home" />

    <IteraLayout>
        <!--Pasa la foto seleccionada al formulario-->
        <EditForm :pictureToEdit="SELECTED_PICTURE" />
        <!--Si detecta un picture-to-edit ejecuta openEditForm-->
        <Masonry :pictures="pictures" @picture-to-edit="openEditForm" />


    </IteraLayout>
</template>