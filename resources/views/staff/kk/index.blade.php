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
                    <th>No Kartu Keluarga</th>
                    <th>Kepala Keluarga</th>
                    <th>Desa</th>
                    <th>Dusun</th>
                    <th>Kecamatan</th>
                    <th>Kabupaten</th>
                    <th>Provinsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $dt)
                <tr>
                    <td>{{ Str::upper($dt->no) }}</td>
                    <td>{{ Str::upper($dt->penduduk->name) }}</td>
                    <td>{{ Str::upper($dt->desa) }}</td>
                    <td>{{ Str::upper($dt->dusun) }}</td>
                    <td>{{ Str::upper($dt->kec) }}</td>
                    <td>{{ Str::upper($dt->kab) }}</td>
                    <td>{{ Str::upper($dt->prov) }}</td>
                    <td class="row text-center">
                        <div class="col">
                            <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editDataModal{{ $dt->id }}">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                        </div>
                        <div class="col">
                            <a class="btn btn-danger btn-sm" href="{{ route('staff.kartu_keluarga.destroy', $dt->id) }}" onclick="event.preventDefault(); document.getElementById('delete-form{{ $dt->id }}').submit();">
                                <i class="fas fa-trash"></i>
                            </a>
                            <form id="delete-form{{ $dt->id }}" action="{{ route('staff.kartu_keluarga.destroy', $dt->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>
                    </td>
                </tr>

                <!-- Modal Show Data -->
                <div class="modal fade" id="showDataModal{{ $dt->id }}" tabindex="-1" role="dialog" aria-labelledby="showDataModalLabel{{ $dt->id }}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="showDataModalLabel{{ $dt->id }}">Detail Data</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Form edit data di sini -->
                                <form action="#" method="POST">
                                    <div class="form-group">
                                        <label for="no">Nomer KK</label>
                                        <input type="number" name="no" class="form-control" value="{{ $dt->no }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="dusun">Dusun</label>
                                        <input type="text" name="dusun" class="form-control" value="{{ $dt->dusun }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="desa">Desa</label>
                                        <input type="text" name="desa" class="form-control" value="{{ $dt->desa }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="kec">Kecamatan</label>
                                        <input type="text" name="kec" class="form-control" value="{{ $dt->kec }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="kab">Kabupaten</label>
                                        <input type="text" name="kab" class="form-control" value="{{ $dt->kab }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="prov">Provinsi</label>
                                        <input type="text" name="prov" class="form-control" value="{{ $dt->prov }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="penduduk_id">Kepala Keluarga</label>
                                        <select name="penduduk_id" id="penduduk_id" class="form-control" disabled>
                                            <option value="{{ $dt->penduduk_id }}">{{ $dt->penduduk->name }}</option>
                                            @foreach ($penduduk as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

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
                                <form action="{{ route('staff.kartu_keluarga.update', $dt->id) }}" method="POST">
                                    @method('PUT')
                                    @csrf

                                    <div class="form-group">
                                        <label for="no">Nomer KK</label>
                                        <input type="number" name="no" class="form-control" value="{{ $dt->no }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="dusun">Dusun</label>
                                        <input type="text" name="dusun" class="form-control" value="{{ $dt->dusun }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="desa">Desa</label>
                                        <input type="text" name="desa" class="form-control" value="{{ $dt->desa }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="kec">Kecamatan</label>
                                        <input type="text" name="kec" class="form-control" value="{{ $dt->kec }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="kab">Kabupaten</label>
                                        <input type="text" name="kab" class="form-control" value="{{ $dt->kab }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="prov">Provinsi</label>
                                        <input type="text" name="prov" class="form-control" value="{{ $dt->prov }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="penduduk_id">Kepala Keluarga</label>
                                        <select name="penduduk_id" id="penduduk_id" class="form-control" required>
                                            <option value="{{ $dt->penduduk_id }}">{{ $dt->penduduk->name }}</option>
                                            @foreach ($penduduk as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
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
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>No Kartu Keluarga</th>
                    <th>Kepala Keluarga</th>
                    <th>Desa</th>
                    <th>Dusun</th>
                    <th>Kecamatan</th>
                    <th>Kabupaten</th>
                    <th>Provinsi</th>
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
                <form action="{{ route('staff.kartu_keluarga.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="no">Nomer KK</label>
                        <input type="number" name="no" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="dusun">Dusun</label>
                        <input type="text" name="dusun" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="desa">Desa</label>
                        <input type="text" name="desa" class="form-control" value="Aek Nabara" required>
                    </div>
                    <div class="form-group">
                        <label for="kec">Kecamatan</label>
                        <input type="text" name="kec" class="form-control" value="Simangumban" required>
                    </div>
                    <div class="form-group">
                        <label for="kab">Kabupaten</label>
                        <input type="text" name="kab" class="form-control" value="Tapanuli Utara" required>
                    </div>
                    <div class="form-group">
                        <label for="prov">Provinsi</label>
                        <input type="text" name="prov" class="form-control" value="Sumatera Utara" required>
                    </div>
                    <div class="form-group">
                        <label for="penduduk_id">Kepala Keluarga</label>
                        <select name="penduduk_id" id="penduduk_id" class="form-control" required>
                            <option selected>-- Pilih --</option>
                            @foreach ($penduduk as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
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
