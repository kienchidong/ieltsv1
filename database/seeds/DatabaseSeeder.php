<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        DB::table('users')->insert([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        $location = "Cộng tác viên,Quản trị viên,Admin";
        $explode = explode(',',$location);
        foreach($explode as $ex)
        {
            DB::table('role')->insert([
                'name' => $ex
            ]);
        }
        DB::table('admins')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'status' => '1',
            'level' => '3',
            'created_at' => now(),
            'password' => bcrypt('12345678') // password :12345678
        ]);

        /* Giới thiệu */
        DB::table('introduce')->insert([
            'logo' => 'logo.png',
            'address' => 'Tòa nhà Dream House, số 63, ngõ 136 Chùa Láng, Hà Nội, Việt Nam',
            'phone' => '0968907276',
            'email' => 'XuanPhiIelst@gmail.com',
            'facebook' => 'https://www.facebook.com/phamxuan.phi',
            'title' => 'TỪ SUPER NÁT LÊN SUPER SMART IELTS LISTENING BẰNG PHƯƠNG PHÁP HỌC SINH TIỂU HỌC',
            'content' => '<p>M&igrave;nh từng l&agrave; một đứa mắc bệnh cứ &rdquo;gặp T&acirc;y l&agrave; đ&oacute;ng băng cửa khẩu&rdquo; bởi đ&atilde; xuất th&acirc;n từ ban A th&igrave; chớ lại c&ograve;n m&atilde;i tới tận sắp tốt nghiệp Đại học mới chịu học Tiếng Anh tử tế. Vậy n&ecirc;n m&igrave;nh lu&ocirc;n t&igrave;m t&ograve;i những c&aacute;ch học đơn giản, dễ &aacute;p dụng m&agrave; vẫn đạt được hiệu quả tốt.H&ocirc;m nay m&igrave;nh sẽ chia sẻ cho c&aacute;c bạn một phương ph&aacute;p học Listening được lấy cảm hứng từ c&aacute;c giờ tập ch&eacute;p ch&iacute;nh tả của c&aacute;c em b&eacute; Tiểu học nh&eacute;.</p>'
            .'<h6>MỨC 1: STUPID</h6>'
            .'<p>Ở mức n&agrave;y, c&aacute;c bạn phải tự gi&aacute;c &yacute; thức m&igrave;nh như c&aacute;c em b&eacute; lớp 1 bắt đ&acirc;u được học tiếng kh&ocirc;ng biết g&igrave; hết nh&eacute;Vậy n&ecirc;n c&aacute;c bạn sẽ chỉ bắt đầu với nghe ch&eacute;p ch&iacute;nh tả ở mức đơn giản, v&iacute; dụ như nghe chọn từ đơn trong &ocirc; trống. Một khởi đầu thuận lợi sẽ gi&uacute;p c&aacute;c bạn c&oacute; nhiều động lực hơn để tiếp tục c&aacute;c bước sau. C&aacute;c bạn ở mức n&agrave;y cố gắng d&agrave;nh ra 30&rsquo; mỗi ng&agrave;y để luyệ n tập, v&agrave; luyện li&ecirc;n tục h&agrave;ng ng&agrave;y chứ đừng ngắt qu&atilde;ng nh&eacute; kh&oacute; l&ecirc;n tr&igrave;nh được lắm.<a href="http://ez-dictation.com/">Link 1: http://ez-dictation.com (chọn một b&agrave;i nghe v&agrave; l&agrave;m phần Tapping mode)</a><a href="https://listenaminute.com/">Link 2: https://listenaminute.com/ (File nghe ngắn v&agrave; chậm)</a></p>'
            .'<h6>MỨC 2: SMART</h6>'
            .'<p>Ở mức n&agrave;y, c&aacute;c bạn sẽ học như c&aacute;c b&eacute; học sinh lớp 2 - 3 bởi bạn đ&atilde; nắm kha kh&aacute; một số từ Tiếng Anh cơ bản. Ch&uacute;ng ta chuyển sang dạng nghe ch&eacute;p ch&iacute;nh tả kh&oacute; hơn một ch&uacute;t - nghe v&agrave; điền từ (điền v&agrave;o chỗ trống). Sẽ kh&ocirc;ng c&oacute; c&aacute;c đ&aacute;p &aacute;n cho sẵn v&agrave; việc c&aacute;c bạn cần l&agrave;m l&agrave; nghe v&agrave; cố điền cho đ&uacute;ng từ c&ograve;n thiếu. M&igrave;nh khuy&ecirc;n c&aacute;c bạn nếu nghe được nhưng kh&ocirc;ng biết viết từ tiếng Anh đ&oacute; như thế n&agrave;o th&igrave; cứ viết phi&ecirc;n &acirc;m tiếng Việt ra, rồi nghe lại v&agrave; đo&aacute;n c&aacute;ch viết của từ đ&oacute; dựa tr&ecirc;n c&aacute;ch đọc nh&eacute;. Nếu vẫn kh&ocirc;ng ra được th&igrave;&hellip;d&ugrave;ng transcript th&ocirc;i. C&aacute;c bạn cần duy tr&igrave; thời lượng 30&rsquo;/ng&agrave;y/h&agrave;ng ng&agrave;y để nhanh tiến bộ nh&eacute;.<a href="http://ez-dictation.com/">Link 1: http://ez-dictation.com (chọn một b&agrave;i nghe v&agrave; l&agrave;m c&aacute;c phần Semi-dictation mode v&agrave; Dictation Mode)</a><a href="http://localhost/ieltsv1/public/www.listen-and-write.com">Link 2: www.listen-and-write.com</a><a href="https://esl-lab.com/">Link 3: https://esl-lab.com/</a></p>'
            .'<h6>MỨC 3: SUPER SMART</h6>'
            .'<p>Giống như học sinh lớp 4-5, l&uacute;c n&agrave;y bạn ho&agrave;n to&agrave;n nghe v&agrave; tự ch&eacute;p ch&iacute;nh tả lại 1 đoạn văn ho&agrave;n chỉnh rồi. Việc c&aacute;c bạn cần l&agrave;m l&agrave; chọn nguồn nghe kh&oacute; hơn, nghe v&agrave; ch&eacute;p TẤT CẢ mọi thứ m&igrave;nh nghe được. C&aacute;c bạn c&oacute; thể nghe TED Talk, BBC, CNN hoặc xem phim. Lời khuy&ecirc;n của m&igrave;nh l&agrave; kh&ocirc;ng n&ecirc;n ch&eacute;p d&agrave;i qu&aacute; tr&aacute;nh nổ đầu, nhức &oacute;c, tẩu hoả nhập ma,&hellip; Mỗi lần l&agrave;m chỉ n&ecirc;n nghe ch&eacute;p khoảng 2&rsquo; &ndash; 3&rsquo; th&ocirc;i. Như ở mức tr&ecirc;n, c&aacute;c bạn kh&ocirc;ng nghe ra th&igrave; vẫn cứ phi&ecirc;n &acirc;m bằng tiếng Việt, nghe đi nghe lại rồi t&igrave;m cho bằng được từ đ&oacute; nh&eacute;.<a href="https://www.youtube.com/user/TEDtalksDirector">Link 1: https://www.youtube.com/user/TEDtalksDirector</a><a href="https://www.youtube.com/user/bbcnews">Link 2: https://www.youtube.com/user/bbcnews</a><a href="https://www.youtube.com/user/CNN">Link 3: https://www.youtube.com/user/CNN</a>Comment &ldquo;XP&rdquo; để nhận bộ T&agrave;i liệu 30 b&agrave;i nghe cơ bản để &aacute;p dụng phương ph&aacute;p n&agrave;y ngay v&agrave; lu&ocirc;n nh&eacute;<a href="http://bit.ly/30baiListeningcoban">Link tải: http://bit.ly/30baiListeningcoban</a><a href="http://bit.ly/30baiListeningcoban-key">Key: http://bit.ly/30baiListeningcoban-key</a></p>',
        ]);
    }
}
