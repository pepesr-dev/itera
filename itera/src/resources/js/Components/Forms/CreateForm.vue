<script setup>
import { useForm } from '@inertiajs/vue3';

//Recoge los datos del formulario
const form = useForm({
    picture_url: '',
    title: '',
    description: ''
});

//Envía los datos al controlador
const submit = () => {
    form.post(route('pictures.store'), {
        onSuccess: () => {
            // Limpia el formulario si todo sale bien
            form.reset();
        }
    });
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