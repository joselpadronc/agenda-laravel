@extends('layouts.base')

@section('content')
<section class="container my-5">
    <div class="row mx-auto" style="max-width: 600px;">
        <div class="col mb-4 mx-auto">
            <article class="col-sm mx-auto bg-light py-3 px-4 rounded-lg shadow-sm">
              <div class="d-flex align-items-start justify-content-between">
                <h3 class="fw-bold" id="name">{{ $contact->con_nom }}</h3>
                @userRol(session()->get('user_session')['rol'])
                <div class="d-flex items-center gap-2">
                  <button type="button" class="btn btn-outline-warning btn-sm p-0 px-2 text-dark" data-bs-toggle="modal" data-bs-target="#infoContactModal">
                    Editar
                  </button>
                  <form action="{{ route('delete-contact') }}" method="POST">
                    @csrf()
                    @method('PUT')
                    <input type="hidden" name="contactId" value="{{ $contact->con_id }}">
                    <button type="submit" class="btn btn-sm p-0 px-2 text-danger">
                      Eliminar
                    </button>
                  </form>
                </div>
                @enduserRol
              </div>
              <div class="mt-2">
                <h5 class="fs-6" id="dh"><strong>Direccion de habitacion:</strong> {{ $contact->con_dh }}</h5>
                <h5 class="fs-6" id="dt"><strong>Direccion de trabajo:</strong> {{ $contact->con_dt }}</h5>
              </div>

              <div class="d-flex flex-column align-items-start justify-content-between">
                <!-- Info Numeros -->
                <div class="mt-4">
                  <div class="d-flex align-items-start justify-content-start">
                    <h5 class="fw-bolder me-4">Numeros:</h5>
                    @userRol(session()->get('user_session')['rol'])
                    <button type="button" class="btn btn-outline-warning btn-sm p-0 px-2 me-2 text-dark" data-bs-toggle="modal" data-bs-target="#editNumbersModal">
                      Editar
                    </button>
                    <button type="button" class="btn btn-outline-info btn-sm p-0 px-2 me-2 text-dark" data-bs-toggle="modal" data-bs-target="#createNumbersModal">
                      Agregar
                    </button>
                    <button type="button" class="btn btn-sm p-0 px-2 text-danger" data-bs-toggle="modal" data-bs-target="#deleteNumbersModal">
                      Eliminar
                    </button>
                    @enduserRol
                  </div>
                  <ul>
                  @foreach($contact->phones as $phone)
                    <li>{{ $phone->tel_nro }} - {{ $phone->tel_des }}</li>
                  @endforeach
                  </ul>
                </div>
                <!-- Info Emails -->
                <div class="mt-2">
                  <div class="d-flex align-items-start justify-content-start">
                    <h5 class="fw-bolder me-4">Correos:</h5>
                    @userRol(session()->get('user_session')['rol'])
                    <button type="button" class="btn btn-outline-warning btn-sm p-0 px-2 me-2 text-dark" data-bs-toggle="modal" data-bs-target="#editEmailsModal">
                      Editar
                    </button>
                    <button type="button" class="btn btn-outline-info btn-sm p-0 px-2 me-2 text-dark" data-bs-toggle="modal" data-bs-target="#createEmailsModal">
                      Agregar
                    </button>
                    <button type="button" class="btn btn-sm p-0 px-2 text-danger" data-bs-toggle="modal" data-bs-target="#deleteEmailsModal">
                      Eliminar
                    </button>
                    @enduserRol
                  </div>
                  <ul>
                  @foreach($contact->emails as $email)
                    <li>{{ $email->cor_dir }} - {{ $email->cor_des }}</li>
                  @endforeach
                  </ul>
                </div>
              </div>
            </article>
        </div>
    </div>
</section>


@include('components.edit_contact_modal', ['contact' => $contact])
<!-- Emails -->
@include('components.emails_modal', ['contact_id' => $contact->con_id, 'emails' => $contact->emails, 'type'=>'edit'])
@include('components.emails_modal', ['contact_id' => $contact->con_id, 'type'=>'create'])
@include('components.emails_modal', ['contact_id' => $contact->con_id, 'emails' => $contact->emails, 'type'=>'delete'])
<!-- Telefonos -->
@include('components.numbers_modal', ['contact_id' => $contact->con_id, 'phones' => $contact->phones, 'type'=>'edit'])
@include('components.numbers_modal', ['contact_id' => $contact->con_id, 'phones' => $contact->phones, 'type'=>'create'])
@include('components.numbers_modal', ['contact_id' => $contact->con_id, 'phones' => $contact->phones, 'type'=>'delete'])

@endsection
