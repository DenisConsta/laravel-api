<script>
import axios from 'axios';
import {basicUrl} from '../data/data';

export default {
    name: 'ProjectDetail',
    data(){
        return{
            project: Object,
        }
    },
    methods:{
        getApi(){
            console.log(basicUrl);
            axios.get(basicUrl + 'projects/' + this.$route.params.slug)
                .then(res => {
                    this.project = res.data.project[0];
                })

        }
    },
    mounted(){
        console.log(this.$route.params.slug);
        this.getApi();
    }
}
</script>

<template>
    <h1>{{ project.name }}</h1>
    <h2> {{ project.client_name }} </h2>
    <p v-html="project.summary"></p>
    <img :src="project.cover_image" alt="">

</template>

<style>
</style>
