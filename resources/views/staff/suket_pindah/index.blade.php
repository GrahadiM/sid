{{-- Extends layout --}}
@extends('layouts.adm.base')

{{-- Styles --}}
@push('style')

    <!-- Select2 -->
	<link rel="stylesheet" href="{{ asset('admin') }}/plugins/select2/css/select2.min.css">
	<link rel="stylesheet" href="{{ asset('admin') }}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

@endpush

{{-- Content --}}
@section('content')

<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-file"></i> {{ $title }}</h3>
	</div>
	<form action="{{ route('staff.cetak_suket_pindah.index') }}" method="GET" enctype="multipart/form-data">
		<div class="card-body">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Penduduk</label>
				<div class="col-sm-6">
					<select name="penduduk_id" id="penduduk_id" class="form-control select2 select2bs4" required>
						<option value="" selected>-- Pilih Data --</option>
                        @forelse ($data as $item)
                            <option value="{{ $item->penduduk->id }}">{{ $item->penduduk->name }}</option>
                        @empty
						    <option value="" selected>Data Tidak Tersedia</option>
                        @endforelse
                    </select>
				</div>
			</div>
		</div>
		<div class="card-footer">
			<button type="submit" class="btn btn-info" target="_blank">Cetak Surat</button>
		</div>
	</form>
</div>

@endsection

{{-- Script --}}
@push('scripts')

    <!-- Select2 -->
    <script src="{{ asset('admin') }}/plugins/select2/js/select2.full.min.js"></script>
    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        })
    </script>

@endpush
