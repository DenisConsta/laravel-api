import { reactive } from 'vue';

export const store = reactive({

    projects: [],

    pagination: {
        current_page: null,
        last_page: null,
    },

});
