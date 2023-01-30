<script>

export default {
    name: "AppCard",
    components: {

    },
    props: {
        project: Object,
    },
    data() {
        return {

        };
    },
    methods: {},
    computed: {},
    };
    </script>

<template>

    <div class="card h-100" style="">
    <img :src="project.cover_image" class="card-img-top" :alt="project.name">
    <div class="card-body">
        <h5 class="card-title"> {{ project.name }} </h5>
        <p class="card-text" v-html="project.summary"></p>
        <router-link :to="{name: 'project_detail', params:{slug: project.slug}}" class="btn btn-primary">View</router-link>
    </div>
    </div>

</template>

<style lang="scss" scoped>



</style>
