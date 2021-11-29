@extends('adminlte')

@section('content')
    <div class="container w-25 border p-4">
        <div class="row mx-auto">
            <form  method="POST" action="{{route('players.update',['player' => $player->id])}}">
                @method('PUT')
                @csrf

                <div class="mb-3 col">

                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    @if (session('success'))
                        <h6 class="alert alert-success">{{ session('success') }}</h6>
                    @endif

                    <label for="category_id" class="form-label">DNI</label>
                    <input type="text" class="form-control mb-2" name="dni" id="exampleFormControlInput1" placeholder="DNI..." value="{{ $player->dni }}">

                    <label for="title" class="form-label">Nombre</label>
                    <input type="text" class="form-control mb-2" name="name" id="exampleFormControlInput1" placeholder="Nombre..." value="{{ $player->name }}">

                    <label for="category_id" class="form-label">Apellido</label>
                    <input type="text" class="form-control mb-2" name="surname" id="exampleFormControlInput1" placeholder="Apellidos..." value="{{ $player->surname }}">

                    <label for="category_id" class="form-label">Teléfono</label>
                    <input type="text" class="form-control mb-2" name="phone" id="exampleFormControlInput1" placeholder="Teléfono..." value="{{ $player->phone }}">

                    <label for="category_id" class="form-label">Dirección</label>
                    <input type="text" class="form-control mb-2" name="street" id="exampleFormControlInput1" placeholder="Dirección..." value="{{ $player->street }}">

                    <label for="category_id" class="form-label">Email</label>
                    <input type="text" class="form-control mb-2" name="email" id="exampleFormControlInput1" placeholder="Email..." value="{{ $player->email }}">

                    <input type="submit" value="Actualizar tarea" class="btn btn-primary my-2" />
                </div>
            </form>
        </div>
@endsection
