<script setup>
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
            <form>
                <div>
                    <p>Arrastra una imagen aquí</p>
                </div>
                <div>
                    <p>Guardar por URL</p>
                </div>
                <div>
                    <p>title</p>
                    <p>Dile a todo el mundo que es tu pin</p>
                </div>
                <div>
                    <p>Descripción</p>
                    <p>Describe tu pin</p>
                </div>
                <div>
                    <p>Tags</p>
                    <p>Busca una etiqueta adecuada.</p>
                </div>

            </form>

        </main>
    </IteraLayout>
</template>