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
        techSelected : null,
        }
    },
    methods:{
        switchSelect(event, type){
            this.techSelected = event.target.value;
            console.log(event.target.value);
            if(this.techSelected != null || this.techSelected  != ''){
                let route='';  

                if(type === 'tech')
                    route = 'projects-technology';    
                else if(type === 'type')
                    route = 'projects-type';    

                ApiService.getApi(`projects/${route}/${this.techSelected}`, '');
            }
        }
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
            <select class="form-select w-25" aria-label="Default select example" @change="switchSelect($event, 'tech')">
                    <option value="">Selezionare una tecnologia</option>
                    <option v-for="tech in store.technologies" :value="tech.id" :key="'tech'+tech.id"> {{ tech.name }} </option>
                </select>

                <!-- ? types -->
            <select class="form-select w-25" aria-label="Default select example" @change="switchSelect($event, 'type')" >
                    <option value="">Selezionare una tipologia</option>
                    <option v-for="item in store.types" :value="item.id" :key="'tech'+item.id"> {{ item.name }} </option>
                </select>
        </div>
    </div>
</template>

<style lang="scss" scoped>
</style>
