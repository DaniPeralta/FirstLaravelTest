@extends('adminlte')

@section('content')

    {{-- Setup data for datatables --}}
    @php
        $heads = [
            'Foto',
            'Nombre',
            'Apellidos',
            'Email',
            'Phone',
            ''
        ];
    @endphp

    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    @if (session('success'))
        <h6 class="alert alert-success">{{ session('success') }}</h6>
    @endif

    <div class="row">
        <div class="col-md-4">
            <a href="{{ route('players.create') }}"><x-adminlte-info-box text="Nuevo Jugador" icon="fas fa-lg fa-user-plus" theme="gradient-success" /></a>
        </div>
        <div class="col-md-4 offset-md-4" >
            <x-adminlte-info-box title="{{ count($players) }}" text="Jugadores del club" icon="fas fa-lg fa-user" theme="gradient-primary" />
        </div>
    </div>


    <x-adminlte-datatable id="table1" :heads="$heads">
        @foreach($players as $player)
            <tr>

                <td><img src="{{ asset('img/'.$player->photo) }}" class="img-circle" width="80" height="80"></td>
                <td>{{ $player->name }}</td>
                <td>{{ $player->surname }}</td>
                <td>{{ $player->email }}</td>
                <td>{{ $player->phone }}</td>
                <td>
                    <nobr>
                        <a href="{{ route('players.show', $player->id ) }}">
                            <button class="btn btn-xs btn-info mx-1" title="Detalles">
                                Mostrar Detalles
                            </button>
                        </a>
                        <a href="{{ route('players.edit', $player->id ) }}">
                            <button class="btn btn-xs btn-primary mx-1" title="Edit">
                                Actualizar
                            </button>
                        </a>
                    </nobr>
                </td>
            </tr>
        @endforeach
    </x-adminlte-datatable>


@endsection
