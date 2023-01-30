<script>
import { ApiService } from "../services/api.service";
import { store } from "../data/store";
import { nextPrev } from '../data/functions';


import AppCard from "../components/AppCard.vue";
import SearchBox from "../components/SearchBox.vue";

export default {
    name: "Projects",
    components: {
        AppCard,
        SearchBox,

    },
    data() {
        return {
            store,
            ApiService,
            nextPrev,

        };
    },
    methods: {
    },
    mounted() {
        ApiService.getApi('projects', {});
    },
};
</script>

<template>
    <h1 class="display-1 text-center mb-5">Elenco progetti</h1>

    <SearchBox />

    <div class="container">
        <div class="row d-flex justify-content-center">
        <div v-for="project in store.projects" :key="project.id" class="col-3 mb-3">
            <AppCard :project="project" />
        </div>

        <h3 v-if="store.projects.length<1" class="text-center my-3">La ricerca non ha prodotto risultati</h3>

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
        v-if="store.pagination.last_page !== 1"
    >
        <button
        class="btn btn-primary"
        @click="nextPrev(false)"
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
        @click="nextPrev(true)"
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
