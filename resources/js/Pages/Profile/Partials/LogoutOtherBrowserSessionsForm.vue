<script setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';
import ActionMessage from '@/Components/ActionMessage.vue';
import ActionSection from '@/Components/ActionSection.vue';
import DialogModal from '@/Components/DialogModal.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

defineProps({
    sessions: Array,
});

const confirmingLogout = ref(false);
const passwordInput = ref(null);

const form = useForm({
    password: '',
});

const confirmLogout = () => {
    confirmingLogout.value = true;

    setTimeout(() => passwordInput.value.focus(), 250);
};

const logoutOtherBrowserSessions = () => {
    form.delete(route('other-browser-sessions.destroy'), {
        preserveScroll: true,
        onSuccess: () => closeModal(),
        onError: () => passwordInput.value.focus(),
        onFinish: () => form.reset(),
    });
};

const closeModal = () => {
    confirmingLogout.value = false;

    form.reset();
};
</script>

<template>
    <ActionSection>
        <template #title>
            {{ $t('browser_sessions') }}
        </template>

        <template #description>
            {{ $t('manage_and_logout_active_sessions_on_other_browsers_and_devices') }}
        </template>

        <template #content>
            <div class="max-w-xl text-sm text-gray-600">
                {{ $t('if_necessary_logout_other_browser_sessions') }}
            </div>

            <!-- Other Browser Sessions -->
            <div v-if="sessions.length > 0" class="mt-5 space-y-6">
                <div v-for="(session, i) in sessions" :key="i" class="flex items-center">
                    <div>
                        <svg v-if="session.agent.is_desktop" class="w-8 h-8 text-gray-500"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor">
                            <!-- ... -->
                        </svg>

                        <svg v-else class="w-8 h-8 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <!-- ... -->
                        </svg>
                    </div>

                    <div class="ms-3">
                        <div class="text-sm text-gray-600">
                            {{ session.agent.platform ? session.agent.platform : $t('unknown') }} - {{ session.agent.browser
                                ? session.agent.browser : $t('unknown') }}
                        </div>

                        <div>
                            <div class="text-xs text-gray-500">
                                {{ session.ip_address }},

                                <span v-if="session.is_current_device" class="text-green-500 font-semibold">{{
                                    $t('this_device') }}</span>
                                <span v-else>{{ $t('last_active') }} {{ session.last_active }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex items-center mt-5">
                <PrimaryButton @click="confirmLogout">
                    {{ $t('log_out_other_browser_sessions') }}
                </PrimaryButton>

                <ActionMessage :on="form.recentlySuccessful" class="ms-3">
                    {{ $t('done') }}.
                </ActionMessage>
            </div>

            <!-- Log Out Other Devices Confirmation Modal -->
            <DialogModal :show="confirmingLogout" @close="closeModal">
                <template #title>
                    {{ $t('log_out_other_browser_sessions') }}
                </template>

                <template #content>
                    {{ $t('please_enter_password_to_confirm_logout_other_browser_sessions') }}

                    <div class="mt-4">
                        <TextInput ref="passwordInput" v-model="form.password" type="password" class="mt-1 block w-3/4"
                            placeholder="{{ $t('password') }}" autocomplete="current-password"
                            @keyup.enter="logoutOtherBrowserSessions" />

                        <InputError :message="form.errors.password" class="mt-2" />
                    </div>
                </template>

                <template #footer>
                    <SecondaryButton @click="closeModal">
                        {{ $t('cancel') }}
                    </SecondaryButton>

                    <PrimaryButton class="ms-3" :class="{ 'opacity-25': form.processing }" :disabled="form.processing"
                        @click="logoutOtherBrowserSessions">
                        {{ $t('log_out_other_browser_sessions') }}
                    </PrimaryButton>
                </template>
            </DialogModal>
        </template>
    </ActionSection>
</template>
