<template>
    <div class="d-flex">
        <side-bar/>
        <router-view/>
    </div>
</template>

<script>
    import SideBar from "./SideBar";
    import AuthRepository from "../../modules/auth/repositories/AuthRepository";
    export default {
        name: "Main",
        components: {
            SideBar
        },
        created() {
            this.getAuthenticatedUser();
        },
        methods: {
            getAuthenticatedUser() {
                AuthRepository.getAuthenticatedUser().then((response) => {
                    console.log(response);
                });
            }
        }
    }
</script>

<style scoped>

</style>
