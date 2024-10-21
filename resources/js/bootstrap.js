import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.axios.defaults.withCredentials = true; // without this one it wasn't working in Firefox
window.axios.defaults.withXSRFToken = true;

