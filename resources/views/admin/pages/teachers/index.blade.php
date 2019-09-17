@extends('admin.layouts.master-layout')
@section('title')
    Danh sách giáo viên
@endsection

@section('content')

    <div class="container-fluid">

        <style>
            .input {
                background: none;
                border: none;
            }
        </style>


        <section class="content-header">
            <h1>
                Danh sách giáo viên
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('teacher.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Giáo viên</li>
            </ol>
        </section>
        <div>
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $err)
                        {{$err}}<br>
                    @endforeach

                </div>

            @endif
            @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
            @endif
        </div>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">

                        <div class="box-header">
                            <a href="{{route('teacher.create')}}" class="btn btn-success">Thêm</a>
                        </div>

                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên</th>
                                    <th>Chức vụ</th>
                                    <th>Hình ảnh</th>
                                    <th>Trạng thái</th>
                                    <th class="col-md-3">Hành động</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($teachers as $value)
                                    <tr class="odd gradeX" align="center">
                                        <td>{{$value->id}}</td>
                                        <td>{!! $value->name !!}</td>
                                        <td>{{$value->position}}</td>

                                        <td><img width="100px" height="100px"
                                                 src="{{asset('')}}images/giáo viên/{{$value->image}}">
                                        </td>

                                        <td>
                                            @if($value->status==1)
                                                Hiển thị
                                            @else
                                                Ẩn
                                            @endif
                                        </td>
                                        <td>
                                            {{--<a class="btn btn-primary" id="bt{{$value->id}}" style="display: block"--}}
                                            {{--onclick="thaotac({{$value->id}})">Thao tác</a>--}}
                                            <div>
                                                <a class="btn btn-primary" id="edit"
                                                   href="{{ url('admin/slider/edit/'.$value->id) }}"
                                                   onclick="">Sửa</a>

                                                <a class="btn btn-danger"
                                                   href="{{ url('admin/slider/destroy/'.$value->id) }}"
                                                   onclick="return confirm('Hành động sẽ xóa slider này! bạn có muốn tiếp tục?')">Xóa</a>
                                                @if($value->status==1)
                                                    <a class="btn btn-info"
                                                       href="{{ url('admin/slider/setactive/'.$value->id.'/0') }}"
                                                       onclick="return confirm('Hành động sẽ ẩn giáo viên này! bạn có muốn tiếp tục?')">Ẩn</a>
                                                @else
                                                    <a class="btn btn-warning"
                                                       href="{{ url('admin/slider/setactive/'.$value->id.'/1') }}"
                                                       onclick="return confirm('Hành động sẽ hiển thị slider mục này! bạn có muốn tiếp tục?')">Hiển
                                                        thị</a>

                                                @endif
                                            </div>


                                    </tr>
                                @endforeach
                                </tbody>


                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->`
        </section>
        <script>
            {{--function thaotac(id) {--}}
            {{--document.getElementById("button"+id).style.display = 'block';--}}
            {{--document.getElementById("bt"+id).style.display = 'none';--}}
            {{--}--}}

            function update(id) {
                var input = document.querySelector('#name' + id);
                var edit = document.querySelector('#edit' + id);
                var active = document.querySelector('#active' + id);


                input.removeAttribute('readonly');
                input.classList.remove('input');
                input.classList.add('form-control');
                edit.classList.add('hide');
                active.classList.remove('hide');
            }

            function huyupdate(id) {
                var r = confirm("WARNING! You have unsaved changes that may be lost!");
                if (r == true) {
                    var input = document.querySelector('#name' + id);
                    var edit = document.querySelector('#edit' + id);
                    var active = document.querySelector('#active' + id);


                    input.classList.add('input');
                    $('.input').prop('readonly', true);
                    input.classList.remove('form-control');
                    edit.classList.remove('hide');
                    active.classList.add('hide');

                } else {
                    return false;
                }
            }
        </script>
    </div>



@endsection