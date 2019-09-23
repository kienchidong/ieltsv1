@extends('admin.layouts.master-layout')
@section('title')
    Danh sách tin tức
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
                Danh sách tin tức
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('blog.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">tin tức</li>
            </ol>
        </section>


        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">

                        <div class="box-header">
                            <a href="{{route('blog.create')}}" class="btn btn-success">Thêm</a>
                        </div>

                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    {{--<th>Thể loại</th>--}}
                                    <th>Bài viết</th>
                                    <th>Hình ảnh</th>
                                    <th>Trạng thái</th>
                                    <th class="col-md-3">Hành động</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($blogs as $value)
                                    <tr class="odd gradeX" align="center">
                                        <td>{{$value->id}}</td>
{{--                                        <td>{{$value->cate_blog}}</td>--}}
                                        <td>{!! substr($value->name,0,255) !!}</td>

                                        <td><img width="100px" height="100px"
                                                 src="{{asset('')}}images/blogs/{{$value->image}}">
                                        </td>

                                        <td>
                                            @if($value->status==1)
                                                Hiển thị
                                            @else
                                                Ẩn
                                            @endif
                                        </td>
                                        <td>

                                            <div>
                                                <a class="btn btn-primary" id="edit"
                                                   href="{{ url('admin/blog/edit/'.$value->id) }}"
                                                   onclick="">Sửa</a>

                                                <a class="btn btn-danger"
                                                   href="{{ url('admin/blog/destroy/'.$value->id) }}"
                                                   onclick="return confirm('Hành động sẽ xóa tin tức này! bạn có muốn tiếp tục?')">Xóa</a>
                                                @if($value->status==1)
                                                    <a class="btn btn-info"
                                                       href="{{ url('admin/blog/setactive/'.$value->id.'/0') }}"
                                                       onclick="return confirm('Hành động sẽ ẩn tin tức này! bạn có muốn tiếp tục?')">Ẩn</a>
                                                @else
                                                    <a class="btn btn-warning"
                                                       href="{{ url('admin/blog/setactive/'.$value->id.'/1') }}"
                                                       onclick="return confirm('Hành động sẽ hiển thị tin tức mục này! bạn có muốn tiếp tục?')">Hiển
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