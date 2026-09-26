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
    <form @submit.prevent="submit" class="flex flex-col h-full justify-between overflow-y-auto">

        <div class="w-full flex-1 space-y-4 pr-1">
            <div>
                <label class="block font-medium"> Título<br>
                    <input class="w-full border p-2 rounded" type="text" v-model="form.title">
                </label>
            </div>
            <div>
                <label class="block font-medium"> Descripción<br>
                    <input class="w-full border p-2 rounded" type="text" v-model="form.description">
                </label>
            </div>
            <div>
                <label class="block font-medium"> Link<br>
                    <input class="w-full border p-2 rounded" type="text" v-model="form.picture_url">
                </label>
            </div>
        </div>

        <div class="flex justify-end pt-4 mt-auto shrink-0 pb-2">
            <button class="hover:brightness-90 p-2 bg-color-accent rounded font-bold text-white transition-all"
                type="submit" :disabled="form.processing">
                {{ form.processing ? 'Creando...' : 'Crear Pin' }}
            </button>
        </div>
    </form>
</template>
