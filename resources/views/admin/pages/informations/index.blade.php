@extends('admin.layouts.master-layout')
@section('title')
Danh sách người đăng ký
@endsection

@section('content')

    <div class="container-fluid">

        <section class="content-header">
            <h1>
                Danh sách người đăng ký
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Danh sách người đăng ký</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">

                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên </th>
                                    <th>Email</th>
                                    <th>Số điện thoại</th>
                                    <th>Lời nhắn</th>
                                    <th>Đăng ký vào</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($informations as $key => $value)
                                    <tr class="odd gradeX" align="center">
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->email }}</td>
                                        <td>{{ $value->phone }}</td>
                                        <td>{{ $value->message }}</td>
                                        <td>{{ \Carbon\Carbon::parse($value->created_at)->diffForHumans() }}</td>
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