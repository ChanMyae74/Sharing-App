<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import {Link, useForm, usePage} from '@inertiajs/vue3';

defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const user = usePage().props.auth.user;

const form = useForm({
    first_name: user.first_name,
    last_name: user.last_name,
    nickname: user.nickname,
    phone: user.phone,
    username: user.username,
    email: user.email,
    bio: user.bio,
    facebook: user.facebook,
    github: user.github,
    linkin: user.linkin,
});
</script>

<template>
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-200">Change Profile Information</h2>

            <p class="mt-1 text-sm text-gray-400 p-3">
                Update your account's profile information and email address.
            </p>
        </header>
        <form class="mt-6 space-y-3"
              @submit.prevent="form.patch(route('profile.update',$page.props.auth.user))">
            <div class="flex w-full flex-wrap">
                <div class="mt-2 flex w-1/2 flex-col pr-2">
                    <InputLabel for="first_name"
                                value="First Name"/>
                    <TextInput id="first_name"
                               v-model="form.first_name"
                               autocomplete="first_name"
                               autofocus
                               class="mt-1 block w-full"
                               type="text"/>

                    <InputError :message="form.errors.first_name"
                                class="mt-2"/>
                </div>

                <div class="mt-2 flex w-1/2 flex-col pl-2">
                    <InputLabel
                        for="last_name"
                        value="Last Name"/>
                    <TextInput id="last_name"
                               v-model="form.last_name"
                               autocomplete="last_name"
                               autofocus
                               class="mt-1 block w-full"
                               type="text"/>
                    <InputError :message="form.errors.last_name"
                                class="mt-2"/>
                </div>
            </div>
            <div class="flex w-full flex-wrap">
                <div class="mt-2 flex w-1/2 flex-col pr-2">
                    <InputLabel for="nickname"
                                value="Nickname"/>
                    <TextInput id="nickname"
                               v-model="form.nickname"
                               autocomplete="nickname"
                               autofocus
                               class="mt-1 block w-full"
                               type="text"/>
                    <InputError :message="form.errors.nickname"
                                class="mt-2"/>
                </div>

                <div class="mt-2 flex w-1/2 flex-col pl-2">
                    <InputLabel for="phone"
                                value="Phone Number"/>
                    <TextInput id="phone"
                               v-model="form.phone"
                               autocomplete="phone"
                               autofocus
                               class="mt-1 block w-full"
                               type="text"/>

                    <InputError :message="form.errors.phone"
                                class="mt-2"/>
                </div>
            </div>
            <div class="flex w-full flex-wrap">
                <div class="w-1/4 flex-col">
                    <InputLabel for="username" value="Username"/>

                    <TextInput id="username"
                               v-model="form.username"
                               autocomplete="username"
                               autofocus
                               class="mt-1 block w-full"
                               type="text"/>
                    <InputError :message="form.errors.username"
                                class="mt-2"/>
                </div>
                <div class="w-1/4 flex-col pl-2">
                    <InputLabel for="facebook" value="Facebook"/>

                    <TextInput id="facebook"
                               v-model="form.facebook"
                               autocomplete="facebook"
                               autofocus
                               class="mt-1 block w-full"
                               type="text"/>
                    <InputError :message="form.errors.facebook"
                                class="mt-2"/>
                </div>
                <div class="w-1/4 flex-col pl-2">
                    <InputLabel for="github" value="Github"/>

                    <TextInput id="github"
                               v-model="form.github"
                               autocomplete="github"
                               autofocus
                               class="mt-1 block w-full"
                               type="text"/>
                    <InputError :message="form.errors.github"
                                class="mt-2"/>
                </div>
                <div class="w-1/4 flex-col pl-2">
                    <InputLabel for="linkin" value="LinkedIn"/>

                    <TextInput id="linkin"
                               v-model="form.linkin"
                               autocomplete="linkin"
                               autofocus
                               class="mt-1 block w-full"
                               type="text"/>
                    <InputError :message="form.errors.linkin"
                                class="mt-2"/>
                </div>
            </div>
            <div>
                <InputLabel for="email"
                            value="Email"/>
                <TextInput id="email"
                           v-model="form.email"
                           autocomplete="username"
                           class="mt-1 block w-full"
                           type="email"/>
                <InputError :message="form.errors.email"
                            class="mt-2"/>
            </div>
            <div class="">
                <InputLabel for="bio"
                            value="Bio"/>
                <div class="mt-1">
                    <textarea id="bio"
                              v-model="form.bio"
                              class="w-full border border-gray-700 text-gray-300 text-sm bg-transparent focus:border-sky-600 focus:ring-sky-600 rounded-md"
                              placeholder="Aa"
                              rows="1"></textarea>
                </div>
                <InputError :message="form.errors.bio" class="mt-2"/>
            </div>
            <div v-if="mustVerifyEmail && user.email_verified_at === null">
                <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                    Your email address is unverified.
                    <Link :href="route('verification.send')" as="button"
                          class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                          method="post">
                        Click here to re-send the verification email.
                    </Link>
                </p>
                <div v-show="status === 'verification-link-sent'"
                     class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                    A new verification link has been sent to your email address.
                </div>
            </div>

            <div class="flex justify-end gap-4">
                <PrimaryButton :disabled="form.processing">
                    <svg class="bi bi-person-up mr-1" fill="currentColor" height="16" viewBox="0 0 16 16"
                         width="16" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.354-5.854 1.5 1.5a.5.5 0 0 1-.708.708L13 11.707V14.5a.5.5 0 0 1-1 0v-2.793l-.646.647a.5.5 0 0 1-.708-.708l1.5-1.5a.5.5 0 0 1 .708 0ZM11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z"/>
                        <path
                            d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z"/>
                    </svg>
                    Update Profile
                </PrimaryButton>
            </div>
        </form>
    </section>
</template>
