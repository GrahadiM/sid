{{-- Extends layout --}}
@extends('layouts.adm.base')

{{-- Styles --}}
@push('style')

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('admin') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

@endpush

{{-- Content --}}
@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ $title }}</h3>
        <div class="card-tools">
            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambahDataModal">
                {{ __('Tambahkan ').$title }}
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Alasan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $key => $dt)
                <tr>
                    <td>{{ $dt->penduduk->nik }}</td>
                    <td>{{ $dt->penduduk->name }}</td>
                    <td>{{ Carbon\Carbon::parse($dt->date)->isoFormat('D MMMM Y') }}</td>
                    <td>{{ $dt->reason }}</td>
                    <td class="row text-center">
                        <div class="col">
                            <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editDataModal{{ $dt->id }}">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                        </div>
                        <div class="col">
                            <a class="btn btn-danger btn-sm" href="{{ route('staff.data_pindah.destroy', $dt->id) }}" onclick="event.preventDefault(); document.getElementById('delete-form{{ $dt->id }}').submit();">
                                <i class="fas fa-trash"></i>
                            </a>
                            <form id="delete-form{{ $dt->id }}" action="{{ route('staff.data_pindah.destroy', $dt->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>
                    </td>
                </tr>

                <!-- Modal Edit Data -->
                <div class="modal fade" id="editDataModal{{ $dt->id }}" tabindex="-1" role="dialog" aria-labelledby="editDataModalLabel{{ $dt->id }}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editDataModalLabel{{ $dt->id }}">Edit Data</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Form edit data di sini -->
                                <form action="{{ route('staff.data_pindah.update', $dt->id) }}" method="POST">
                                    @method('PUT')
                                    @csrf

                                    <div class="form-group">
                                        <label for="penduduk_id">Penduduk</label>
                                        <select name="penduduk_id" id="penduduk_id" class="form-control" required>
                                            <option value="{{ $dt->penduduk_id }}">{{ $dt->penduduk->name }}</option>
                                            @foreach ($penduduk as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="date">Tanggal Lahir</label>
                                        <input type="date" name="date" class="form-control" value="{{ $dt->date }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="reason">Sebab</label>
                                        <input type="text" name="reason" class="form-control" value="{{ $dt->reason }}" required>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <tr>
                    <td colspan="5" class="text-center font-weight-bold">Data Tidak Tersedia!</td>
                </tr>
                @endforelse
            </tbody>
            <tfoot>
                <tr>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Alasan</th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<!-- Modal Tambah Data -->
<div class="modal fade" id="tambahDataModal" tabindex="-1" role="dialog" aria-labelledby="tambahDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahDataModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form tambah data di sini -->
                <form action="{{ route('staff.data_pindah.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="penduduk_id">Penduduk</label>
                        <select name="penduduk_id" id="penduduk_id" class="form-control" required>
                            <option selected>-- Pilih --</option>
                            @foreach ($penduduk as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="date">Tanggal Lahir</label>
                        <input type="date" name="date" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="reason">Sebab</label>
                        <input type="text" name="reason" class="form-control" required>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

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
    $(function () {
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
