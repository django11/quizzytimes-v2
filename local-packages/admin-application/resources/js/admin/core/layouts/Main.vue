<template>
    <div class="d-flex">
        <side-bar v-if="showSideMenu"/>
        <router-view/>
    </div>
</template>

<script>
    import SideBar from "./SideBar";
    export default {
        name: "Main",
        components: {
            SideBar
        },
        computed: {
            showSideMenu() {
                return this.$store.getters['getAdmin'];
            }
        }
    }
</script>

<style scoped>

</style>
