@extends('layouts.base')

@section('content')
<section class="container my-5">
    <h2 class="text-center font-weight-bolder mb-5">Contactos</h2>
    <div class="w-100 mb-4 d-flex flex-wrap gap-2 justify-content-between">
      <form class="d-flex" action="{{ route('home') }}" method="GET">
        <input class="form-control me-2" type="text" placeholder="Buscar por nombre" name="con_name">
        <button class="btn btn-outline-success" type="submit">Buscar</button>
      </form>
      @userRol(session()->get('user_session')['rol'])
      <a href="{{ route('create-contact') }}" class="btn btn-primary">
        Crear Contacto
      </a>
      @enduserRol
    </div>
    <article class="p-4 bg-light rounded-3 overflow-auto">
      @if(count($contacts) != 0)
      <table class="table w-100" style="min-width: 1000px;">
        <thead>
          <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Nro Telefonico</th>
            <th scope="col">Correo</th>
            <th scope="col">Dirección</th>
            <th scope="col">Acción</th>
          </tr>
        </thead>
        <tbody>
            @foreach($contacts as $contact)
              <tr>
                <td class="text-truncate">
                  {{ isset($contact->con_nom) ? $contact->con_nom : 'No tiene'}}
                </td>
                <td class="text-truncate">
                  {{ isset($contact->phone) ? $contact->phone->tel_nro : 'No tiene'}}
                </td>
                <td class="text-truncate">
                  {{ isset($contact->email) ? $contact->email->cor_dir : 'No tiene'}}
                </td>
                <td class="text-truncate">
                  {{ isset($contact->con_dh) ? $contact->con_dh : 'No tiene'}}
                </td>
                <td>
                  <a href="{{ route('detail-contact', $contact->con_id) }}" class="btn btn-sm btn-primary">Ver</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      @else
        <tr><h4>No hay informacion</h4></tr>
      @endif
    </article>
</section>

@endsection