<script setup>
import { ref, watch } from 'vue';
import { router } from '@inertiajs/vue3';

//Recibe los datos de la imagen a editar desde el padre
const props = defineProps({
    pictureToEdit: Object
});


// Variables reactivas para los inputs
const URL = ref('');
const TITLE = ref('');
const DESCRIPTION = ref('');


//Actualiza los datos del formulario si selecciono otra imagen
watch(() => props.pictureToEdit, (newPicture) => {
    if (newPicture) {
        URL.value = newPicture.picture_url || '';
        TITLE.value = newPicture.title || '';
        DESCRIPTION.value = newPicture.description || '';
    }
}, { immediate: true });

//Actualiza los datos de la imagen
const submitEdit = () => {
    //Petición put a la ruta update(id)
    router.put(route('pictures.update', props.pictureToEdit.id), {
        picture_url: URL.value,
        title: TITLE.value,
        description: DESCRIPTION.value,
    });
};
//Elimina la imagen seleccionada
const submitDelete = () => {

    router.delete(route('pictures.destroy', props.pictureToEdit.id), {

    });

};

</script>

<template>
    <div class=" p-1 bg-color-active">
        <form @submit.prevent="submitEdit">

            <label> Título:
                <input type="text" v-model="TITLE">
            </label>
            <label> Descripción:
                <input type="text" v-model="DESCRIPTION">
            </label>
            <label> Link
                <input type="text" v-model="URL">
            </label>
            <button type="submit">
                Actualizar
            </button>
            <button type="button" @click="submitDelete">
                Eliminar
            </button>
        </form>
    </div>

</template>