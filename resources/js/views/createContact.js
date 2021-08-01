const infoEmail = document.getElementById('InfoEmail');
const infoPhone = document.getElementById('InfoPhone');
const addEmailBtn = document.getElementById('addEmail');
const addPhoneBtn = document.getElementById('addPhone');

function createInputs(type1, type2, placeholder1, placeholder2, name1, name2, parent, button) {
  let newInputs = `
    <input
      class="form-control mb-2"
      type="${type1}"
      placeholder="${placeholder1}"
      name="${name1}[]"
      id="${name1}"
      required
    >
    <input
      class="form-control mb-2"
      type="${type2}"
      placeholder="${placeholder2}"
      name="${name2}[]"
      id="${name2}"
      required
    >
  `;

  let div = document.createElement("div");
  div.className = "mt-3"
  div.innerHTML = newInputs;

  parent.insertBefore(div, button);
}

addEmailBtn.onclick = () => {
  createInputs("email", "text", "Otro correo", "Descripcion", "correoDir", "correoDes", infoEmail, addEmailBtn);
}

addPhoneBtn.onclick = () => {
  createInputs("text", "text", "Otro numero", "Descripcion", "telNro", "telDes", infoPhone, addPhoneBtn);
}