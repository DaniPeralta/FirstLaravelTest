@extends('adminlte')

@section('content')

    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    @if (session('success'))
        <h6 class="alert alert-success">{{ session('success') }}</h6>
    @endif

    <div class="jumbotron">
        <div class="container">
            <p>Bienvenidos a la aplicación de gestión del Club Balonmano Gades</p>
            <div class="row offset-md-4 col-md-4 col-md-4">
                <img src="vendor/adminlte/dist/img/gades.png" class="img-rounded" width="200" height="200">
            </div>
        </div>
    </div>

@endsection
