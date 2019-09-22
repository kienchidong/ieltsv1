@extends('admin.layouts.master-layout')
@section('title')
    Giới thiệu
@endsection
@section('content')
<style>
    .inputnone{
        border: none !important;
        background:none !important;
    }
</style>
    <section class="content-header">
        <h1>
            Thêm
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Thêm</li>
        </ol>
    </section>
    <br>
<<<<<<< HEAD
=======

>>>>>>> 3ed48ef4beff16dd279d00d783784c4b5b8728e9
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <h3 style="text-align: left; padding-left: 5px">Giới thiệu về Xuân Phi Ielts</h3>
                    <form role="form" method="POST" action="{{ route('introduce.update', $introduces->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label>Địa chỉ:</label>
                                <textarea class="form-control" name="address" rows="5" placeholder="Địa chỉ">{{ $introduces->address }}</textarea>
                            </div>
                            <div class="form-group">
                                <label >Số Điện thoại:</label>
                                <input type="text" class="form-control" placeholder="Số Điện thoại" name="phone" value="{{ $introduces->phone }}">
                            </div>
                            <div class="form-group">
                                <label >Email:</label>
                                <input type="email" class="form-control" placeholder="Email" name="email" value="{{ $introduces->email }}">
                            </div>
                            <div class="form-group">
                                <label >Link facebook:</label>
                                <input type="text" class="form-control" placeholder="Link facbook" name="facebook" value="{{ $introduces->facebook }}">
                            </div>
                            <div class="form-group">
                                <label >Tiêu dề:</label>
                                <input type="text" class="form-control" placeholder="Tiêu Đề" name="title" value="{{ $introduces->title }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nội dung (*)</label>
                                <div class="form-group">
                                        <textarea name="content" rows="10" placeholder="Nhập nội dung"
                                                  class="form-control">{{ $introduces->content }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Logo: </label>
                                <input type="file" id="logo" name="logo" onchange="fileValidation(this)">
                                <div id="imagePreviewlogo">
                                <img src="{{ asset('images/logo/'.$introduces->logo) }}" width='200px' alt="">
                                </div>
                            </div>
                            <div class="box-footer">

                                <button type="submit" class="btn btn-success " id="submit-sua">Sửa</button>
                            </div>

                        </div>

                    </form>
                </div>
                <!-- /. box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection

