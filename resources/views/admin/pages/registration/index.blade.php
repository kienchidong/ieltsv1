@extends('admin.layouts.master-layout')
@section('title')
    Đăng ký
@endsection
@section('content')

    <section class="content-header">
        <h1>
            Đăng kí
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Đăng kí</li>
        </ol>
    </section>
    <br>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- /.col -->
            <div class="col-md-12">
                <div class="box box-primary">
                    <form role="form" method="POST" action="{{ route('registration.update', $registration->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">



                            <div class="form-group">
                                <label for="exampleInputEmail1">Link đăng kí (*)</label>
                                <div class="form-group">
                                    <input type="text" name="link" placeholder="Link khóa học" class="form-control" value="{{ $registration->link }}" />
                                </div>
                            </div>

                            <div class="box-footer">
                                <button type="submit" id="submit" class="btn btn-primary">Sửa</button>
                                <input type="reset" class="btn btn-danger" value="Hủy">
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


    <script>

    </script>

@endsection

