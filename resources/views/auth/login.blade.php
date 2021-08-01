@extends('layouts.base')

@section('content')
<section class="container my-5">
    <h2 class="text-center font-weight-bolder mb-5">Iniciar sesion</h2>
    <div class="row mx-auto" style="max-width: 400px;">
        <div class="col mb-4 mx-auto">
            <article class="col-sm mx-auto bg-light py-3 px-4 rounded-lg shadow-sm">
                <form class="mt-4 form-group" action="{{ route('auth-login') }}" method="POST">
                    @csrf()
                    @method('POST')
                    <input
                        class="form-control"
                        type="text"
                        placeholder="Nombre de usuario"
                        name="user"
                        id="user"
                        required
                    >
                    <input
                        class="form-control mt-2"
                        type="password"
                        placeholder="Contraseña"
                        name="password"
                        id="password"
                        required
                    >
                    <button type="submit" class="btn btn-primary btn-block mt-4 mx-auto" id="auth">Entrar</button>
                </form>
            </article>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script src="{{ asset('/js/auth.js') }}"></script>
@endsection