<!--Datos para el registro-->
<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';


const form = useForm({
    name: '',
    username: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <GuestLayout>

        <Head title="Regístrate" />

        <!--Formulario de registro-->
        <form @submit.prevent="submit">
            <div>
                <InputLabel for="name" value="Name" />

                <TextInput id="name" type="text" v-model="form.name" required autofocus autocomplete="name" />

                <InputError :message="form.errors.name" />
            </div>

            <!--USERNAME-->
            <div>
                <InputLabel for="username" value="username" />

                <TextInput id="username" type="text" v-model="form.username" required autofocus
                    autocomplete="username" />

                <InputError :message="form.errors.username" />
            </div>



            <div>
                <InputLabel for="email" value="Email" />

                <TextInput id="email" type="email" v-model="form.email" required autocomplete="username" />

                <InputError :message="form.errors.email" />
            </div>

            <div>
                <InputLabel for="password" value="Password" />

                <TextInput id="password" type="password" v-model="form.password" required autocomplete="new-password" />

                <InputError :message="form.errors.password" />
            </div>

            <div>
                <InputLabel for="password_confirmation" value="Confirm Password" />

                <TextInput id="password_confirmation" type="password" v-model="form.password_confirmation" required
                    autocomplete="new-password" />

                <InputError :message="form.errors.password_confirmation" />
            </div>

            <div>
                <Link :href="route('login')">
                    ¿Estás registrado?
                </Link>

                <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Registrarse
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template>
