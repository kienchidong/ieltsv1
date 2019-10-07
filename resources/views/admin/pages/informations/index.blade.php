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
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Chưa liên lạc</a></li>
                <li><a data-toggle="tab" href="#menu1">Đã liên lạc</a></li>
            </ul>

            <div class="tab-content">
                <div id="home" class="tab-pane fade in active">


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
                                            <th>Trạng thái</th>
                                            <th>Đăng ký vào</th>
                                            <th>Hành động</th>
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
                                                <td>
                                                    @if($value->status == 0)
                                                        <span style="color: red"> Chưa Liên lạc</span>
                                                    @else
                                                        <span style="color: green">Đã Liên lạc</span>
                                                    @endif
                                                </td>
                                                <td>{{$value->created_at}}</td>
                                                <td>
                                                    @if($value->status == 0)
                                                        <a href="{{ route('infor.status', $value->id) }}" class="btn btn-success" onclick="return confirm('hành động này đồng nghĩa với bạn đã liên lạc với người dùng này! bạn có chắc chắn?')">Liên Lạc</a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>


                                    </table>
                                </div>
                                <!-- /.box-body -->
                </div>
                <div id="menu1" class="tab-pane fade">
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên </th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th>Lời nhắn</th>
                                <th>Trạng thái</th>
                                <th>Đăng ký vào</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($informations_dall as $key => $value_dll)
                                <tr class="odd gradeX" align="center">
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $value_dll->name }}</td>
                                    <td>{{ $value_dll->email }}</td>
                                    <td>{{ $value_dll->phone }}</td>
                                    <td>{{ $value_dll->message }}</td>
                                    <td>
                                        @if($value_dll->status == 0)
                                            <span style="color: red"> Chưa Liên lạc</span>
                                        @else
                                            <span style="color: green">Đã Liên lạc</span>
                                        @endif
                                    </td>
                                    <td>{{$value_dll->created_at}}</td>
                                </tr>
                            @endforeach
                            </tbody>


                        </table>
                    </div>
                </div>

            </div>
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