<script setup>
import CreateForm from '@/Components/Forms/CreateForm.vue';
import IteraLayout from '@/Layouts/IteraLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>

    <Head title="Crear Pin" />

    <IteraLayout>
        <!-- Contenedor flex vertical que ocupa todo el alto disponible -->
        <div class="flex flex-col h-full min-h-[calc(100vh-4rem)]">

            <div class="w-full p-2 border-b-4 border-black shrink-0">
                <h1 class="text-xl font-bold">Crear Pin</h1>
            </div>

            <!-- <main> se estira (flex-1) y obliga al formulario a expandirse -->
            <main class="flex-1 flex flex-col p-4">
                <CreateForm class="flex-1" />
            </main>

        </div>
    </IteraLayout>
</template>
