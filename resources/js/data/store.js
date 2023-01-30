import { reactive } from 'vue';

export const store = reactive({

    projects: [],
    technologies: [],
    types: [],

    pagination: {
        last_route: null,
        current_page: null,
        last_page: null,
    },

    tosearch : '',
    lastSearch : '',
    lastUrl: '',

});
