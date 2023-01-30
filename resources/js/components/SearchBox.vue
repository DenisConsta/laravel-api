<script>
import { ApiService } from '../services/api.service';
import { store } from '../data/store';
import { apiSearch } from '../data/functions';

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
    <div class="search-bar">
        <div class="input-group w-25">
        <span class="input-group-text">
            <i class="fa-solid fa-magnifying-glass"></i>
        </span>
        <input type="text" class="form-control" placeholder="cerca" id="tosearch" v-model.trim="store.tosearch" @keypress.enter="apiSearch(store.tosearch)" />
        <button class="btn btn-primary" @click="apiSearch(store.tosearch)">Cerca</button>
        </div>
    </div>
</template>

<style lang="scss" scoped>
</style>
