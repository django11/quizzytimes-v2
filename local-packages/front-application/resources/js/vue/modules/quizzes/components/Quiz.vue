<template>
    <div>
        <div class="pt-5 text-center" style="display: block; max-width: 100px; margin: 0 auto;" v-if="loading">
            <lottie-animation path="fireworks.json"/>
            <p>Loading...</p>
        </div>

        <transition-group name="fade">
            <div :key="question.id" class="row mt-4" v-if="started">
                <div class="col-12">
                    <span class="question-number">QUESTION {{ current_question + 1 }}</span>
                    <h2 class="question-title">{{ question.question_text }}</h2>

                    <img :src="question.picture_url" class="img-fluid w-100 mb-5" v-if="question.picture_url">

                    <iframe class="d-block w-100 border-0" src="/ads/top"></iframe>
                </div>

                <div class="col-sm-6" v-for="answer in question.answers" :key="answer.id">
                    <label :class="[showAnswers.includes(answer.id) ? 'answer-correct' : '', answer.answer_class ? answer.answer_class : '']"
                           @click.stop="checkAnswer(question, answer, $event)"
                           class="answer-btn">
                            <span class="qt-icon">
                                <i class="fa fa-check" v-if="answer.is_correct"></i>
                                <i class="fa fa-times" v-else></i>
                            </span>

                        <img v-if="answer.picture_url" :src="answer.picture_url" class="img-fluid">

                        <span>{{ answer.answer_text }}</span>
                        <input :data-is-correct="answer.is_correct" class="d-none" id="js-answer-btn-1" type="radio"
                               value="">
                    </label>
                </div>
            </div>
        </transition-group>

        <transition-group name="fade">
            <div :key="'next'"
                 @click="showNext"
                 class="mt-5 p-3 bg-primary d-flex justify-content-center align-items-center cursor-pointer" v-if="started && showNextButton && (current_question + 1 !== questions.length)">
                <p class="p-3 m-0 text-white">Next</p>
                <i class="fa fa-arrow-right text-white"></i>
            </div>

            <div :key="'start'" @click="start"
                 class="col-12 mt-5 p-3 bg-primary d-flex justify-content-center align-items-center cursor-pointer"
                 id="start-quiz" v-if="!loading && !started && !showResultsBlock">
                <p class="p-3 m-0 text-white">Start</p>
                <i class="fa fa-arrow-right text-white"></i>
            </div>

            <div :key="'results'"
                 @click="showResults"
                 class="mt-5 p-3 bg-primary d-flex justify-content-center align-items-center cursor-pointer" v-if="showResultsButton">
                <p class="p-3 m-0 text-white">SEE YOUR RESULTS</p>
                <i class="fa fa-arrow-right text-white"></i>
            </div>
        </transition-group>

        <div class="ads-block">
            <iframe id="square-middle-ad" class="d-block w-100 border-0" style="min-height: 300px;" src="/ads/square"></iframe>
        </div>

        <transition name="fade-results">
            <div class="results" v-if="showResultsBlock">
                <div class="results-block p-4">
                    <h5 class="text-center">Sign up for our Quiz of the Day</h5>
                    <p>Get fresh new quizzes sent directly to your email!</p>
                    <input class="form-control">
                    <button>Sign up and see my result</button>
                    <button>No emails, just show me my results</button>
                </div>
                <div class="results-block p-4">
                    <i @click="showResultsBlock = false" class="fa fa-times"></i>
                    <h5 class="text-center">RESULTS FOR:</h5>
                    <h4 class="text-center">{{ quiz.title }}</h4>
                    <div class="text-center">
                        <p class="font-weight-bold">YOU SCORED: {{ Math.floor((correctAnswers / questions.length) * 100) }}%</p>
                    </div>
                    <div class="social">
                        <ShareNetwork
                            :description="quiz.description"
                            :title="quiz.title"
                            :url="'https://quizzytimes.com/' + quiz.slug"
                            class="sharing-btn btn-facebook d-block p-3 text-center"
                            network="facebook"
                        >
                            <i class="fa fa-facebook mr-1"></i> Share With Friends
                        </ShareNetwork>

                        <ShareNetwork
                            :description="quiz.description"
                            :title="quiz.title"
                            :url="'https://quizzytimes.com/' + quiz.slug"
                            class="sharing-btn btn-twitter d-block p-3 text-center"
                            network="twitter"
                        >
                            <i class="fa fa-twitter mr-1"></i> Tweet
                        </ShareNetwork>
                        <button @click="retakeQuiz" class="sharing-btn btn-retake">
                            <i class="fa fa-sync mr-1"></i> Retake the quiz
                        </button>

                        <a :href="next" class="sharing-btn btn-next d-block p-3 text-center">
                            <i class="fa fa-sync mr-1"></i> Next quiz
                        </a>
                    </div>
                </div>
            </div>
        </transition>
    </div>
</template>

