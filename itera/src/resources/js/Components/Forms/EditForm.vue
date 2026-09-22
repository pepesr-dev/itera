<script setup>
import { useForm } from '@inertiajs/vue3';
const props = defineProps({
    picture: Object
});
//Recoge los datos del formulario
const form = useForm({
    title: props.picture.title,
    picture_url: props.picture.picture_url,
    description: props.picture.description,
});

const submit = () => {
    // Le pasamos el ID a la ruta para que Laravel sepa cuál actualizar
    form.put(route('pictures.update', props.picture.id));
};

</script>
<template>
    <form @submit.prevent="submit">
        <label> URL de la imagen
            <input type="text" v-model="form.picture_url">
        </label>
        <label> Título
            <input type="text" v-model="form.title">
        </label>
        <label> Descripción
            <input type="text" v-model="form.description">
        </label>
        <button type="submit" :disabled="form.processing">
            {{ form.processing ? 'Creando...' : 'Crear Pin' }}
        </button>
    </form>
</template>