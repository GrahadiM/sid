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
                @forelse ($data as $dt)
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
                            <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#showDataModal{{ $dt->id }}">
                                <i class="fas fa-search"></i>
                            </a>
                        </div>
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
                                        <label for="kk_id">Kartu Keluarga</label>
                                        <select name="kk_id" id="kk_id" class="form-control" required>
                                            <option selected>-- Pilih Kartu Keluarga --</option>
                                            @foreach ($kk as $item)
                                                <option value="{{ $item->penduduk->id }}">{{ $item->penduduk->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="penduduk_id">Kepala Keluarga</label>
                                        <select name="penduduk_id" id="penduduk_id" class="form-control" required>
                                            <option selected>-- Pilih Kepala Keluarga --</option>
                                            @foreach ($penduduk as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="hubungan">Hubungan</label>
                                        <select name="hubungan" id="hubungan" class="form-control" required>
                                            <option selected>-- Pilih Hubungan --</option>
                                            <option value="Kepala Keluarga">Kepala Keluarga</option>
                                            <option value="Istri">Istri</option>
                                            <option value="Anak">Anak</option>
                                            <option value="Orang Tua">Orang Tua</option>
                                            <option value="Mertua">Mertua</option>
                                            <option value="Menantu">Menantu</option>
                                            <option value="Cucu">Cucu</option>
                                            <option value="Famili">Famili Lain</option>
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
                        <label for="kk_id">Kartu Keluarga</label>
                        <select name="kk_id" id="kk_id" class="form-control" required>
                            <option selected>-- Pilih Kartu Keluarga --</option>
                            @foreach ($kk as $item)
                                <option value="{{ $item->penduduk->id }}">{{ $item->penduduk->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="penduduk_id">Kepala Keluarga</label>
                        <select name="penduduk_id" id="penduduk_id" class="form-control" required>
                            <option selected>-- Pilih Kepala Keluarga --</option>
                            @foreach ($penduduk as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="hubungan">Hubungan</label>
                        <select name="hubungan" id="hubungan" class="form-control" required>
                            <option selected>-- Pilih Hubungan --</option>
                            <option value="Kepala Keluarga">Kepala Keluarga</option>
                            <option value="Istri">Istri</option>
                            <option value="Anak">Anak</option>
                            <option value="Orang Tua">Orang Tua</option>
                            <option value="Mertua">Mertua</option>
                            <option value="Menantu">Menantu</option>
                            <option value="Cucu">Cucu</option>
                            <option value="Famili">Famili Lain</option>
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
