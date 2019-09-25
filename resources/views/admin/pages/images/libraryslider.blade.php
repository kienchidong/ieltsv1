@extends('admin.layouts.master-layout')
@section('title')
    Slider Thư Viện
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
                Danh sách Slider Thư Viện
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('library.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Slider Thư Viện</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12 hide" id="add-slider">
                    <div class="box">
                        <div class="box-header">
                            <h1 id="edit-text">
                                Thêm Slider
                            </h1>
                        </div>
                        <div class="box-body">
                            <form action="{{ route('images.store') }}" method="post" id="form-edit" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" id="location" name="location" value='4' />
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Title (*)</label>
                                    <input type="text" class="form-control" placeholder="Title" name="title" value="{{ old('title') }}">
                                </div>

                                <div class="form-group">
                                <input type="file" id="image" name="image" onchange="fileValidation(this)">
                                <div id="imagePreviewimage"></div>
                                </div>
                                
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Thêm" />
                                    <input type="reset" class="btn btn-danger" value="Hủy" onclick="return huyslider('add')"/>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 hide" id="edit-slider">
                    <div class="box">
                        <div class="box-header">
                            <h1 id="edit-text">
                                Thêm Slider
                            </h1>
                        </div>
                        <div class="box-body">
                            <form action="{{ route('images.update') }}" method="post" id="form-edit" enctype="multipart/form-data">
                                @csrf
                        
                                <input type="hidden" name="id" id='edit-id' value='1' />
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên Thêm (*)</label>
                                    <input type="text" class="form-control" placeholder="Title" id="edit-title" require name="title" value="{{ old('title') }}">
                                </div>

                                <div class="form-group">
                                <input type="file" id="edit-image" name="image" onchange="fileValidation(this)">
                                <div id="imagePreviewedit-image"></div>
                                </div>
                                
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Sửa" />
                                    <input type="reset" class="btn btn-danger" value="Hủy" onclick="return huyslider('edit')"/>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="box">

                        <div class="box-header">
                    
                            <button class="btn btn-success" onclick="addhomeslider()">Thêm</button>
                        </div>

                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tiêu Đề</th>
                                    <th>Hình Ảnh</th>
                                    <th>Trạng thái</th>
                                    <th class="col-md-3">Hành động</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($images as $key => $value)
                                    <tr class="odd gradeX" align="center">
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $value->title }}</td>
                                        <td><img src="{{ asset('images/sliders/'.$value->image) }}" alt="" width='400px'></td>
                                        <td>{{ $value->hienthi }}</td>
                                        <td>
                                        <div>
                                            @if($value->status ==1)
                                                <a href="{{ route('images.status', [$value->id,0]) }}" class="btn btn-danger" onclick="return confirm('Hành Động này sẽ ẩn sliderđược chọn! bạn có muốn tiếp tục?')">Ẩn</a>
                                            @else
                                                <a href="{{ route('images.status', [$value->id,1]) }}" class="btn btn-primary" onclick="return confirm('Hành Động này sẽ hiện slider được chọn! bạn có muốn tiếp tục?')">Hiện</a>
                                                <a href="{{ route('images.delete', $value->id) }}" class="btn btn-danger" onclick="return confirm('Hành Động này sẽ xóa slider được chọn! bạn có muốn tiếp tục?')">Xóa</a>
                                            @endif
                                                 <input type="hidden" id="image-{{ $value->id }}" value="{{ $value->image }}" />
                                                 <input type="hidden" id="title-{{ $value->id }}" value="{{ $value->title }}" />
                                                <button class="btn btn-success" onclick="edithomeslider({{ $value->id }})">Sửa</button>
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
    <script>
        function addhomeslider() {
            var add= document.getElementById('add-slider');
            add.classList.remove('hide');
        }
        function edithomeslider(id) {
            $('#edit-title').val($('#title-'+id).val());
            $('#edit-id').val(id);
            document.getElementById('imagePreviewedit-image').innerHTML='<img src="{{ asset('images/sliders/') }}/'+$('#image-'+id).val()+'" alt="" width="200px">';
            var add= document.getElementById('edit-slider');
            add.classList.remove('hide');
        }
        function huyslider(id){
            var x= confirm('những thao tác bạn vừa nhập sẽ không được giữ lại! bạn có tiếp tục?');
            if(x===true){
                var y= document.getElementById(id+'-slider');
                y.classList.add('hide');
                return true;
            }
            else{
                return false;
            }
        }
    </script>


@endsection