import ApiBaseRepository from "../../../core/repositories/ApiBaseRepository";

export default {
    getQuiz(id) {
        return ApiBaseRepository.get(`/quizzes/${id}`);
    }
}
