{{-- Extends layout --}}
@extends('layouts.adm.base')

{{-- Styles --}}
@push('style')

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('admin') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

@endpush

{{-- Script --}}
@push('scripts')

    <!-- DataTables  & Plugins -->
    <script src="{{ asset('admin') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/jszip/jszip.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="{{ asset('admin') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                "buttons": ["excel", "pdf", "print", "colvis"],
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>

@endpush

{{-- Content --}}
@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $title }}</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>TTL</th>
                        <th>File KTP</th>
                        <th>File KK</th>
                        <th>Status Pengajuan</th>
                        <th>Tanggal Kejadian</th>
                        <th>Alasan Kejadian</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key => $dt)
                        <tr>
                            <td>{{ $dt->nik }}</td>
                            <td>{{ Str::ucfirst($dt->name) }}</td>
                            <td>{{ Str::ucfirst($dt->category) }}</td>
                            <td>{{ Str::ucfirst($dt->bop) . ' - ' . Carbon\Carbon::parse($dt->bod)->isoFormat('D MMMM Y') }}
                            </td>
                            <td>
                                <a href="{{ asset('storage/' . $dt->ktp) }}" target="_blank" rel="noopener noreferrer">File
                                    KTP</a>
                            </td>
                            <td>
                                <a href="{{ asset('storage/' . $dt->kk) }}" target="_blank" rel="noopener noreferrer">File
                                    KK</a>
                            </td>
                            <td>
                                @if ($dt->status == 'diterima')
                                    <a class="btn btn-sm btn-primary" href="{{ route('staff.cetak_surat_keterangan.index') }}" onclick="event.preventDefault(); document.getElementById('cetak').submit();">
                                        {{ Str::upper($dt->status) }}
                                    </a>
                                    <form id="cetak" action="{{ route('staff.cetak_surat_keterangan.index') }}" method="GET" class="d-none">
                                        <input type="hidden" name="id" value="{{ $dt->id }}">
                                        <input type="hidden" name="category" value="{{ $dt->category }}">
                                    </form>
                                @else
                                    <button class="btn btn-sm btn-warning" disabled>{{ Str::upper($dt->status) }}</button>
                                @endif
                            </td>
                            <td>{{ Carbon\Carbon::parse($dt->date)->isoFormat('D MMMM Y') }}</td>
                            <td>{{ Str::ucfirst($dt->reason) }}</td>
                            <td class="text-center">
                                <form action="{{ route('staff.submission_letter.update', $dt->id) }}" method="POST">
                                    @method('PUT')
                                    @csrf

                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-primary btn-sm" name="status"
                                            value="diterima">
                                            <i class="fas fa-check"></i>
                                        </button>
                                    </div>
                                </form>

                                <form action="{{ route('staff.submission_letter.update', $dt->id) }}" method="POST">
                                    @method('PUT')
                                    @csrf

                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-danger btn-sm" name="status" value="ditolak">
                                            <i class="fas fa-ban"></i>
                                        </button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>TTL</th>
                        <th>File KTP</th>
                        <th>File KK</th>
                        <th>Status Pengajuan</th>
                        <th>Tanggal Kejadian</th>
                        <th>Alasan Kejadian</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

@endsection
