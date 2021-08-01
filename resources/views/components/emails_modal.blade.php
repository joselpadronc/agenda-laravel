<div class="modal fade" id="{{ $type }}EmailsModal" tabindex="-1" aria-labelledby="{{ $type }}EmailsModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
          @if($type === 'create')
            Agregar otro correo para el contacto
          @else
            Editar correos del contacto
          @endif
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ $type === 'create'? route('create-email', $contact_id) : route('edit-email', $contact_id) }}" method="POST">
          @csrf()
          @if($type === 'create')
            @method('POST')
            <input
              type="email"
              class="form-control mb-2"
              placeholder="Agregar Correo"
              name="email"
              required
            >
            <input
              type="text"
              class="form-control mb-2"
              placeholder="Descripcion del Correo"
              name="desc"
              required
            >
          @elseif($type === 'edit')
            @method('PUT')
            @foreach($contact->emails as $email)
              <input
                type="email"
                class="form-control mb-2"
                placeholder="Agregar Correo"
                name="email[]"
                value="{{ $email->cor_dir }}"
              >
              <input
                type="text"
                class="form-control mb-4"
                placeholder="Descripcion del Correo"
                name="desc[]"
                value="{{ $email->cor_des }}"
              >
              <input type="hidden" name="emailId[]" value="{{ $email->cor_id }}">
            @endforeach
          @endif
          @if($type != 'delete')
            <button type="submit" class="btn btn-primary mt-4" >Guardar</button>
          @endif
          @if($type == 'delete')
          @foreach($contact->emails as $email)
            <div class="w-100 d-flex items-center justify-content-between mb-4 flex-wrap">
              <h5 class="p-0 m-0 text-truncate">{{ $email->cor_dir }} - {{ $email->cor_des }}</h5>
              <a
                href="{{ route('delete-email', ['id' => $email->cor_id, 'contactId' => $contact_id]) }}"
                class="btn btn-sm p-0 px-2 btn-danger"
              >
                Eliminar
              </a>
            </div>
          @endforeach
        @endif
        </form>
      </div>
    </div>
  </div>
</div>