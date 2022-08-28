import axios from 'axios';

const axiosClient = axios.create({
    baseURL: 'https://www.ziganikolic.hhost.si/api/'
    //baseURL: 'http://127.0.0.1:8000/api/'
})

export default axiosClient;
