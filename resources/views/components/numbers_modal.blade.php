<div class="modal fade" id="{{ $type }}NumbersModal" tabindex="-1" aria-labelledby="{{ $type }}NumbersModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
          @if($type === 'create')
            Agregar otro telefono para el contacto
          @elseif($type === 'edit')
            Editar telefonos del contacto
          @else
            Eliminar telefonos del contacto
          @endif
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ $type === 'create'? route('create-phone', $contact_id) : route('edit-phone', $contact_id) }}" method="POST">
          @csrf()
          @if($type === 'create')
            @method('POST')
            <input
              type="text"
              class="form-control mb-2"
              placeholder="Agregar Telefono"
              name="phone"
              required
            >
            <input
              type="text"
              class="form-control mb-2"
              placeholder="Descripcion del Telefono"
              name="desc"
              required
            >
          @elseif($type === 'edit')
            @method('PUT')
            @foreach($contact->phones as $phone)
              <input
                type="text"
                class="form-control mb-2"
                placeholder="Nro de Telefono"
                name="phone[]"
                value="{{ $phone->tel_nro }}"
              >
              <input
                type="text"
                class="form-control mb-4"
                placeholder="Descripcion del Telefono"
                name="desc[]"
                value="{{ $phone->tel_des }}"
              >
              <input type="hidden" name="phoneId[]" value="{{ $phone->tel_id }}">
            @endforeach
          @endif
          @if($type != 'delete')
            <button type="submit" class="btn btn-primary mt-4" >Guardar</button>
          @endif
        </form>
        @if($type == 'delete')
          @foreach($contact->phones as $phone)
            <div class="w-100 d-flex items-center justify-content-between mb-4 flex-wrap">
              <h5 class="p-0 m-0 text-truncate">{{ $phone->tel_nro }} - {{ $phone->tel_des }}</h5>
              <a href="{{ route('delete-phone', ['id' => $phone->tel_id, 'contactId' => $contact_id]) }}" class="btn btn-sm p-0 px-2 btn-danger">Eliminar</a>
            </div>
          @endforeach
        @endif
      </div>
    </div>
  </div>
</div>