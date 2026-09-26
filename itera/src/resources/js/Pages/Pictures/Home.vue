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

    <Head title="Home" />

    <IteraLayout>
        <!--Pasa la foto seleccionada al formulario-->
        <EditForm v-if="SHOW_EDIT_FORM" @close="SHOW_EDIT_FORM = false" :pictureToEdit="SELECTED_PICTURE" />
        <!--Si detecta un picture-to-edit ejecuta openEditForm-->
        <Masonry :pictures="pictures" @picture-to-edit="openEditForm" class="relative" />


    </IteraLayout>
</template>