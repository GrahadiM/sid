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
    <h3 class="mb-3">{{ $title }}</h3>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <h3 class="text-center"><u>{{ Str::upper('Tentang Desa') }}</u></h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <img src="{{ asset('image/logo.jpg') }}" alt="Logo Desa" class="img-fluid">
                        </div>
                        <div class="col-md-8">
                            <h5 class="text-center font-weight-bold">Desa Aek Nabara, Kec. Simangumban, Kab. Tapanuli Utara</h5>
                            <p>
                                Desa Aek Nabara adalah nama suatu wilayah dikecamatan Simangumban kabupaten tapanuli utara, menurut
                                beberapa tokoh masyarakat Desa Aek Nabara bahwa Desa tersebut terbentuk pada tahun 1952 dan pada
                                saat itu jumlah penduduk ± 96 KK, dan pada saat ini jumlah penduduk desa Aek Nabara terdapat 320 KK.
                                Adapun nama desa tersebut diputuskan berdasarkan musyawarah yang dipimpin oleh kepala desa dan
                                diambil nama Desa Aek Nabara.
                            </p>
                        </div>
                        <div class="col-md-2">
                            <img src="{{ asset('image/wilayah.jpg') }}" alt="Wilayah Desa" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{ $users }}</h3>
                    <p>Jumlah Pengguna</p>
                </div>
                <div class="icon">
                    <i class="far fa-address-card"></i>
                </div>
                <a href="{{ route('admin.users.index') }}" class="small-box-footer">
                    Tampilkan Data <i class="fas fa-arrow-circle-right ml-1"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{ $announcements }}</h3>
                    <p>Pengumuman</p>
                </div>
                <div class="icon">
                    <i class="fas fa-clipboard-list"></i>
                </div>
                <a href="{{ route('admin.announcement.index') }}" class="small-box-footer">
                    Tampilkan Data <i class="fas fa-arrow-circle-right ml-1"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{ $critics }}</h3>
                    <p>Kritik</p>
                </div>
                <div class="icon">
                    <i class="fas fa-clipboard-list"></i>
                </div>
                <a href="{{ route('admin.messages.index') }}" class="small-box-footer">
                    Tampilkan Data <i class="fas fa-arrow-circle-right ml-1"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{ $recommendation }}</h3>
                    <p>Saran</p>
                </div>
                <div class="icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <a href="{{ route('admin.messages.index') }}" class="small-box-footer">
                    Tampilkan Data <i class="fas fa-arrow-circle-right ml-1"></i>
                </a>
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
