import axios from 'axios';

const getCookie = (name) => document.cookie.match(new RegExp('(^| )' + name + '=([^;]+)'))?.[2];
// Create an instance of Axios with custom default headers
const axiosInstance = axios.create({
    // baseURL: 'https://api.example.com', // Replace with your API base URL
    timeout: 5000, // Request timeout in milliseconds
    headers: {
        Authorization: `Bearer ${getCookie('jwt_token')}`,
        'Content-Type': 'application/json', // Set other default headers if needed
    },
});

// Add a request interceptor to include the authorization header
axiosInstance.interceptors.request.use(
    (config) => {
        const accessToken = localStorage.getItem('accessToken'); // Get the access token from local storage
        if (accessToken) {
            config.headers['Authorization'] = `Bearer ${accessToken}`;
        }
        return config;
    },
    (error) => {
        return Promise.reject(error);
    }
);

export default axiosInstance;