<script>
    import LottieAnimation from "lottie-vuejs/src/LottieAnimation.vue";
    import QuizRepository from "../repositories/QuizRepository";

    export default {
        components: {
            LottieAnimation,
        },
        props: [
            'quizId'
        ],
        mounted() {
            this.getQuestions();
        },
        data() {
            return {
                quiz: null,
                questions: [],
                answers: [],
                showAnswers: [],
                loading: true,
                started: false,
                correctAnswers: 0,
                showResultsBlock: false,
                current_question: 0,
                question: null,
                showNextButton: false,
                showResultsButton: false,
                quiz_middle_ad: '',
                next: '/',
            }
        },

        methods: {
            getQuestions() {
                QuizRepository.getQuiz(this.quizId)
                    .then(response => {
                        // this.quiz = response.data.quiz;
                        // this.next = response.data.next;
                        this.questions = response.data.questions;
                        this.question = this.questions[this.current_question]
                        setTimeout(() => {
                            this.loading = false;
                        }, 1500)
                    })
                    .catch(e => {
                        console.log(e);
                    })
            },

            getAds() {
                document.getElementById('square-middle-ad').contentWindow.location.reload();
                document.getElementById('sidebar-ad').contentWindow.location.reload();
            },

            start() {
                this.started = true;
                document.querySelector('.quiz-description').classList.add('d-none');
                this.getAds();
            },

            showNext() {
                this.showNextButton = false;
                this.question = this.questions[this.current_question += 1]
                this.getAds();
            },

            checkAnswer(question, answer, event) {
                const alreadyAnswered = this.answers.some((item) => {
                    return answer.quiz_question_id === item.quiz_question_id;
                });

                if (!alreadyAnswered) {
                    this.logAnalytics();
                    this.$set(answer, 'answered_correctly', answer.is_correct);
                    let answer_class = answer.is_correct ? 'answer-correct' : 'answer-wrong';
                    this.$set(answer, 'answer_class', answer_class);
                    this.answers.push(answer);
                    event.stopPropagation();

                    if (!answer.is_correct) {
                        question.answers.forEach((item) => {
                            if (item.is_correct) {
                                this.showAnswers.push(item.id);
                            }
                        });
                    }
                }

                this.showNextButton = this.answers.some((item) => {
                    return answer.quiz_question_id === item.quiz_question_id;
                });

                this.showResultsButton = (this.current_question + 1 === this.questions.length);
            },

            showResults() {
                this.correctAnswers = 0;
                this.answers.forEach((answer) => {
                    if (answer.answered_correctly) {
                        this.correctAnswers++;
                    }
                });

                this.showResultsBlock = true;
            },

            retakeQuiz() {
                this.showAnswers = [];
                this.answers = [];
                this.correctAnswers = 0;
                this.showResultsBlock = false;

                this.questions.forEach((question) => {
                    question.answers.forEach((answer) => {
                        this.$delete(answer, 'answer_class');
                        this.$delete(answer, 'answered_correctly');
                    });
                });

                this.current_question = 0;
                this.question = this.questions[this.current_question];
            },

            logAnalytics() {
                gtag('config', 'UA-170209856-1', {
                    'page_title': this.question.question_text,
                    'page_path': window.location + '?current_question_id=' + this.question.id
                });
            }
        }
    }
</script>

<style scoped>
    .fade-enter-active {
        transition: opacity 2s;
    }

    .fade-leave-active {
        transition: opacity 0.25s;
    }

    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */
    {
        opacity: 0;
    }

    .fade-results-enter-active {
        transition: opacity 0.5s;
    }

    .fade-results-leave-active {
        transition: opacity 0.25s;
    }

    .fade-results-enter, .fade-results-leave-to /* .fade-leave-active below version 2.1.8 */
    {
        opacity: 0;
    }

    .results {
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
        position: fixed;
        background: #a9a6a6a1;
        z-index: 9999;
        overflow: auto;
    }

    .results-block {
        background: #fff;
        width: 95%;
        max-width: 500px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        overflow-y: auto;
    }

    .sharing-btn {
        font-size: 1.1em;
        font-weight: 700;
        color: #fff;
        text-transform: uppercase;
        height: 3.5rem;
        width: 100%;
        border-radius: 2px;
        box-shadow: 0 1px 10px 1px rgba(5, 5, 5, .2);
        margin: 0 0 1rem;
        border: 1px solid #dadada;
        cursor: pointer;
    }

    .sharing-btn:hover {
        color: #fff !important;
        opacity: 0.75;
    }

    .btn-twitter:hover,
    .btn-twitter {
        background: #00aced !important;
    }

    .btn-facebook:hover,
    .btn-facebook {
        background: #3b5998 !important;
    }

    .btn-next {
        background: #FFC107 !important;
        color: #fff;
        text-decoration: none;
    }

    a:hover .fa-twitter,
    a:hover .fa-facebook {
        color: #fff !important;
    }

    .btn-retake:hover,
    .btn-retake {
        color: #999 !important;
    }

    .btn-retake i {
        color: #999 !important;
    }

    .results .fa-times {
        position: absolute;
        top: 0.5rem;
        right: 0.5rem;
        opacity: 0.5;
        font-size: 17px;
        cursor: pointer;
    }

    .results .fa-times:hover {
        opacity: 1;
    }

    .cursor-pointer {
        cursor: pointer;
    }
</style>
