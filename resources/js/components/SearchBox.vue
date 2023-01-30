<script>
import { ApiService } from "../services/api.service";
import { store } from "../data/store";
import { apiSearch } from "../data/functions";

export default {
    name: "SearchBox",

    data() {
        return {
        ApiService,
        store,
        apiSearch,
        };
    },
};
</script>

<template>
    <div class="search-bar my-3">
        <div class="d-flex justify-content-center">

            <div class="input-group w-25 ">
                <!-- ? name -->
                <span class="input-group-text">
                    <button class="btn btn-primary" @click="apiSearch(store.tosearch)">
                    Cerca
                    </button>
                </span>
                <input
                type="text"
                class="form-control"
                placeholder="Cerca un progetto"
                id="tosearch"
                v-model.trim="store.tosearch"
                @keypress.enter="apiSearch(store.tosearch)"
                />
            </div>

            <!-- ? technologies -->
            <select class="form-select w-25" aria-label="Default select example">
                    <option value="">Selezionare una tecnologia</option>
                    <option v-for="tech in store.technologies" :value="tech.id" :key="'tech'+tech.id"> {{ tech.name }} </option>
                </select>

                <!-- ? types -->
            <select class="form-select w-25" aria-label="Default select example">
                    <option value="">Selezionare una tipologia</option>
                    <option v-for="item in store.types" :value="item.id" :key="'tech'+item.id"> {{ item.name }} </option>
                </select>
        </div>
    </div>
</template>

<style lang="scss" scoped>
</style>
