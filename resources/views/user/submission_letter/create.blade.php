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

    {!! Form::open(['route' => 'user.submission_letter.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    @csrf
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Create New Data</h3>
            <div class="card-tools">
                <a href="{{ route('user.submission_letter.index') }}" class="btn btn-danger btn-sm">Kembali</a>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <h5 class="col-md-12 text-center">Biodata</h5>

                <div class="form-group col-md-4">
                    <div class="mb-2"><strong>Nama : </strong></div>
                    {!! Form::text('name', null, ['required', 'placeholder' => 'Nama', 'class' => 'form-control']) !!}
                </div>
                <div class="form-group col-md-4">
                    <div class="mb-2"><strong>NIK : </strong></div>
                    {!! Form::number('nik', null, ['required', 'placeholder' => 'NIK', 'class' => 'form-control']) !!}
                </div>
                <div class="form-group col-md-4">
                    <div class="mb-2"><strong>Tempat Lahir : </strong></div>
                    {!! Form::text('bop', null, ['required', 'placeholder' => 'Tempat Lahir', 'class' => 'form-control']) !!}
                </div>
                <div class="form-group col-md-4">
                    <div class="mb-2"><strong>Tanggal Lahir : </strong></div>
                    {!! Form::date('bod', null, ['required', 'class' => 'form-control']) !!}
                </div>
                <div class="form-group col-md-4">
                    <label for="gender">Jenis Kelamin</label>
                    {!! Form::select(
                        'gender',
                        [
                            'LK' => 'LK',
                            'PR' => 'PR',
                        ],
                        'LK',
                        ['required', 'class' => 'form-control'],
                    ) !!}
                </div>

                <h5 class="col-md-12 text-center">Data Pengajuan</h5>

                <div class="form-group col-md-6">
                    <div class="mb-2"><strong>KTP : </strong></div>
                    {!! Form::file('ktp', ['class' => 'form-control', 'required']) !!}
                </div>
                <div class="form-group col-md-6">
                    <div class="mb-2"><strong>Kartu Keluarga : </strong></div>
                    {!! Form::file('kk', ['class' => 'form-control', 'required']) !!}
                </div>

                <h5 class="col-md-12 text-center">Data Tambahan</h5>

                <div class="form-group col-md-4">
                    <div class="mb-2"><strong>Kategori Kejadian : </strong></div>
                    {{-- {!! Form::text('title', null, ['required', 'placeholder' => 'Judul', 'class' => 'form-control']) !!} --}}
                    {!! Form::select(
                        'category',
                        [
                            'Domisili' => 'Domisili',
                            'Kelahiran' => 'Kelahiran',
                            'Kematian' => 'Kematian',
                            'Pendatang' => 'Pendatang',
                            'Pindahan' => 'Pindahan',
                        ],
                        'Domisili',
                        ['required', 'class' => 'form-control'],
                    ) !!}
                </div>
                <div class="form-group col-md-4">
                    <div class="mb-2"><strong>Tanggal Kejadian : </strong></div>
                    {!! Form::date('date', null, ['required', 'class' => 'form-control']) !!}
                </div>
                <div class="form-group col-md-4">
                    <div class="mb-2"><strong>Alasan : </strong></div>
                    {!! Form::textarea('desc', null, [
                        'required',
                        'placeholder' => 'Alasan',
                        'class' => 'form-control',
                        'rows' => 4,
                        'style' => 'resize:none',
                    ]) !!}
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}

@endsection
