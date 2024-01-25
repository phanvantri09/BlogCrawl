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
                                <th>firstIncrease</th>
                                <th>firstName</th>
                                <th>Head image</th>
                                <th>img</th>
                                <th>nickname</th>
                                <th>secondIncrease</th>
                                <th>secondName</th>
                                <th>firstPrice</th>
                                <th>secondPrice</th>
                                <th>title</th>
                                <th>content</th>
                                <th>details</th>
                                <th>likeImgList</th>
                                <th>lookImgList</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $blog)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $blog->firstIncrease ?? " " }}</td>
                                <td>{{ $blog->firstName ?? " " }}</td>
                                @if ($blog->headImg)
                                <td>
                                    <img style="max-width: 100%; max-height: 200px;"
                                        src="{{ asset('storage/images/' . $blog->headImg ) }}">
                                </td>
                                @else
                                <td></td>
                                @endif
                                @if ($blog->img)
                                <td>
                                    <img style="max-width: 100%; max-height: 200px;"
                                        src="{{ asset('storage/images/' . $blog->img ) }}">
                                </td>
                                @else
                                <td></td>
                                @endif
                                <td>{{ $blog->nickname ?? " " }}</td>
                                <td>{{ $blog->secondIncrease ?? " " }}</td>
                                <td>{{ $blog->secondName ?? " " }}</td>
                                <td>{{ $blog->firstPrice ?? " " }}</td>
                                <td>{{ $blog->secondPrice ?? "" }}</td>
                                <td>{{ $blog->title ?? "" }}</td>
                                <td>{{ $blog->content ?? " " }}</td>
                                <td>{{ $blog->details ?? " " }}</td>
                                @if ($blog->likeImgList)
                                <td>
                                    <img style="max-width: 100%; max-height: 200px;"
                                        src="{{ asset('storage/images/' . $blog->likeImgList ) }}">
                                </td>
                                @else
                                <td></td>
                                @endif
                                @if ($blog->lookImgList)
                                <td>
                                    <img style="max-width: 100%; max-height: 200px;"
                                        src="{{ asset('storage/images/' . $blog->lookImgList ) }}">
                                </td>
                                @else
                                <td></td>
                                @endif
                                {{-- <td>{{ \App\Helpers\ConstCommon::getnameByTypeCategory($item->type) }}</td> --}}
                                <td>
                                    <a href="{{ route('blog.edit', ['id' => $blog->id]) }}"
                                        class="btn btn-app">
                                        <i class="fas fa-edit"></i> Sửa
                                    </a>
                                    <a href="{{ route('blog.delete', ['id' => $blog->id]) }}"
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