<script setup>
import IteraLayout from '@/Layouts/IteraLayout.vue';
import { Head } from '@inertiajs/vue3';
import Masonry from '@/Components/Masonry.vue'; // Importamos el Masonry

defineProps({
    //Array recibido de la función index del controlador
    pictures: Array
});
</script>

<template>

    <Head title="Home" />

    <IteraLayout>
        <!--Recibe datos del props-->
        <Masonry :pictures="pictures" />
    </IteraLayout>
</template>