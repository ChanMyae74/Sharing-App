<template>
    <article
        class="transition-colors duration-500 rounded-xl from-frameworks-light to-frameworks bg-gradient-to-l"
    >
        <div class="py-3 px-2 flex">
            <div
                v-if="article.article_photo"
                class="flex-1 lg:mr-8"
                style="width: 80%"
            >
                <img
                    :src="`/storage/ArticleAttachment/${article.article_photo.unique_name}`"
                    alt="Blog Post illustration"
                    class="lazy object-cover rounded-xl"
                    loading="lazy"
                />
            </div>
            <div class="flex-1 flex flex-col justify-between">
                <header class="">
                    <div class="flex justify-between">
                        <div class="flex items-center">
                            <a
                                :href="
                                    route('profile.information', article.author)
                                "
                                class="flex items-center text-white"
                            >
                                <div
                                    v-if="article.author.photo"
                                    class="relative"
                                >
                                    <img
                                        :src="
                                            '/storage/ProfileAttachment/' +
                                            article.author.photo
                                        "
                                        alt=""
                                        class="mr-2 lazy object-cover lazyloaded rounded-full"
                                        loading="lazy"
                                        style="height: 28px"
                                        width="30"
                                    />
                                    <span
                                        :class="
                                            article.author.online
                                                ? 'absolute bottom-0 right-0 inline-block w-3 h-3 bg-gray-600 border-2 border-white/70 rounded-full opacity-90 hover:opacity-100'
                                                : 'absolute top-0 right-0 inline-block w-3 h-3 bg-green-600 border-2 border-white/70 rounded-full opacity-90 hover:opacity-100'
                                        "
                                    ></span>
                                </div>
                                <div
                                    v-else
                                    aria-hidden="true"
                                    class="relative mr-2 flex h-8 w-8 items-center uppercase justify-center rounded-full border-2 border-gray-200 bg-blue-50 text-blue-700 dark:border-gray-400 h-[30px] w-[30px] border-none"
                                    height="30"
                                    width="30"
                                >
                                    <span
                                        :class="
                                            article.author.online
                                                ? 'absolute bottom-0 right-0 inline-block w-3 h-3 bg-gray-600 border-2 border-white/70 rounded-full opacity-90 hover:opacity-100'
                                                : 'absolute top-0 right-0 inline-block w-3 h-3 bg-green-600 border-2 border-white/70 rounded-full opacity-90 hover:opacity-100'
                                        "
                                    ></span>
                                    {{ article.author.username.split('')[0] }}
                                </div>
                                <!--                                <json-viewer :value="article.author.online"></json-viewer>-->
                                {{ article.author.username }}
                            </a>
                            <BlueBadgeIcon />
                        </div>
                        <div class="space-x-1">
                            <CategoryBotton
                                :category="article.category"
                            ></CategoryBotton>
                        </div>
                    </div>
                    <div class="mt-4">
                        <h1 class="text-3xl text-white">
                            <a :href="route('article.show', article.uuid)">
                                {{ article.title }}
                            </a>
                        </h1>

                        <span
                            class="my-2 text-white text-xs flex items-center space-x-1"
                        >
                            <div v-if="article.is_public">
                                <svg
                                    aria-hidden="true"
                                    class=""
                                    fill="none"
                                    height="13"
                                    stroke="currentColor"
                                    stroke-width="1.5"
                                    viewBox="0 0 24 24"
                                    width="12"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <title>Public</title>
                                    <path
                                        d="M12.75 3.03v.568c0 .334.148.65.405.864l1.068.89c.442.369.535 1.01.216 1.49l-.51.766a2.25 2.25 0 01-1.161.886l-.143.048a1.107 1.107 0 00-.57 1.664c.369.555.169 1.307-.427 1.605L9 13.125l.423 1.059a.956.956 0 01-1.652.928l-.679-.906a1.125 1.125 0 00-1.906.172L4.5 15.75l-.612.153M12.75 3.031a9 9 0 00-8.862 12.872M12.75 3.031a9 9 0 016.69 14.036m0 0l-.177-.529A2.25 2.25 0 0017.128 15H16.5l-.324-.324a1.453 1.453 0 00-2.328.377l-.036.073a1.586 1.586 0 01-.982.816l-.99.282c-.55.157-.894.702-.8 1.267l.073.438c.08.474.49.821.97.821.846 0 1.598.542 1.865 1.345l.215.643m5.276-3.67a9.012 9.012 0 01-5.276 3.67m0 0a9 9 0 01-10.275-4.835M15.75 9c0 .896-.393 1.7-1.016 2.25"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    ></path>
                                </svg>
                            </div>
                            <div v-else>
                                <svg
                                    aria-hidden="true"
                                    width="12"
                                    height="13"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="1.5"
                                    viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <title>Private</title>
                                    <path
                                        d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    ></path>
                                </svg>
                            </div>
                            <Time :interval="1" :time="article.created_at" />
                        </span>
                    </div>
                </header>
                <div
                    class="content user-content text-[13px] text-grey-100 mt-6"
                >
                    <v-md-editor
                        :model-value="article.excerpt"
                        class="w-full"
                        mode="preview"
                    ></v-md-editor>
                    <a
                        :href="route('article.show', article)"
                        class="transition-colors duration-300 text-xs font-semibold text-gray-400"
                        >Read More</a
                    >
                </div>
                <footer class="flex justify-between items-center mt-8">
                    <div class="flex items-center">
                        <svg
                            class="bi bi-heart-fill text-[#f3477e] mr-2"
                            fill="currentColor"
                            height="16"
                            viewBox="0 0 16 16"
                            width="16"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"
                                fill-rule="evenodd"
                            />
                        </svg>
                        <span :interval="1" class="text-white/70">
                            <!--                            <Time :time="article.created_at" :interval="1" />-->
                            {{ article.reactions.length }}
                        </span>
                    </div>
                    <div v-if="article.comments_count" class="">
                        <a :href="route('article.show', article)">
                            <comment
                                class="flex items-center space-x-1 text-white/70"
                            >
                                <span class="mr-1">{{
                                    article.comments_count.length
                                }}</span>
                                <svg
                                    class="bi bi-chat-left"
                                    fill="currentColor"
                                    height="16"
                                    viewBox="0 0 16 16"
                                    width="16"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"
                                    />
                                </svg>
                            </comment>
                        </a>
                    </div>
                </footer>
            </div>
        </div>
    </article>
</template>

<script setup>
import CategoryBotton from '@/Components/CategoryBotton.vue';
import BlueBadgeIcon from '@/Components/BlueBadgeIcon.vue';

defineProps({
    article: {},
});
</script>

<style scoped>
.to-frameworks {
    --tw-gradient-to: v-bind('article.gradient_left');
}

.from-frameworks-light {
    --tw-gradient-from: v-bind('article.form_frameworks');
    --tw-gradient-stops: var(--tw-gradient-from),
        var(--tw-gradient-to, rgba(244, 72, 129, 0));
}

.bg-gradient-to-l {
    background-image: linear-gradient(to left, var(--tw-gradient-stops));
}
</style>
