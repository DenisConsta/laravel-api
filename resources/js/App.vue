<script>
import Header from "./partials/Header.vue";

export default {
    name: "App",
    components: {
        Header,
    },
    data() {
        return {};
    },
    methods: {},
    mounted() {},
    };
    </script>

    <template>
    <Header></Header>
    <main>
        <div class="container">
        <router-view></router-view>
        </div>
    </main>
</template>

<style scoped lang="scss">
</style>
