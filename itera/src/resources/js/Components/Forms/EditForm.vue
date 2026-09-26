<script setup>
import { ref, watch, onMounted, onUnmounted } from 'vue';
import { router } from '@inertiajs/vue3';
import closeIcon from '@/Components/Icons/close.svg'
//Recibe los datos de la imagen a editar desde el padre
const props = defineProps({
    pictureToEdit: Object
});


// Variables reactivas para los inputs
const URL = ref('');
const TITLE = ref('');
const DESCRIPTION = ref('');
//Declara la emisión del evento cerrar
const emit = defineEmits(['close'])


//Actualiza los datos del formulario si selecciono otra imagen
watch(() => props.pictureToEdit, (newPicture) => {
    if (newPicture) {
        URL.value = newPicture.picture_url || '';
        TITLE.value = newPicture.title || '';
        DESCRIPTION.value = newPicture.description || '';
    }
}, { immediate: true });

//Actualiza los datos de la imagen
const submitEdit = () => {
    //Petición put a la ruta update(id)
    router.put(route('pictures.update', props.pictureToEdit.id), {
        picture_url: URL.value,
        title: TITLE.value,
        description: DESCRIPTION.value,
    });
};
//Elimina la imagen seleccionada
const submitDelete = () => {

    router.delete(route('pictures.destroy', props.pictureToEdit.id));

};

//Bloquea el scroll
onMounted(() => {
    document.body.classList.add('overflow-hidden')
});

//Desbloquea el scroll
onUnmounted(() => {
    document.body.classList.remove('overflow-hidden')
});
</script>

<template>
    <!--capa oscura/desenfocada-->
    <div @click="emit('close')" class="fixed inset-0 bg-black/50 z-40 backdrop-blur-sm"></div>

    <!-- Panel Lateral -->
    <div class="top-0 right-0 h-full fixed p-6 bg-color-primary w-[600px] z-50 flex flex-col">
        <!-- Cabecera -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-xl font-bold">Edit Pin</h1>
            <img @click="emit('close')" :src="closeIcon" alt="Cerrar"
                class="cursor-pointer hover:bg-color-tertiary rounded">
        </div>

        <!-- Formulario (Ahora es un contenedor flex que ocupa todo el alto restante) -->
        <form @submit.prevent="submitEdit" class="flex-1 flex flex-col justify-between">

            <!-- Contenedor de Inputs (Superior) -->
            <div class="space-y-4">
                <div class="p-2">
                    <label class="font-medium"> Título <br>
                        <input class="w-full mt-1 border p-2 rounded" type="text" v-model="TITLE">
                    </label>
                </div>

                <div class="p-2">
                    <label class="font-medium"> Descripción <br>
                        <input class="w-full mt-1 border p-2 rounded" type="text" v-model="DESCRIPTION">
                    </label>
                </div>

                <div class="p-2">
                    <label class="font-medium"> Link <br>
                        <input class="w-full mt-1 border p-2 rounded" type="text" v-model="URL">
                    </label>
                </div>
            </div>

            <!-- Contenedor de Botones (Empujado abajo del todo gracias al flex del formulario) -->
            <div class="flex justify-end pt-4 border-t mt-auto">
                <button class=" hover:brightness-90 font-bold m-1 p-2 rounded bg-color-tertiary" type="button"
                    @click="submitDelete">
                    Eliminar
                </button>
                <button class=" hover:brightness-90 text-white font-bold m-1 p-2 rounded bg-color-accent" type="submit">
                    Guardar
                </button>
            </div>
        </form>
    </div>
</template>