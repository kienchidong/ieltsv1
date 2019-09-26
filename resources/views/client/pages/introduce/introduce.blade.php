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
                <h3 class="text-center border-bot">Thông tin khóa học</h3>
                <div class="d-flex flex-column">
                    <h6>Khóa Thân</h6>
                    <span>Số lượng học viên: 12-14</span>
                    <span>Thời gian: 19.00 – 21.00  thứ 3 &6</span>
                    <span>Nội dung khoá học:</span>
                    <span>Địa điểm lớp học: Toad nhà Deam Housesoos 63, ngõ 136 Chùa Láng, HN</span>
                </div>
                <a target="_blank" href="{{$registration->link}}" class="btn btn-primary mt-5">Đăng ký học ngay</a>
                <h3 class="text-center border-bot"></h3>

            </div>
        </div>
    </section>
@endsection
