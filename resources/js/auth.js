const { default: axios } = require("axios");

const userInput = document.getElementById('user');
const passwordInput = document.getElementById('password');
const authBtn = document.getElementById('auth');

let baseUrl = document.querySelector('meta[name="base-url"]').content;

authBtn.onclick = (event) => {
  event.preventDefault();

  let data = {
    'user': userInput.value,
    'password': passwordInput.value,
  }

  axios.post(`${baseUrl}login`, data)
    .then((response) => {
      if(response.data.success === true) {
        window.location.replace(baseUrl);
        alert(response.data.message)
      }else {
        console.log(response.data)
        alert(response.data.message)
      }
    })
    .catch((err) => console.error(err))
}