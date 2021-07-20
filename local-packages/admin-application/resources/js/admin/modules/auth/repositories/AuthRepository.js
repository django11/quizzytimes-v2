import ApiBaseRepository from "../../../core/repositories/ApiBaseRepository";

export default {
    login(email, password) {
        return axios.get('/sanctum/csrf-cookie').then((response) => {
            return ApiBaseRepository.post('/login', {email, password})
                .then((response) => {
                    console.log(response);
                })
        })
    },
    getAuthenticatedUser() {
        return ApiBaseRepository.get('user');
    }
}
