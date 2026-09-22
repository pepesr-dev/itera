<script setup>
import CreateForm from '@/Components/Forms/CreateForm.vue';
import IteraLayout from '@/Layouts/IteraLayout.vue';
import { Head } from '@inertiajs/vue3';


</script>

<template>

    <Head title="Crear Pin" />
    <IteraLayout>
        <div>
            <h1>Crear Pin</h1>
        </div>
        <main>
            <h1>Aquí pondré el formulario para crear un pin</h1>
            <CreateForm></CreateForm>
        </main>
    </IteraLayout>
</template>