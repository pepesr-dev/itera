<script setup>
import PicturesMasonry from './Masonry.vue';
import IteraLayout from '@/Layouts/IteraLayout.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
    pictures: Array
});
</script>

<template>

    <Head title="Home" />
    <IteraLayout>


        <PicturesMasonry :pictures="pictures" />


    </IteraLayout>


</template>