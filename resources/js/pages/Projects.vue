<script>
import axios from "axios";
import {basicUrl} from '../data/data';

import AppCard from "../components/AppCard.vue";

export default {
    name: "Projects",
    components: {
        AppCard,
    },
    data() {
        return {
        projects: [],
        basicUrl,
        pagination: {
            current_page: null,
            total: null,
            per_page: null,
        },
        };
    },
    methods: {
        getApi() {
        axios
            .get(this.basicUrl + "projects", {
            params: {
                page: this.pagination.current_page,
            },
            })
            .then((result) => {
            this.projects = result.data.projects.data;
            this.pagination.current_page = result.data.projects.current_page;
            this.pagination.total = result.data.projects.total;
            this.pagination.per_page = result.data.projects.per_page;
            })
            .catch((error) => {
            console.log(error);
            });
        },
    },
    mounted() {
        this.getApi();
    },
};
</script>

<template>

    <h1 class="display-1 text-center mb-5">Elenco progetti</h1>



    <div class="container">
        <div class="row d-flex justify-content-center">
        <div v-for="project in projects" :key="project.id" class="col-3 mb-3">
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
        @click="getApi(this.pagination.current_page--)"
        v-show="this.pagination.current_page > 1"
        >
        Prev
        </button>
        <h4 class="p-3">
        {{ this.pagination.current_page }} /
        {{ Math.ceil(this.pagination.total / this.pagination.per_page) }}
        </h4>
        <button
        class="btn btn-primary"
        @click="getApi(this.pagination.current_page++)"
        v-show="
            this.pagination.current_page <
            Math.ceil(this.pagination.total / this.pagination.per_page)
        "
        >
        Next
        </button>
    </div>

</template>

<style>
</style>
