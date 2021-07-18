import axios from "axios";

const baseDomain = process.env.MIX_APP_URL;
const baseURL = `${baseDomain}/api`; // Incase of /api/v1;

const axiosInstance = axios.create({
    baseURL,
    headers: {
        'Accept': 'application/json',
    }
});

axiosInstance.interceptors.response.use(
    function(successRes) {
        return successRes.data;
    },
    function(error) {
        return Promise.reject(error);
    }
);

// axiosInstance.interceptors.request.use(function (config) {
//     return config;
// }, function (error) {
//     // Do something with request error
//     return Promise.reject(error);
// });

export default axiosInstance;
