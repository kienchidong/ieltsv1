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
                                <label for="exampleInputEmail1">Link Video youtube (*)</label>
                                <input type="text" class="form-control" placeholder="Link video youtbe" name="" id="video" value="{{ old('link') }}" onchange="getVideoYoutube(this)">
                                <input type="hidden" required name="video" id="value-video" value="{{ $online->video }}">
                                <h4>Video:</h4>
                                <div id="youtube-video">
                                    <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $online->video }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Link khóa học (*)</label>
                                <div class="form-group">
                                    <input type="text" name="link" placeholder="Link khóa học" class="form-control" value="{{ $online->link }}" />
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

