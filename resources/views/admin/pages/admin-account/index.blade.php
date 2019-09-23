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
        <section class="content">
            <div class="row">
                <div class="col-xs-12 hide" id="edit-role">
                    <div class="box">
                        <div class="box-header">
                            <h1 id="edit-text">

                            </h1>
                        </div>
                        <div class="box-body">
                            <form action="{{ route('admin.account.eidt.role') }}" method="post" id="form-edit">
                                @csrf
                                <input type="hidden" id="edit-id" name="id" />
                                <div class="form-group">
                                    <label>Quyền(*)</label><br>
                                    <select name="role" id="role" onchange="selectrole(this)">
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                    <script>
                                        function selectrole(obj) {
                                            var hide = document.getElementsByClassName('role');
                                            for (var i = 0; i < hide.length; i++) {
                                                hide[i].classList.add('hide');
                                            }
                                            var show = document.getElementById('describle-role-'+obj.value);
                                            show.classList.remove('hide');
                                        }
                                    </script>
                                    @foreach($roles as $key => $role)
                                        @if($key==0)
                                            <div id="describle-role-{{ $role->id }}" class="role">
                                                ( {{ $role->describe }} )
                                            </div>
                                        @else
                                            <div id="describle-role-{{ $role->id }}" class="role hide">
                                                ( {{ $role->describe }} )
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Sửa Quyền" />
                                    <input type="reset" class="btn btn-danger" value="Hủy" onclick="return huyrole()"/>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="box">

                        <div class="box-header">
                            <a href="{{route('admin.account.create')}}" class="btn btn-success">Thêm</a>
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
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->email }}</td>
                                        <td>{{ $value->role }}</td>
                                        <td>{{ $value->hienthi }}</td>
                                        <td>
                                        <div>
                                            @if($value->status ==1)
                                                <a href="{{ route('admin.account.status', [$value->id,0]) }}" class="btn btn-danger" onclick="return confirm('Hành Động này sẽ khóa tài khoản được chọn! bạn có muốn tiếp tục?')">Khóa</a>
                                            @else
                                                <a href="{{ route('admin.account.status', [$value->id,1]) }}" class="btn btn-primary" onclick="return confirm('Hành Động này sẽ kích hoạt tài khoản được chọn! bạn có muốn tiếp tục?')">Kích Hoạt</a>
                                                <a href="{{ route('admin.account.delete', $value->id) }}" class="btn btn-danger" onclick="return confirm('Hành Động này sẽ xóa tài khoản được chọn! bạn có muốn tiếp tục?')">Xóa</a>
                                            @endif
                                                <input type="hidden" id="name-{{ $value->id }}" value="{{ $value->name }}" />
                                                <input type="hidden" id="level-{{ $value->id }}" value="{{ $value->level }}" />
                                                <button class="btn btn-success" onclick="suarole({{ $value->id }})">Sửa Quyền</button>
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
        function suarole(id) {
            var roles = $('#level-'+id).val();
            $('#role option[value='+roles+']').attr('selected','selected');
            //alert($('#name-'+id).val());
            var edit = document.getElementById('edit-role');
            $('#edit-text').html('Sửa quyền cho tài khoản '+$('#name-'+id).val());
            $('#edit-id').val(id);
            edit.classList.remove('hide');
        }
    </script>


@endsection