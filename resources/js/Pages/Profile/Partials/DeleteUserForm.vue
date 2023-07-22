<script setup>
import DangerButton from '@/Components/DangerButton.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import Modal from '@/Components/Modal.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import {useForm} from '@inertiajs/vue3';
import {nextTick, ref} from 'vue';

const confirmingUserDeletion = ref(false);
const passwordInput = ref(null);

const form = useForm({
    password: '',
});

const confirmUserDeletion = () => {
    confirmingUserDeletion.value = true;

    nextTick(() => passwordInput.value.focus());
};

const deleteUser = () => {
    form.delete(route('profile.destroy'), {
        preserveScroll: true,
        onSuccess: () => closeModal(),
        onError: () => passwordInput.value.focus(),
        onFinish: () => form.reset(),
    });
};

const closeModal = () => {
    confirmingUserDeletion.value = false;

    form.reset();
};
</script>

<template>
    <div class="flex items-center justify-between">
        <h2 class="text-lg font-medium text-red-400">Delete Account</h2>
    </div>
    <div
        class="bg-red-50 bg-panel-800 text-red-400 dark:px-0 flex flex-row rounded-lg p-4 text-sm mt-3">
        <svg class="text-red-400 h-6 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="1.5"
             viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z"
                stroke-linecap="round"
                stroke-linejoin="round"></path>
        </svg>
        <div class="ml-4 mt-0.5 flex flex-grow">
            <p class="">
                This will cancel your subscription and delete all of your account's data. Your data will not be
                recoverable; however, your servers will be preserved.
            </p>
        </div>
    </div>
    <div class="flex mt-3 justify-end">
        <DangerButton @click="confirmUserDeletion">
            <svg class="bi bi-person-x mr-1" fill="currentColor" height="16" viewBox="0 0 16 16" width="16"
                 xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm.256 7a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z"/>
                <path
                    d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm-.646-4.854.646.647.646-.647a.5.5 0 0 1 .708.708l-.647.646.647.646a.5.5 0 0 1-.708.708l-.646-.647-.646.647a.5.5 0 0 1-.708-.708l.647-.646-.647-.646a.5.5 0 0 1 .708-.708Z"/>
            </svg>
            Delete Account
        </DangerButton>
    </div>

    <Modal :show="confirmingUserDeletion" @close="closeModal">
        <div class="p-6 bg-panel-800">
            <h2 class="text-lg font-medium text-gray-200">
                Are you sure you want to delete your account?
            </h2>

            <p class="mt-1 text-sm text-gray-400">
                This will cancel your subscription and delete all of your account's data. Your data will not be
                recoverable; however, your servers will be preserved.
            </p>

            <div class="mt-6">
                <InputLabel class="sr-only" for="password" value="Password"/>

                <TextInput
                    id="password"
                    ref="passwordInput"
                    v-model="form.password"
                    class="mt-1 block w-3/4"
                    placeholder="Password"
                    type="password"
                    @keyup.enter="deleteUser"
                />

                <InputError :message="form.errors.password" class="mt-2"/>
            </div>

            <div class="mt-6 flex justify-end">
                <SecondaryButton @click="closeModal">
                    <svg class="bi bi-x-circle mr-1" fill="currentColor" height="16" viewBox="0 0 16 16"
                         width="16" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path
                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                    </svg>
                    Cancel
                </SecondaryButton>

                <DangerButton
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                    class="ml-3"
                    @click="deleteUser"
                >
                    <svg class="bi bi-person-x mr-1" fill="currentColor" height="16" viewBox="0 0 16 16"
                         width="16" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm.256 7a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z"/>
                        <path
                            d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm-.646-4.854.646.647.646-.647a.5.5 0 0 1 .708.708l-.647.646.647.646a.5.5 0 0 1-.708.708l-.646-.647-.646.647a.5.5 0 0 1-.708-.708l.647-.646-.647-.646a.5.5 0 0 1 .708-.708Z"/>
                    </svg>
                    Delete Account
                </DangerButton>
            </div>
        </div>
    </Modal>
</template>
