<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <!--Lienzo para usuarios sin autentificar-->
    <GuestLayout>

        <Head title="Inicia sesión" />

        <!--
        Muestra un mensaje de estado
        "Te hemos enviado un email"
        -->
        <div v-if="status">{{ status }}</div>

        <!--Formulario de autentificación-->
        <form @submit.prevent="submit" class="flex flex-col gap-2">
            <!--Email-->
            <div>
                <InputLabel for="email" value="Email" />

                <TextInput id="email" type="email" v-model="form.email" required autofocus autocomplete="username" />

                <InputError :message="form.errors.email" />
            </div>
            <!--Contraseña-->
            <div>
                <InputLabel for="password" value="Password" />

                <TextInput id="password" type="password" v-model="form.password" required
                    autocomplete="current-password" />

                <InputError :message="form.errors.password" />
            </div>

            <!--[X] Recuerdame-->
            <div>
                <label class="flex items-center cursor-pointer">
                    <input type="checkbox" name="remember" v-model="form.remember"
                        style="border: 2px solid #000 !important;"
                        class="rounded bg-white text-indigo-600 shadow-sm focus:ring-indigo-500 h-4 w-4" />
                    <span class="ml-2 text-sm text-gray-700">Recuérdame</span>
                </label>
            </div>
            <div>
                <!--Recuperar la contraseña-->
                <Link v-if="canResetPassword" :href="route('password.request')">
                    ¿Olvidaste tu contraseña?
                </Link>
                <br>
                <!--Iniciar sesión-->
                <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Inicia sesión
                </PrimaryButton>
            </div>
            <!--Registrarse-->
            <div class="mt-4 text-center">
                <span class="text-sm">¿No tienes una cuenta? </span>
                <Link :href="route('register')" class="text-sm font-semibold underline hover:no-underline">
                    Regístrate
                </Link>
            </div>
        </form>
    </GuestLayout>
</template>
