@extends('layouts.adm.base')

@push('style')
@endpush

@push('scripts')
@endpush

@section('content')

    <h3 class="mb-3">{{ $title }}</h3>
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
    @endif

    {!! Form::open(array('route' => 'user.messages.store','method'=>'POST')) !!}
    @csrf
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Create New Data</h3>
            <div class="card-tools">
                <a href="{{ route('user.messages.index') }}" class="btn btn-danger btn-sm">Kembali</a>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <div class="mb-2"><strong>Kategori : </strong></div>
                {{-- {!! Form::text('title', null, ['required', 'placeholder' => 'Judul', 'class' => 'form-control']) !!} --}}
                {!! Form::select('category', array('saran' => 'Saran', 'kritik' => 'Kritik'), 'kritik', ['required', 'class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                <div class="mb-2"><strong>Judul : </strong></div>
                {!! Form::text('title', null, ['required', 'placeholder' => 'Judul', 'class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                <div class="mb-2"><strong>Isi : </strong></div>
                {!! Form::textarea('desc', null, ['required', 'placeholder' => 'Isi', 'class' => 'form-control', 'rows' => 4, 'style' => 'resize:none']) !!}
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
    {!! Form::close() !!}

@endsection
