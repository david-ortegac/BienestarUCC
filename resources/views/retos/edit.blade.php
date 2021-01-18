@extends('layouts.app')

@section('content')
    <div class="container p-4">

        <h1 align="center" style="font-weight: bold; color: darkgoldenrod " class="p-4">** RETOS **</h1>

        {!! Form::model($reto, ['route' => ['retos.update', $reto->slug], 'method' => 'put']) !!}

        <div class="form-group mb3">
            {!! Form::label('nombre', 'Nombre del reto:') !!}
            {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
            @error('nombre')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group mb3">
            {!! Form::label('slug', 'slug') !!}
            {!! Form::text('slug', null, ['class' => 'form-control', 'readonly']) !!}
        </div>

        <div class="form-group mb3">
            {!! Form::label('name', 'Descripcion del Reto:') !!}
            {!! Form::textarea('descripcion', null, ['class' => 'form-control']) !!}
            @error('descripcion')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group mb3">
            {!! Form::label('name', 'Link de consulta:') !!}
            {!! Form::url('link', null, ['class' => 'form-control']) !!}
            @error('link')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group mb3">
            <a href="{{ route('retos.index') }}" class="btn btn-info">Volver</a>
            {!! Form::submit('Actualizar Reto', ['class' => 'btn btn-success']) !!}
        </div>

        {!! Form::close() !!}

    </div>

@endsection

@section('js')

    @if (session('edited') == 'ok')
        <script>
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'El Reto se ha sido editado',
                showConfirmButton: false,
                timer: 1500
            })

        </script>
    @endif

    <script src="{{ asset('js/jquery.stringToSlug.min.js') }}"></script>

    <script>
            $("#nombre").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
    </script>

@endsection
