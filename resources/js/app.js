const Axios = require('axios');
require('./bootstrap');

let token = document.querySelector('meta[name="csrf-token"]').content;
Axios.defaults.headers.common['X-CSRF-TOKEN'] = token;
