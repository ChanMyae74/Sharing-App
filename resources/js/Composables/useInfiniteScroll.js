import {ref} from "vue";
import {router, usePage} from "@inertiajs/vue3";

export function useInfiniteScroll(propName) {

    const value = () => usePage().props[propName];

    const article = ref(value().data);

    const initialUrl = usePage().url;

    const loadMoreItems = () => {
        if (!value().next_page_url) {
            return;
        }

        router.get(value().next_page_url, {}, {
            preserveState: true,
            preserveScroll: true,
            onSuccess: () => {
                window.history.replaceState({}, '', initialUrl);
                article.value = [...article.value, ...value().data];
            },
        });
    };

    return {
        article,
        loadMoreItems,
    }

}
