<script>
import { ApiService } from "../services/api.service";
import { store } from "../data/store";
import AppCard from "../components/AppCard.vue";

export default {
    name: "Projects",
    components: {
        AppCard,
    },
    data() {
        return {
            store,
            ApiService,
        };
    },
    methods: {
    },
    mounted() {
        ApiService.getApi('projects', '');
    },
};
</script>

<template>
    <h1 class="display-1 text-center mb-5">Elenco progetti</h1>

    <div class="container">
        <div class="row d-flex justify-content-center">
        <div v-for="project in store.projects" :key="project.id" class="col-3 mb-3">
            <AppCard :project="project" />
        </div>
        </div>
    </div>

    <div
        class="
        btns
        container-fluid
        d-flex
        justify-content-center
        align-items-center
        "
    >
        <button
        class="btn btn-primary"
        @click="store.pagination.current_page--; ApiService.getApi('projects', '')"
        v-show="store.pagination.current_page > 1"
        >
        Prev
        </button>
        <h4 class="p-3">
        {{ store.pagination.current_page }} /
        {{ store.pagination.last_page }}
        </h4>
        <button
        class="btn btn-primary"
        @click="store.pagination.current_page++; ApiService.getApi('projects', '')"
        v-show="
            store.pagination.current_page <
            store.pagination.last_page
        "
        >
        Next
        </button>
    </div>
</template>

<style>
</style>
