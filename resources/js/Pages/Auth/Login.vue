<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

defineProps({
    canResetPassword: Boolean,
    status: String,
    captcha: String
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
    captcha: '',
});

const submit = () => {
    form.transform(data => ({
        ...data,
        remember: form.remember ? 'on' : '',
    })).post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <Head title="Log in" />

    <AuthenticationCard>
        <template #logo>
            <AuthenticationCardLogo />
        </template>

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="email" value="电子邮件" />
                <TextInput id="email" v-model="form.email" type="email"
                    class="mt-1 block w-full" required autofocus autocomplete="username" />
                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mt-4">
                <InputLabel for="password" value="密码" />
                <TextInput id="password" v-model="form.password" type="password" class="mt-1 block w-full" required
                    autocomplete="current-password" />
                <InputError class="mt-2" :message="form.errors.password" />
            </div>
            <div class="mt-4" v-if="captcha">
                <div class="captcha-container">
                    <div class="captcha-img-container" v-html="captcha"></div>
                    <TextInput id="text" v-model="form.captcha" type="text" class="mt-1 " autocomplete="current-password" />
                </div>
                <InputError class="mt-2" :message="form.errors.captcha" />
            </div>

            <div class="block mt-4">
                <label class="flex items-center">
                    <Checkbox v-model:checked="form.remember" name="remember" />
                    <span class="ms-2 text-sm text-gray-600">记住账号</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link v-if="canResetPassword" :href="route('password.request')"
                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                忘记密码了吗？
                </Link>

                <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    登录
                </PrimaryButton>
            </div>
        </form>
    </AuthenticationCard>
</template>

<script>
import i18n from './../../i18n';

export default {
    created() {
        if (this.$page.props.user.locale !== window.currentLocale) {
            // location.reload();
        }
    },
}

</script>


<style scoped>
.captcha-container {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    position: relative;
}

.captcha-img-container {
    /* height: 2.5rem !important; */
    position: relative;
}

.captcha-img-container img {
    height: 100%;
    border-radius: 5.1px;
}

.captcha-container input {
    width: 10rem;
    margin-bottom: 2px;
    height: 37px;
}
</style>
