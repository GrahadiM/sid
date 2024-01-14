@extends('layouts.adm.base')
@section('title', $title)

@push('style')
@endpush

@push('scripts')
@endpush

@section('content')

    {!! Form::model($announcement, ['method' => 'PATCH', 'route' => ['staff.announcement.update', $announcement->id]]) !!}
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Data</h3>
            <div class="card-tools">
                <a href="{{ route('staff.dashboard') }}" class="btn btn-danger btn-sm">Kembali</a>
            </div>
        </div>
        <div class="card-body">
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
