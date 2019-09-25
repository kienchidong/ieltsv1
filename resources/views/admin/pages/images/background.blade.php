@extends('admin.layouts.master-layout')
@section('title')
    {{ $title }}
@endsection

@section('content')

        <section class="content-header">
            <h1>
            {{ $title }}
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('library.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">{{ $title }}</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
              
                <div class="col-xs-12" id="edit-slider">
                    <div class="box">
                        <div class="box-header">
                           
                        </div>
                        <div class="box-body">
                            <form action="{{ route('images.update') }}" method="post" id="form-edit" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $images->id }}">
                                <input type="hidden" name="title" />
                                <div class="form-group">
                                <input type="file" id="edit-image" name="image" onchange="fileValidation(this)">
                                <div id="imagePreviewedit-image">
                                    <img src="{{ asset('images/sliders/'.$images->image) }}" alt="" width="500px">
                                </div>
                               
                                </div>
                                
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Sửa" />
                                    <input type="reset" class="btn btn-danger" value="Hủy" onclick="return huybackground()"/>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
               
        </section>
    
    </div>

@endsection