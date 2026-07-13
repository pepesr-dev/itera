<script setup>
import IteraLayout from '@/Layouts/IteraLayout.vue';
import { Head } from '@inertiajs/vue3';


defineProps({
    picture: Object,
});
</script>

<template>

    <Head title="Itera" />
    <IteraLayout>

        <div>
            <img :src="picture.picture_url" :alt="picture.title">
            <div>
                <button>Guardar</button>
                <p>{{ picture.user.username }}</p>

            </div>
        </div>
    </IteraLayout>
</template>