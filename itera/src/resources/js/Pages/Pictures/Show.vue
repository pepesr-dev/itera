<script setup>
import IteraLayout from '@/Layouts/IteraLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import Masonry from '@/Components/Masonry.vue';
defineProps({
    //Retorna array por defecto
    pictures: {
        type: Array,
        default: () => []
    },
    picture: Object,
});


</script>

<template>

    <Head title="Itera" />
    <IteraLayout>
        <!--
        Muestra el contenido de pictures
        -->
        <!--<pre>{{ pictures }}</pre>-->

        <div class=" bg-color-primary p-2">
            <Link :href="route('home')">
                atras
            </Link>
            <img :src="picture.picture_url" :alt="picture.title">
            <div>

                <p>{{ picture.user.username }}</p>
                <p>{{ picture.title }}</p>
            </div>
        </div>

        <Masonry :pictures="pictures" />
    </IteraLayout>
</template>