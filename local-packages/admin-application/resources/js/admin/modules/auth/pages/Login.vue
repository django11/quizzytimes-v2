<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="login py-5 my-5">
                    <form class="login-form py-5 my-5">
                        <h3>QuizzyTimes Admin</h3>
                        <div class="form-floating">
                            <input v-model="email" type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Email</label>
                        </div>
                        <div class="form-floating">
                            <input v-model="password" type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>


                        <button class="w-100 btn btn-lg btn-primary text-white mt-3" @click.prevent="login">Login</button>

                        <p class="mt-5 mb-3 text-muted text-center">&copy; 2021</p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import AuthRepository from "../repositories/AuthRepository";

    export default {
        name: "Login",
        data() {
            return {
                email: '',
                password: ''
            }
        },
        methods: {
            login() {
                AuthRepository.login(this.email, this.password).then((data) => {
                    console.log(data);
                    AuthRepository.getAuthenticatedUser();
                }).catch((error) => {
                    console.log(error)
                })
            }
        }
    }
</script>

<style lang="scss" scoped>
    .login-form {
        width: 100%;
        max-width: 330px;
        padding: 15px;
        margin: auto;
    }
</style>
