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
                                <th>resolutionRate</th>
                                <th>leverMax</th>
                                <th>facebookLink</th>
                                <th>firstCountryLogo</th>
                                <th>image</th>
                                <th>licenseName</th>
                                <th>logo</th>
                                <th>nickname</th>
                                <th>peoples</th>
                                <th>skypeLink</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $broker)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $broker->resolutionRate }}</td>
                                <td>{{ $broker->leverMax }}</td>
                                <td>{{ $broker->facebookLink }}</td>
                                @if ($broker->firstCountryLogo)
                                <<td>
                                    <img style="max-width: 100%; max-height: 200px;"
                                        src="{{ App\Helpers\ConstCommon::getLinkIMG($broker->firstCountryLogo) }}">
                                </td>
                                @else
                                <td></td>
                                @endif
                                @if ($broker->img)
                                <td>
                                    <img style="max-width: 100%; max-height: 200px;"
                                    src="{{ App\Helpers\ConstCommon::getLinkIMG($broker->img) }}">
                                </td>
                                @else
                                <td></td>
                                @endif
                                <td>{{ $broker->licenseName }}</td>
                                @if ($broker->logo)
                                <td>  
                                    <img style="max-width: 100%; max-height: 200px;"
                                    src="{{ App\Helpers\ConstCommon::getLinkIMG($broker->logo) }}">
                                </td>
                                @else
                                <td></td>
                                @endif
                                <td>{{ $broker->nickname }}</td>
                                <td>{{ $broker->peoples }}</td>
                                <td>{{ $broker->skypeLink }}</td>
                                
                                {{-- <td>{{ \App\Helpers\ConstCommon::getnameByTypeCategory($item->type) }}</td> --}}
                                <td>
                                    <a href="{{ route('broker.edit', ['id' => $broker->id]) }}"
                                        class="btn btn-app">
                                        <i class="fas fa-edit"></i> Sửa
                                    </a>
                                    <a href="{{ route('broker.delete', ['id' => $broker->id]) }}"
                                        class="btn btn-app">
                                        <i class="fas fa-trash-alt"></i>Xóa
                                    </a>

                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                        {{-- <tfoot>
                            <tr>
                                <th>Rendering engine</th>
                                <th>Browser</th>
                                <th>Platform(s)</th>
                                <th>Engine version</th>
                                <th>CSS grade</th>
                                <th>acttion</th>
                            </tr>
                        </tfoot> --}}
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
    $(function () {
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