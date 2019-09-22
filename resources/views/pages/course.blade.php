@extends('master-layout')
@section('title')
    Giới thiệu
@endsection
@section('content')
<section class="course-1 py-5">
    <div class="container-fluid">
        <div class="container">
            <h3 class="text-center border-bot">{{ $introduces->title }}</h3>
            <div class="d-flex flex-column course-content">
                {{--<span>Mình từng là một đứa mắc bệnh cứ ”gặp Tây là đóng băng cửa khẩu” bởi đã xuất thân từ ban A thì chớ
                    lại
                    còn mãi tới tận sắp tốt nghiệp Đại học mới chịu học Tiếng Anh tử tế.
                    Vậy nên mình luôn tìm tòi những cách học đơn giản, dễ áp dụng mà vẫn đạt được hiệu quả tốt. </span>
                <span>Hôm nay mình sẽ chia sẻ cho các bạn một phương pháp học
                    Listening được lấy cảm hứng từ các giờ tập chép chính tả của các em bé Tiểu học nhé. </span>



                <h6>MỨC 1: STUPID</h6>
                <span>Ở mức này, các bạn phải tự giác ý thức mình như các em bé lớp 1 bắt đâu được học tiếng không biết
                    gì hết nhé </span>
                <span>Vậy nên các bạn sẽ chỉ bắt đầu với nghe chép chính tả ở mức đơn giản, ví dụ như nghe chọn từ đơn
                    trong ô trống. Một khởi đầu thuận lợi sẽ giúp các bạn có nhiều động lực hơn để tiếp tục các bước
                    sau. Các bạn ở mức này cố gắng dành ra 30’ mỗi ngày để luyệ
                    n tập, và luyện liên tục hàng ngày chứ đừng ngắt quãng nhé khó lên trình được lắm. </span>
                <a href=" http://ez-dictation.com">Link 1: http://ez-dictation.com (chọn một bài nghe và làm phần
                    Tapping mode)
                </a>
                <a href="https://listenaminute.com/">Link 2: https://listenaminute.com/ (File nghe ngắn và chậm)</a>


                <h6>MỨC 2: SMART</h6>
                <span>Ở mức này, các bạn sẽ học như các bé học sinh lớp 2 - 3
                    bởi bạn đã nắm kha khá một số từ Tiếng Anh cơ bản. Chúng ta chuyển
                    sang dạng nghe chép chính tả khó hơn một chút - nghe và điền từ (điền vào chỗ trống). Sẽ không có
                    các đáp án cho sẵn và việc các bạn cần làm là nghe và cố điền cho đúng từ còn thiếu. Mình khuyên các
                    bạn nếu nghe được nhưng không biết viết từ tiếng Anh đó như thế nào thì cứ viết phiên âm tiếng Việt
                    ra, rồi nghe lại và đoán cách viết của từ đó dựa trên cách đọc nhé. Nếu vẫn không ra được thì…dùng
                    transcript thôi. Các bạn cần duy trì thời lượng 30’/ngày/hàng ngày để nhanh tiến bộ nhé.</span>
                <a href="http://ez-dictation.com">Link 1: http://ez-dictation.com (chọn một bài nghe và làm các phần
                    Semi-dictation mode và Dictation Mode)</a>
                <a href="www.listen-and-write.com">Link 2: www.listen-and-write.com</a>
                <a href="https://esl-lab.com/">Link 3: https://esl-lab.com/</a>


                <h6>MỨC 3: SUPER SMART</h6>
                <span>Giống như học sinh lớp 4-5, lúc này bạn hoàn toàn nghe và tự chép chính tả lại 1 đoạn văn hoàn
                    chỉnh rồi. Việc các bạn cần làm là chọn nguồn nghe khó hơn, nghe và chép TẤT CẢ mọi thứ mình nghe
                    được. Các bạn có thể nghe TED Talk, BBC, CNN hoặc xem phim. Lời khuyên của mình là không nên chép
                    dài quá tránh nổ đầu, nhức óc, tẩu hoả nhập ma,… Mỗi lần làm chỉ nên nghe chép khoảng 2’ – 3’ thôi.
                    Như ở mức trên, các bạn không nghe ra thì vẫn cứ phiên âm bằng tiếng Việt, nghe đi nghe lại rồi tìm
                    cho bằng được từ đó nhé.</span>
                <a href="https://www.youtube.com/user/TEDtalksDirector">Link 1: https://www.youtube.com/user/TEDtalksDirector </a>
                <a href="https://www.youtube.com/user/bbcnews">Link 2: https://www.youtube.com/user/bbcnews</a>
                <a href="https://www.youtube.com/user/CNN">Link 3: https://www.youtube.com/user/CNN</a>

                <span>Comment “XP” để nhận bộ Tài liệu 30 bài nghe cơ bản để áp dụng phương pháp này ngay và luôn nhé </span>
                <a href="http://bit.ly/30baiListeningcoban">Link tải: http://bit.ly/30baiListeningcoban </a>
                <a href="http://bit.ly/30baiListeningcoban-key">Key: http://bit.ly/30baiListeningcoban-key</a>--}}
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
            <a href="" class="btn btn-primary mt-5">Đăng ký học ngay</a>
        </div>
    </div>
</section>
@endsection
