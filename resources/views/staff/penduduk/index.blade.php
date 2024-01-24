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
            {{-- <a href="{{ route('staff.penduduk.create') }}" class="btn btn-success btn-sm">{{ __('Tambahkan ').$title }}</a> --}}
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
                    <th>Tempat Tanggal Lahir</th>
                    <th>JK</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $item)
                <tr>
                    <td>{{ (int)$item->nik }}</td>
                    <td>{{ Str::ucfirst($item->name) }}</td>
                    <td>{{ Str::ucfirst($item->bop).' - '.Carbon\Carbon::parse($item->bod)->isoFormat('D MMMM Y') }}</td>
                    <td>{{ $item->gender == 'LK' ? 'Laki-laki' : 'Perempuan' }}</td>
                    <td>{{ Str::ucfirst($item->village.' - '.$item->hamlet) }}</td>
                    <td class="row text-center">
                        <div class="col">
                            <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#showDataModal{{ $item->id }}">
                                <i class="fas fa-search"></i>
                            </a>
                        </div>
                        <div class="col">
                            <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editDataModal{{ $item->id }}">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                        </div>
                        <div class="col">
                            <a class="btn btn-danger btn-sm" href="{{ route('staff.penduduk.destroy', $item->id) }}" onclick="event.preventDefault(); document.getElementById('delete-form{{ $item->id }}').submit();">
                                <i class="fas fa-trash"></i>
                            </a>
                            <form id="delete-form{{ $item->id }}" action="{{ route('staff.penduduk.destroy', $item->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>
                    </td>
                </tr>

                <!-- Modal Show Data -->
                <div class="modal fade" id="showDataModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="showDataModalLabel{{ $item->id }}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="showDataModalLabel{{ $item->id }}">Detail Data</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Form edit data di sini -->
                                <form action="#" method="POST">
                                    <div class="form-group">
                                        <label for="nik">NIK</label>
                                        <input type="text" name="nik" class="form-control" value="{{ $item->nik }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Nama</label>
                                        <input type="text" name="name" class="form-control" value="{{ $item->name }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="bop">Tempat Lahir</label>
                                        <input type="text" name="bop" class="form-control" value="{{ $item->bop }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="bod">Tanggal Lahir</label>
                                        <input type="date" name="bod" class="form-control" value="{{ $item->bod }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="gender">Jenis Kelamin</label>
                                        <input type="text" name="gender" class="form-control" value="{{ $item->gender }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="village">Desa</label>
                                        <input type="text" name="village" class="form-control" value="{{ $item->village }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="hamlet">Dusun</label>
                                        <input type="text" name="hamlet" class="form-control" value="{{ $item->hamlet }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="religion">Agama</label>
                                        <input type="text" name="religion" class="form-control" value="{{ $item->religion }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="kawin">Status Pernikahan</label>
                                        <input type="text" name="kawin" class="form-control" value="{{ $item->kawin }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="job">Pekerjaan</label>
                                        <input type="text" name="job" class="form-control" value="{{ $item->job }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status Hidup</label>
                                        <input type="text" name="status" class="form-control" value="{{ $item->status }}" disabled>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Edit Data -->
                <div class="modal fade" id="editDataModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="editDataModalLabel{{ $item->id }}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editDataModalLabel{{ $item->id }}">Edit Data</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Form edit data di sini -->
                                <form action="{{ route('staff.penduduk.update', $item->id) }}" method="POST">
                                    @method('PUT')
                                    @csrf

                                    <div class="form-group">
                                        <label for="nik">NIK</label>
                                        <input type="text" name="nik" class="form-control" value="{{ $item->nik }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Nama</label>
                                        <input type="text" name="name" class="form-control" value="{{ $item->name }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="bop">Tempat Lahir</label>
                                        <input type="text" name="bop" class="form-control" value="{{ $item->bop }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="bod">Tanggal Lahir</label>
                                        <input type="date" name="bod" class="form-control" value="{{ $item->bod }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="gender">Jenis Kelamin</label>
                                        <select name="gender" id="gender" class="form-control" required>
                                            <option value="{{ $item->gender }}" selected>{{ $item->gender }}</option>
                                            <option value="LK">LK</option>
                                            <option value="PR">PR</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="village">Desa</label>
                                        <input type="text" name="village" class="form-control" value="{{ $item->village }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="hamlet">Dusun</label>
                                        <input type="text" name="hamlet" class="form-control" value="{{ $item->hamlet }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="religion">Agama</label>
                                        <input type="text" name="religion" class="form-control" value="{{ $item->religion }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="kawin">Status Pernikahan</label>
                                        <select name="kawin" id="kawin" class="form-control" required>
                                            <option value="{{ $item->kawin }}" selected>{{ $item->kawin }}</option>
                                            <option value="Belum Kawin">Belum Kawin</option>
                                            <option value="Kawin">Kawin</option>
                                            <option value="Cerai Hidup">Cerai Hidup</option>
                                            <option value="Cerai Mati">Cerai Mati</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="job">Pekerjaan</label>
                                        <input type="text" name="job" class="form-control" value="{{ $item->job }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status Hidup</label>
                                        <select name="status" id="status" class="form-control" required>
                                            <option value="{{ $item->status }}" selected>{{ $item->status }}</option>
                                            <option value="Ada">Ada</option>
                                            <option value="Meninggal">Meninggal</option>
                                            <option value="Pindah">Pindah</option>
                                        </select>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
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
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Tempat Tanggal Lahir</th>
                    <th>JK</th>
                    <th>Alamat</th>
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
                <form action="{{ route('staff.penduduk.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="text" name="nik" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="bop">Tempat Lahir</label>
                        <input type="text" name="bop" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="bod">Tanggal Lahir</label>
                        <input type="date" name="bod" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="gender">Jenis Kelamin</label>
                        <select name="gender" id="gender" class="form-control" required>
                            <option selected>-- Pilih --</option>
                            <option value="LK">LK</option>
                            <option value="PR">PR</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="hamlet">Dusun</label>
                        <input type="text" name="hamlet" class="form-control" value="Dusun 1" required>
                    </div>
                    <div class="form-group">
                        <label for="village">Desa</label>
                        <input type="text" name="village" class="form-control" value="Aek Nabara" required>
                    </div>
                    <div class="form-group">
                        <label for="religion">Agama</label>
                        <input type="text" name="religion" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="kawin">Status Pernikahan</label>
                        <select name="kawin" id="kawin" class="form-control" required>
                            <option selected>-- Pilih --</option>
                            <option value="Belum Kawin">Belum Kawin</option>
                            <option value="Kawin">Kawin</option>
                            <option value="Cerai Hidup">Cerai Hidup</option>
                            <option value="Cerai Mati">Cerai Mati</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="job">Pekerjaan</label>
                        <input type="text" name="job" class="form-control" value="Pegawai" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Status Hidup</label>
                        <select name="status" id="status" class="form-control" required>
                            <option selected>-- Pilih --</option>
                            <option value="Ada">Ada</option>
                            <option value="Meninggal">Meninggal</option>
                            <option value="Pindah">Pindah</option>
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
