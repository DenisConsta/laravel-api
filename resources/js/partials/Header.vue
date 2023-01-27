<script>
export default {
  name: "Header",
};
</script>

<template>
    <header>
        <ul>
            <li><router-link :to="{ name: 'home'}">Home</router-link></li>
            <li><router-link :to="{ name: 'projects'}">Projects</router-link></li>
            <li><router-link :to="{ name: 'about'}">Chi siamo</router-link></li>
            <li><router-link :to="{ name: 'contacts'}">Contatti</router-link></li>
        </ul>
    </header>
</template>

<style lang="scss" scoped>
header {
    text-align: center;
    ul {
        list-style: none;
        li{
            display: inline-block;
            padding: 10px 20px;
            a{
                color: black;
                text-decoration: none;
                text-transform: uppercase;
                &.active,
                &:hover{
                    color: blue;
                }
            }

        }
    }
}
</style>
