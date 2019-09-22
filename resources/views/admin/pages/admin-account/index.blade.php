@extends('admin.layouts.master-layout')
@section('title')
    Danh sách thư viện
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
                Danh sách thư viện
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('library.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">thư viện</li>
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
                            <a href="{{route('library.create')}}" class="btn btn-success">Thêm</a>
                        </div>

                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên</th>
                                    <th>Email</th>
                                    <th>Quyền</th>
                                    <th>Trạng thái</th>
                                    <th class="col-md-3">Hành động</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($admins as $key => $value)
                                    <tr class="odd gradeX" align="center">
                                        <td>{{$key+1}}</td>
                                        <td>{{$value->name}}</td>
                                        <td>{{$value->email}}</td>
                                        <td>{{ $value->level}}</td>
                                        <td>
                                            @if($value->status==1)
                                                Hiển thị
                                            @else
                                                Ẩn
                                            @endif
                                        </td>
                                        <td>

                                            <div>
                                                
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
    
    </div>



@endsection