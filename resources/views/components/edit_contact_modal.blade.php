<div class="modal fade" id="infoContactModal" tabindex="-1" aria-labelledby="infoContactModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="infoContactModalLabel">Editar infromacion del contacto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('edit-contact', $contact->con_id) }}" method="POST">
          @csrf()
          @method('PUT')
          <input
            type="text"
            class="form-control mb-2"
            placeholder="Nombre"
            value="{{ $contact->con_nom }}"
            name="inputName"
            id="inputName"
          >
          <input
            type="text"
            class="form-control mb-2"
            placeholder="Direccion de habitacion"
            value="{{ $contact->con_dh }}"
            name="inputDh"
            id="inputDh"
          >
          <input
            type="text"
            class="form-control mb-2"
            placeholder="Direccion de trabajo"
            value="{{ $contact->con_dt }}"
            name="inputDt"
            id="inputDt"
          >
          <button type="submit" class="btn btn-primary mt-4" id="save">Guardar</button>
        </form>
      </div>
    </div>
  </div>
</div>

@section('scripts')
<script>
  let contactName = document.getElementById('inputName');
  let contactDh = document.getElementById('inputDh');
  let contactDt = document.getElementById('inputDt');
  let saveBtn = document.getElementById('save');
  let modalCloseBtn = document.getElementsByClassName('btn-close')[0];

  let contactId = {{ $contact->con_id }};
  let baseUrl = document.querySelector('meta[name="base-url"]').content;

  let currentName = "{{ $contact->con_nom }}";
  let currentDh = "{{ $contact->con_dh }}";
  let currentDt = "{{ $contact->con_dt }}";

  saveBtn.onclick = (event) => {
    event.preventDefault()
    if(contactName.value === currentName && contactDh.value === currentDh && contactDt.value === currentDt){
      alert('No ha realizado ninguna modificación');
    }else {
      data = {
        'name': contactName.value,
        'dh': contactDh.value,
        'dt': contactDt.value,
      }

      saveBtn.disabled = true;

      axios.put(`${baseUrl}contacts/${contactId}/edit`, data)
        .then((response) => {
          if(response.data.success === true) {
            document.getElementById('name').innerHTML = response.data.res.con_nom;
            document.getElementById('dh').innerHTML = `
              <strong>Direccion de habitacion:</strong> ${response.data.res.con_dh}
            `;
            document.getElementById('dt').innerHTML = `
              <strong>Direccion de trabajo:</strong> ${response.data.res.con_dt}
            `;
            modalCloseBtn.click()
            currentName = response.data.res.con_nom;
            currentDh = response.data.res.con_dh;
            currentDt = response.data.res.con_dt;
            saveBtn.disabled = false;
          }else {
            console.log(response.data);
          }
        })
        .catch((err) => console.log(err));
    }
  }
</script>
@endsection