@extends('client.layouts.master-layout')
@section('title')
    Giới thiệu
@endsection
@section('content')
    <section class="course-1 py-5">
        <div class="container-fluid">
            <div class="container">
                <h3 class="text-center border-bot">{{ $introduces->title }}</h3>
                <div class="d-flex flex-column course-content">
                    {!! $introduces->content !!}
                </div>
                <h4 class="text-center border-bot">Đăng ký Học</h4>
                <div style="text-align:center">
                    <a target="_blank" href="{{$registration->link}}" class="btn btn-primary mt-5">Đăng ký học ngay</a>
                </div>
                <h3 class="text-center border-bot"></h3>

            </div>
        </div>
    </section>
@endsection
