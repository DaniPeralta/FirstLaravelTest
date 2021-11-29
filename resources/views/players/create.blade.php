@extends('adminlte')

@section('content')

    @php
        $state = 'Crear';
    @endphp
    <div class="container">
    @if($player ?? '')
        <div class="row">
            <div class="col-md-4">
                <img src="{{ asset('img/'.$player->photo) }}" class="img-circle" width="100" height="100">
            </div>
            <div class="col-md-1 offset-7">
                <form action="{{ route('players.destroy', [$player->id]) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger my-2" @if($readonly ?? '') disabled @endif >Eliminar</button>
                </form>
            </div>
        </div>

        <form  method="POST" action="{{route('players.update',['player' => $player->id])}}" enctype="multipart/form-data">
        @method('PUT')
            @php
                $state = 'Actualizar';
            @endphp

    @else
        <form  method="POST" action="{{route('players.store')}}" enctype="multipart/form-data">
    @endif
    @csrf
            <div class="mb-3 col">
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                @if (session('success'))
                    <h6 class="alert alert-success">{{ session('success') }}</h6>
                @endif

                <label for="dni" class="form-label">DNI</label>
                <input type="text" class="form-control mb-2" name="dni" id="dni" placeholder="DNI..." value="{{ $player->dni ?? '' }}" {{ $readonly ?? '' }}>

                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control mb-2" name="name" id="name" placeholder="Nombre..." value="{{ $player->name ?? ''}}" {{ $readonly ?? '' }}>

                <label for="surname" class="form-label">Apellido</label>
                <input type="text" class="form-control mb-2" name="surname" id="surname" placeholder="Apellidos..." value="{{ $player->surname ?? ''}}" {{ $readonly ?? '' }}>

                <label for="phone" class="form-label">Teléfono</label>
                <input type="text" class="form-control mb-2" name="phone" id="phone" placeholder="Teléfono..." value="{{ $player->phone ?? ''}}" {{ $readonly ?? '' }}>

                <label for="street" class="form-label">Dirección</label>
                <input type="text" class="form-control mb-2" name="street" id="street" placeholder="Dirección..." value="{{ $player->street ?? ''}}" {{ $readonly ?? '' }}>

                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control mb-2" name="email" id="email" placeholder="Email..." value="{{ $player->email ?? ''}}" {{ $readonly ?? '' }}>

                <label for="photo" class="form-label">Subir una foto</label>
                <br>
                <input type="file" name="photo" label="Subir una foto" value="{{ $player->photo ?? '' }}">
                <br>
                <input type="submit" value="{{$state}} Jugador" class="btn btn-primary my-2" @if($readonly ?? '') disabled @endif />
            </div>
        </form>
    </div>

@endsection
