<template>
    <div class="bg-blue/7 p-3 rounded">
        <div class="py-2">
            <table class="w-full text-left text-white/50 mt-3">
                <thead v-if="table_head" class="text-white/50">
                    <tr class="h-10">
                        <th
                            v-for="th in table_head"
                            :class="classes"
                            scope="col"
                        >
                            {{ th }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <slot />
                </tbody>
            </table>
        </div>
    </div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3';
import { ref, watch } from 'vue';
import { Inertia } from '@inertiajs/inertia';

const search = ref('');

defineProps({
    table_head: [],
    name: 'MasterTable',
    classes: 'pr-4 font-normal',
});

const category_search = (search) => {
    Inertia.get(
        '/session/categories',
        { category: search },
        {
            queryStringArrayFormat: {},
            preserveState: true,
            replace: true,
        }
    );
};
</script>
