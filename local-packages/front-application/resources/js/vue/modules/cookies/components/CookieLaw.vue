<template>
    <transition name="fade">
        <section v-if="showCookieLaw" class="cookie-law-overlay">
            <div class="cookie-law py-4">
                <div class="container">
                    <div class="row">
                        <div class="col-md-10">
                            <h3>We Use Cookies And Other Technologies</h3>
                            <p class="mb-0">www.quizzytimes.com values your privacy but we also value providing readers with relevant content.
                                To do that, we and trusted partners sometimes use cookies and tracking tech.
                                The choice is yours: a custom experience tailored to your interests and the site - or the defaults.
                                Either way, you'll get the same great content, every day, guaranteed.</p>
                        </div>
                        <div class="col-md-2 text-center">
                            <button class="btn btn-success px-5" @click="acceptCookiesPolicy">OK</button><br>
                            <button class="btn bg-transparent">More Info</button>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    </transition>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.');

            setTimeout(() => {
                if(!this.$cookies.get("accepted-cookies-policy")) {
                    this.showCookieLaw = true;
                }
            },  1000);
        },

        data() {
            return {
                showCookieLaw: false,
                showMoreInfo: false
            }
        },

        methods: {
            acceptCookiesPolicy() {
                this.$cookies.set("accepted-cookies-policy", "1", "1year");
                this.showCookieLaw = false;
            }
        }
    }
</script>

<style scoped>
    .fade-enter-active, .fade-leave-active {
        transition: opacity 1s;
    }
    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
        opacity: 0;
    }

    .cookie-law-overlay {
        background: rgba(29,29,29,.8);
        height: 100vh;
        position: sticky;
        bottom: 0;
        z-index: 11111;
        overflow: auto;
    }

    .cookie-law-text .container {
        overflow-y: auto;
        overflow-x: hidden;
        height: 100%;
        max-width: 700px;
    }

    .cookie-law {
        position: absolute;
        bottom: 0;
        background: #fff;
        z-index: 999;
        width: 100%;
        box-shadow: 0 0 15px 5px rgba(0,0,0,.15);
    }
</style>
