@extends('layouts.base')

@section('content')
<section class="container my-5">
    <h2 class="text-center font-weight-bolder mb-5 fw-bold">Nuevo contacto</h2>
    <div class="row mx-auto" style="max-width: 550px;">
        <div class="col mb-4 mx-auto">
            <article class="col-sm mx-auto bg-light py-3 px-4 rounded-lg shadow-sm">
              <form class="mt-4 form-group" action="{{ route('save-contact') }}" method="POST">
                  @csrf()
                  <div id="InfoContact">
                    <h4 class="mb-2 fw-bolder text-left fs-5">Información de Contacto</h4>
                    <input
                      class="form-control mb-2"
                      type="text"
                      placeholder="Nombre"
                      name="name"
                      id="name"
                      required
                    >
                    <input
                      class="form-control mb-2"
                      type="text"
                      placeholder="Direccion de habitacion"
                      name="dh"
                      id="dh"
                      required
                    >
                    <input
                      class="form-control mb-2"
                      type="text"
                      placeholder="Direccion de trabajo (opcional)"
                      name="dt"
                      id="dt"
                    >
                  </div>
                  <!-- Correo -->
                  <div class="mt-4" id="InfoEmail">
                    <h4 class="mb-2 fw-bolder text-left fs-5">Información de Correo</h4>
                    <input
                      class="form-control mb-2"
                      type="email"
                      placeholder="Correo"
                      name="correoDir[]"
                      id="correoDir"
                      required
                    >
                    <input
                      class="form-control mb-2"
                      type="text"
                      placeholder="Descripcion"
                      name="correoDes[]"
                      id="correoDes"
                      required
                    >
                    <button type="button" class="btn btn-sm" id="addEmail">
                      Agregar otro
                    </button>
                  </div>
                  <!-- Telefono -->
                  <div class="mt-4" id="InfoPhone">
                    <h4 class="mb-2 fw-bolder text-left fs-5">Información de Telefono</h4>
                    <input
                      class="form-control mb-2"
                      type="text"
                      placeholder="Nro de telefono"
                      name="telNro[]"
                      id="telNro"
                      required
                    >
                    <input
                      class="form-control mb-2"
                      type="text"
                      placeholder="Descripcion"
                      name="telDes[]"
                      id="telDes"
                      required
                    >
                    <button type="button" class="btn btn-sm" id="addPhone">
                      Agregar otro
                    </button>
                  </div>
                  <div class="w-100 d-flex justify-content-between align-items-center">
                    <a href="{{ route('home') }}" class="btn btn-outline-primary btn-block mt-4">Cancelar</a>
                    <button type="submit" class="btn btn-primary btn-block mt-4" id="saveBtn">Guardar</button>
                  </div>
              </form>
            </article>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script src="{{ asset('/js/views/createContact.js') }}"></script>
@endsection