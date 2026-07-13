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
        <form @submit.prevent="submit">
            <div>
                <InputLabel for="email" value="Email" />

                <TextInput id="email" type="email" v-model="form.email" required autofocus autocomplete="username" />

                <InputError :message="form.errors.email" />
            </div>

            <div>
                <InputLabel for="password" value="Password" />

                <TextInput id="password" type="password" v-model="form.password" required
                    autocomplete="current-password" />

                <InputError :message="form.errors.password" />
            </div>

            <div>
                <label>
                    <Checkbox name="remember" v-model:checked="form.remember" />
                    <span> Recuerdame</span>
                </label>
            </div>

            <div>
                <Link v-if="canResetPassword" :href="route('password.request')">
                    ¿Olvidaste tu contraseña?
                </Link>

                <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Inicia sesión
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template>
