<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    pictures: Array,
});



</script>

<template>
<Head title="my pictures"/>
<AuthenticatedLayout>
    <template #header>
        <h2>my pictures</h2>

    </template>

    <div>
        <Link :href="route('pictures.create')">
            Añadir imagen
        </Link>
    </div>
    <div v-if="pictures.length === 0">
        <p>No tienes imágenes</p>
    </div>
    <div v-for="picture in pictures" :key="picture.id">
        <img :src="picture.picture_url" :alt="picture.title"/>
        <h3>{{ picture.title }}</h3>

        <p>{{ picture.description }}</p>
        <Link :href="route('pictures.show', picture.id)">Ver</Link>
        <Link :href="route('pictures.edit', picture.id)">Editar</Link>

    </div>
</AuthenticatedLayout>

    
</template>