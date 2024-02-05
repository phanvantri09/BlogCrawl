@extends('admin.index')
@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        {{-- @isset($title)
                            {{ $title }}
                        @else
                            Chưa có tiêu đề cho trang này
                        @endisset --}}
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="table-responsive">
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>stt</th>
                                    <th>Address</th>
                                    <th>country logo</th>
                                    <th>Email</th>
                                    <th>Fax</th>
                                    <th>License logo</th>
                                    <th>licenseName</th>
                                    <th>organizationName</th>
                                    <th>registrationCode</th>
                                    <th>regulatoryEffectiveTime</th>
                                    <th>regulatoryLicense</th>
                                    <th>tel</th>
                                    <th>website</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $license)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $license->address }}</td>
                                        @if($license->countryLogo)
                                        <td><img style="max-width: 100%; max-height: 200px;" alt=""
                                        src="{{ App\Helpers\ConstCommon::getLinkIMG($license->countryLogo) }}">
                                        </td>
                                        @else
                                        <td></td>
                                        @endif
                                        <td>{{ $license->email }}</td>
                                        <td>{{ $license->fax }}</td>
                                        @if($license->licenseLogo)
                                        <td><img style="max-width: 100%; max-height: 200px;" alt=""
                                        src="{{ App\Helpers\ConstCommon::getLinkIMG($license->licenseLogo) }}">
                                        </td>
                                        @else
                                        <td></td>
                                        @endif
                                        <td>{{ $license->licenseName }}</td>
                                        <td>{{ $license->organizationName }}</td>
                                        <td>{{ $license->registrationCode }}</td>
                                        <td>{{ $license->regulatoryEffectiveTime }}</td>
                                        <td>{{ $license->regulatoryLicense }}</td>
                                        <td>{{ $license->tel }}</td>
                                        <td>{{ $license->website }}</td>
                                        <td>
                                            <a href="{{ route('license.edit', ['id' => $license->id]) }}"
                                                class="btn btn-app">
                                                <i class="fas fa-edit"></i> Sửa
                                            </a>
                                            <a href="{{ route('license.delete', ['id' => $license->id]) }}"
                                                class="btn btn-app">
                                                <i class="fas fa-trash-alt"></i>Xóa
                                            </a>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
@endsection
@section('scripts')
    <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../../plugins/jszip/jszip.min.js"></script>
    <script src="../../plugins/pdfmake/pdfmake.min.js"></script>
    <script src="../../plugins/pdfmake/vfs_fonts.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
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
@endsection
