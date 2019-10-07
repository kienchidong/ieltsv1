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
        $this->call('Student');
        $this->call('Teacher');
        $this->call('CourseOfflines');
        $this->call('CateLibrarys');
        $this->call('Contacts');
//        Link Đăng ký
        DB::table('registration')->insert([

            'link' =>'http://bit.ly/IELTSofflineXuanPhi',
        ]);
        DB::table('users')->insert([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('12345678')
        ]);

        DB::table('role')->insert([
            [
                'name' => 'Cộng tác viên',
                'describe' => 'Tài khoản Cộng tác viên chỉ có quyền đăng và sửa bài viết của mình',
            ], [
                'name' => 'Admin',
                'describe' => 'Tài khoản admin có toàn quyền chỉnh sửa nội dung, tài khoản trong trang web',
            ],
        ]);

        /* tài khoản admin */
        DB::table('admins')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'status' => '1',
            'level' => '2',
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
                . '<h6>MỨC 1: STUPID</h6>'
                . '<p>Ở mức n&agrave;y, c&aacute;c bạn phải tự gi&aacute;c &yacute; thức m&igrave;nh như c&aacute;c em b&eacute; lớp 1 bắt đ&acirc;u được học tiếng kh&ocirc;ng biết g&igrave; hết nh&eacute;Vậy n&ecirc;n c&aacute;c bạn sẽ chỉ bắt đầu với nghe ch&eacute;p ch&iacute;nh tả ở mức đơn giản, v&iacute; dụ như nghe chọn từ đơn trong &ocirc; trống. Một khởi đầu thuận lợi sẽ gi&uacute;p c&aacute;c bạn c&oacute; nhiều động lực hơn để tiếp tục c&aacute;c bước sau. C&aacute;c bạn ở mức n&agrave;y cố gắng d&agrave;nh ra 30&rsquo; mỗi ng&agrave;y để luyệ n tập, v&agrave; luyện li&ecirc;n tục h&agrave;ng ng&agrave;y chứ đừng ngắt qu&atilde;ng nh&eacute; kh&oacute; l&ecirc;n tr&igrave;nh được lắm.<a href="http://ez-dictation.com/">Link 1: http://ez-dictation.com (chọn một b&agrave;i nghe v&agrave; l&agrave;m phần Tapping mode)</a><a href="https://listenaminute.com/">Link 2: https://listenaminute.com/ (File nghe ngắn v&agrave; chậm)</a></p>'
                . '<h6>MỨC 2: SMART</h6>'
                . '<p>Ở mức n&agrave;y, c&aacute;c bạn sẽ học như c&aacute;c b&eacute; học sinh lớp 2 - 3 bởi bạn đ&atilde; nắm kha kh&aacute; một số từ Tiếng Anh cơ bản. Ch&uacute;ng ta chuyển sang dạng nghe ch&eacute;p ch&iacute;nh tả kh&oacute; hơn một ch&uacute;t - nghe v&agrave; điền từ (điền v&agrave;o chỗ trống). Sẽ kh&ocirc;ng c&oacute; c&aacute;c đ&aacute;p &aacute;n cho sẵn v&agrave; việc c&aacute;c bạn cần l&agrave;m l&agrave; nghe v&agrave; cố điền cho đ&uacute;ng từ c&ograve;n thiếu. M&igrave;nh khuy&ecirc;n c&aacute;c bạn nếu nghe được nhưng kh&ocirc;ng biết viết từ tiếng Anh đ&oacute; như thế n&agrave;o th&igrave; cứ viết phi&ecirc;n &acirc;m tiếng Việt ra, rồi nghe lại v&agrave; đo&aacute;n c&aacute;ch viết của từ đ&oacute; dựa tr&ecirc;n c&aacute;ch đọc nh&eacute;. Nếu vẫn kh&ocirc;ng ra được th&igrave;&hellip;d&ugrave;ng transcript th&ocirc;i. C&aacute;c bạn cần duy tr&igrave; thời lượng 30&rsquo;/ng&agrave;y/h&agrave;ng ng&agrave;y để nhanh tiến bộ nh&eacute;.<a href="http://ez-dictation.com/">Link 1: http://ez-dictation.com (chọn một b&agrave;i nghe v&agrave; l&agrave;m c&aacute;c phần Semi-dictation mode v&agrave; Dictation Mode)</a><a href="http://localhost/ieltsv1/public/www.listen-and-write.com">Link 2: www.listen-and-write.com</a><a href="https://esl-lab.com/">Link 3: https://esl-lab.com/</a></p>'
                . '<h6>MỨC 3: SUPER SMART</h6>'
                . '<p>Giống như học sinh lớp 4-5, l&uacute;c n&agrave;y bạn ho&agrave;n to&agrave;n nghe v&agrave; tự ch&eacute;p ch&iacute;nh tả lại 1 đoạn văn ho&agrave;n chỉnh rồi. Việc c&aacute;c bạn cần l&agrave;m l&agrave; chọn nguồn nghe kh&oacute; hơn, nghe v&agrave; ch&eacute;p TẤT CẢ mọi thứ m&igrave;nh nghe được. C&aacute;c bạn c&oacute; thể nghe TED Talk, BBC, CNN hoặc xem phim. Lời khuy&ecirc;n của m&igrave;nh l&agrave; kh&ocirc;ng n&ecirc;n ch&eacute;p d&agrave;i qu&aacute; tr&aacute;nh nổ đầu, nhức &oacute;c, tẩu hoả nhập ma,&hellip; Mỗi lần l&agrave;m chỉ n&ecirc;n nghe ch&eacute;p khoảng 2&rsquo; &ndash; 3&rsquo; th&ocirc;i. Như ở mức tr&ecirc;n, c&aacute;c bạn kh&ocirc;ng nghe ra th&igrave; vẫn cứ phi&ecirc;n &acirc;m bằng tiếng Việt, nghe đi nghe lại rồi t&igrave;m cho bằng được từ đ&oacute; nh&eacute;.<a href="https://www.youtube.com/user/TEDtalksDirector">Link 1: https://www.youtube.com/user/TEDtalksDirector</a><a href="https://www.youtube.com/user/bbcnews">Link 2: https://www.youtube.com/user/bbcnews</a><a href="https://www.youtube.com/user/CNN">Link 3: https://www.youtube.com/user/CNN</a>Comment &ldquo;XP&rdquo; để nhận bộ T&agrave;i liệu 30 b&agrave;i nghe cơ bản để &aacute;p dụng phương ph&aacute;p n&agrave;y ngay v&agrave; lu&ocirc;n nh&eacute;<a href="http://bit.ly/30baiListeningcoban">Link tải: http://bit.ly/30baiListeningcoban</a><a href="http://bit.ly/30baiListeningcoban-key">Key: http://bit.ly/30baiListeningcoban-key</a></p>',
        ]);


        /*
         * blog
         * */

        DB::table('blogs')->insert([
            [
                'name' => 'GIẢI ĐÁP NHỮNG THẮC MẮC THƯỜNG GẶP VỀ KỲ THI IELTS',
                'slug' => Str::slug('GIẢI ĐÁP NHỮNG THẮC MẮC THƯỜNG GẶP VỀ KỲ THI IELTS') . '-' . time() . '.html',
                'image' => 'logo.png',
                'summary' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam sed quis quam ex accusamus!
                    Consequuntur fuga minus quo, itaque aspernatur, sint iure unde neque dicta amet, porro mollitia
                    veritatis tempora?',
                'content' => '<span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam sed quis quam ex accusamus!'
                    . 'Consequuntur fuga minus quo, itaque aspernatur, sint iure unde neque dicta amet, porro mollitia'
                    . 'veritatis tempora?</span>'
                    . '<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam inventore similique quos fugased
                    veritatis officiis harum enim dolores, quidem ratione cum magnam nemo, non excepturi nulla vel ullam
                    aliquam!</span>'
                    . '<div class="img-blog">'
                    . '<img
                            src="https://user-cdn.uef.edu.vn/img/listimage/ielts-face-off-with-mr-andy-1544145173/ielts-face-off-with-mr-andy-001-1543289967.jpg"
                            alt="">'
                    . '</div>'
                    . '<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam inventore similique quos fugased
                    veritatis officiis harum enim dolores, quidem ratione cum magnam nemo, non excepturi nulla vel ullam
                    aliquam!</span>'
                    . '<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam inventore similique quos fuga
                    sed
                    veritatis officiis harum enim dolores, quidem ratione cum magnam nemo, non excepturi nulla vel ullam
                    aliquam!</span>'
                    . '<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam inventore similique quos fuga
                    sed
                    veritatis officiis harum enim dolores, quidem ratione cum magnam nemo, non excepturi nulla vel ullam
                    aliquam!</span>'
                    . '<div class="img-blog">'
                    . '<img src="https://res.cloudinary.com/vac-global-education-img/image/upload/v1555241496/ielts-banner.jpg" alt="">'
                    . '</div>'
                    . '<span>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Magni facere officiis saepe reiciendis
                    quos laudantium, ipsam quis assumenda dolor est facilis suscipit nobis nam enim consequuntur.
                    Ducimus minima fugiat est!</span>',
                'created_at' => now(),
            ], [
                'name' => 'GIẢI ĐÁP NHỮNG THẮC MẮC THƯỜNG GẶP VỀ KỲ THI IELTS',
                'slug' => Str::slug('GIẢI ĐÁP NHỮNG THẮC MẮC THƯỜNG GẶP VỀ KỲ THI IELTS') . '-' . time() . '.html',
                'image' => 'logo.png',
                'summary' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam sed quis quam ex accusamus!
                    Consequuntur fuga minus quo, itaque aspernatur, sint iure unde neque dicta amet, porro mollitia
                    veritatis tempora?',
                'content' => '<span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam sed quis quam ex accusamus!'
                    . 'Consequuntur fuga minus quo, itaque aspernatur, sint iure unde neque dicta amet, porro mollitia'
                    . 'veritatis tempora?</span>'
                    . '<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam inventore similique quos fugased
                    veritatis officiis harum enim dolores, quidem ratione cum magnam nemo, non excepturi nulla vel ullam
                    aliquam!</span>'
                    . '<div class="img-blog">'
                    . '<img
                            src="https://user-cdn.uef.edu.vn/img/listimage/ielts-face-off-with-mr-andy-1544145173/ielts-face-off-with-mr-andy-001-1543289967.jpg"
                            alt="">'
                    . '</div>'
                    . '<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam inventore similique quos fugased
                    veritatis officiis harum enim dolores, quidem ratione cum magnam nemo, non excepturi nulla vel ullam
                    aliquam!</span>'
                    . '<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam inventore similique quos fuga
                    sed
                    veritatis officiis harum enim dolores, quidem ratione cum magnam nemo, non excepturi nulla vel ullam
                    aliquam!</span>'
                    . '<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam inventore similique quos fuga
                    sed
                    veritatis officiis harum enim dolores, quidem ratione cum magnam nemo, non excepturi nulla vel ullam
                    aliquam!</span>'
                    . '<div class="img-blog">'
                    . '<img src="https://res.cloudinary.com/vac-global-education-img/image/upload/v1555241496/ielts-banner.jpg" alt="">'
                    . '</div>'
                    . '<span>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Magni facere officiis saepe reiciendis
                    quos laudantium, ipsam quis assumenda dolor est facilis suscipit nobis nam enim consequuntur.
                    Ducimus minima fugiat est!</span>',
                'created_at' => now(),
            ], [
                'name' => 'GIẢI ĐÁP NHỮNG THẮC MẮC THƯỜNG GẶP VỀ KỲ THI IELTS',
                'slug' => Str::slug('GIẢI ĐÁP NHỮNG THẮC MẮC THƯỜNG GẶP VỀ KỲ THI IELTS') . '-' . time() . '.html',
                'image' => 'logo.png',
                'summary' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam sed quis quam ex accusamus!
                    Consequuntur fuga minus quo, itaque aspernatur, sint iure unde neque dicta amet, porro mollitia
                    veritatis tempora?',
                'content' => '<span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam sed quis quam ex accusamus!'
                    . 'Consequuntur fuga minus quo, itaque aspernatur, sint iure unde neque dicta amet, porro mollitia'
                    . 'veritatis tempora?</span>'
                    . '<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam inventore similique quos fugased
                    veritatis officiis harum enim dolores, quidem ratione cum magnam nemo, non excepturi nulla vel ullam
                    aliquam!</span>'
                    . '<div class="img-blog">'
                    . '<img
                            src="https://user-cdn.uef.edu.vn/img/listimage/ielts-face-off-with-mr-andy-1544145173/ielts-face-off-with-mr-andy-001-1543289967.jpg"
                            alt="">'
                    . '</div>'
                    . '<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam inventore similique quos fugased
                    veritatis officiis harum enim dolores, quidem ratione cum magnam nemo, non excepturi nulla vel ullam
                    aliquam!</span>'
                    . '<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam inventore similique quos fuga
                    sed
                    veritatis officiis harum enim dolores, quidem ratione cum magnam nemo, non excepturi nulla vel ullam
                    aliquam!</span>'
                    . '<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam inventore similique quos fuga
                    sed
                    veritatis officiis harum enim dolores, quidem ratione cum magnam nemo, non excepturi nulla vel ullam
                    aliquam!</span>'
                    . '<div class="img-blog">'
                    . '<img src="https://res.cloudinary.com/vac-global-education-img/image/upload/v1555241496/ielts-banner.jpg" alt="">'
                    . '</div>'
                    . '<span>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Magni facere officiis saepe reiciendis
                    quos laudantium, ipsam quis assumenda dolor est facilis suscipit nobis nam enim consequuntur.
                    Ducimus minima fugiat est!</span>',
                'created_at' => now(),
            ], [
                'name' => 'GIẢI ĐÁP NHỮNG THẮC MẮC THƯỜNG GẶP VỀ KỲ THI IELTS',
                'slug' => Str::slug('GIẢI ĐÁP NHỮNG THẮC MẮC THƯỜNG GẶP VỀ KỲ THI IELTS') . '-' . time() . '.html',
                'image' => 'logo.png',
                'summary' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam sed quis quam ex accusamus!
                    Consequuntur fuga minus quo, itaque aspernatur, sint iure unde neque dicta amet, porro mollitia
                    veritatis tempora?',
                'content' => '<span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam sed quis quam ex accusamus!'
                    . 'Consequuntur fuga minus quo, itaque aspernatur, sint iure unde neque dicta amet, porro mollitia'
                    . 'veritatis tempora?</span>'
                    . '<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam inventore similique quos fugased
                    veritatis officiis harum enim dolores, quidem ratione cum magnam nemo, non excepturi nulla vel ullam
                    aliquam!</span>'
                    . '<div class="img-blog">'
                    . '<img
                            src="https://user-cdn.uef.edu.vn/img/listimage/ielts-face-off-with-mr-andy-1544145173/ielts-face-off-with-mr-andy-001-1543289967.jpg"
                            alt="">'
                    . '</div>'
                    . '<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam inventore similique quos fugased
                    veritatis officiis harum enim dolores, quidem ratione cum magnam nemo, non excepturi nulla vel ullam
                    aliquam!</span>'
                    . '<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam inventore similique quos fuga
                    sed
                    veritatis officiis harum enim dolores, quidem ratione cum magnam nemo, non excepturi nulla vel ullam
                    aliquam!</span>'
                    . '<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam inventore similique quos fuga
                    sed
                    veritatis officiis harum enim dolores, quidem ratione cum magnam nemo, non excepturi nulla vel ullam
                    aliquam!</span>'
                    . '<div class="img-blog">'
                    . '<img src="https://res.cloudinary.com/vac-global-education-img/image/upload/v1555241496/ielts-banner.jpg" alt="">'
                    . '</div>'
                    . '<span>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Magni facere officiis saepe reiciendis
                    quos laudantium, ipsam quis assumenda dolor est facilis suscipit nobis nam enim consequuntur.
                    Ducimus minima fugiat est!</span>',
                'created_at' => now(),
            ], [
                'name' => 'GIẢI ĐÁP NHỮNG THẮC MẮC THƯỜNG GẶP VỀ KỲ THI IELTS',
                'slug' => Str::slug('GIẢI ĐÁP NHỮNG THẮC MẮC THƯỜNG GẶP VỀ KỲ THI IELTS') . '-' . time() . '.html',
                'image' => 'logo.png',
                'summary' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam sed quis quam ex accusamus!
                    Consequuntur fuga minus quo, itaque aspernatur, sint iure unde neque dicta amet, porro mollitia
                    veritatis tempora?',
                'content' => '<span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam sed quis quam ex accusamus!'
                    . 'Consequuntur fuga minus quo, itaque aspernatur, sint iure unde neque dicta amet, porro mollitia'
                    . 'veritatis tempora?</span>'
                    . '<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam inventore similique quos fugased
                    veritatis officiis harum enim dolores, quidem ratione cum magnam nemo, non excepturi nulla vel ullam
                    aliquam!</span>'
                    . '<div class="img-blog">'
                    . '<img
                            src="https://user-cdn.uef.edu.vn/img/listimage/ielts-face-off-with-mr-andy-1544145173/ielts-face-off-with-mr-andy-001-1543289967.jpg"
                            alt="">'
                    . '</div>'
                    . '<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam inventore similique quos fugased
                    veritatis officiis harum enim dolores, quidem ratione cum magnam nemo, non excepturi nulla vel ullam
                    aliquam!</span>'
                    . '<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam inventore similique quos fuga
                    sed
                    veritatis officiis harum enim dolores, quidem ratione cum magnam nemo, non excepturi nulla vel ullam
                    aliquam!</span>'
                    . '<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam inventore similique quos fuga
                    sed
                    veritatis officiis harum enim dolores, quidem ratione cum magnam nemo, non excepturi nulla vel ullam
                    aliquam!</span>'
                    . '<div class="img-blog">'
                    . '<img src="https://res.cloudinary.com/vac-global-education-img/image/upload/v1555241496/ielts-banner.jpg" alt="">'
                    . '</div>'
                    . '<span>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Magni facere officiis saepe reiciendis
                    quos laudantium, ipsam quis assumenda dolor est facilis suscipit nobis nam enim consequuntur.
                    Ducimus minima fugiat est!</span>',
                'created_at' => now(),
            ], [
                'name' => 'GIẢI ĐÁP NHỮNG THẮC MẮC THƯỜNG GẶP VỀ KỲ THI IELTS',
                'slug' => Str::slug('GIẢI ĐÁP NHỮNG THẮC MẮC THƯỜNG GẶP VỀ KỲ THI IELTS') . '-' . time() . '.html',
                'image' => 'logo.png',
                'summary' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam sed quis quam ex accusamus!
                    Consequuntur fuga minus quo, itaque aspernatur, sint iure unde neque dicta amet, porro mollitia
                    veritatis tempora?',
                'content' => '<span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam sed quis quam ex accusamus!'
                    . 'Consequuntur fuga minus quo, itaque aspernatur, sint iure unde neque dicta amet, porro mollitia'
                    . 'veritatis tempora?</span>'
                    . '<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam inventore similique quos fugased
                    veritatis officiis harum enim dolores, quidem ratione cum magnam nemo, non excepturi nulla vel ullam
                    aliquam!</span>'
                    . '<div class="img-blog">'
                    . '<img
                            src="https://user-cdn.uef.edu.vn/img/listimage/ielts-face-off-with-mr-andy-1544145173/ielts-face-off-with-mr-andy-001-1543289967.jpg"
                            alt="">'
                    . '</div>'
                    . '<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam inventore similique quos fugased
                    veritatis officiis harum enim dolores, quidem ratione cum magnam nemo, non excepturi nulla vel ullam
                    aliquam!</span>'
                    . '<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam inventore similique quos fuga
                    sed
                    veritatis officiis harum enim dolores, quidem ratione cum magnam nemo, non excepturi nulla vel ullam
                    aliquam!</span>'
                    . '<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam inventore similique quos fuga
                    sed
                    veritatis officiis harum enim dolores, quidem ratione cum magnam nemo, non excepturi nulla vel ullam
                    aliquam!</span>'
                    . '<div class="img-blog">'
                    . '<img src="https://res.cloudinary.com/vac-global-education-img/image/upload/v1555241496/ielts-banner.jpg" alt="">'
                    . '</div>'
                    . '<span>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Magni facere officiis saepe reiciendis
                    quos laudantium, ipsam quis assumenda dolor est facilis suscipit nobis nam enim consequuntur.
                    Ducimus minima fugiat est!</span>',
                'created_at' => now(),
            ], [
                'name' => 'GIẢI ĐÁP NHỮNG THẮC MẮC THƯỜNG GẶP VỀ KỲ THI IELTS',
                'slug' => Str::slug('GIẢI ĐÁP NHỮNG THẮC MẮC THƯỜNG GẶP VỀ KỲ THI IELTS') . '-' . time() . '.html',
                'image' => 'logo.png',
                'summary' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam sed quis quam ex accusamus!
                    Consequuntur fuga minus quo, itaque aspernatur, sint iure unde neque dicta amet, porro mollitia
                    veritatis tempora?',
                'content' => '<span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam sed quis quam ex accusamus!'
                    . 'Consequuntur fuga minus quo, itaque aspernatur, sint iure unde neque dicta amet, porro mollitia'
                    . 'veritatis tempora?</span>'
                    . '<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam inventore similique quos fugased
                    veritatis officiis harum enim dolores, quidem ratione cum magnam nemo, non excepturi nulla vel ullam
                    aliquam!</span>'
                    . '<div class="img-blog">'
                    . '<img
                            src="https://user-cdn.uef.edu.vn/img/listimage/ielts-face-off-with-mr-andy-1544145173/ielts-face-off-with-mr-andy-001-1543289967.jpg"
                            alt="">'
                    . '</div>'
                    . '<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam inventore similique quos fugased
                    veritatis officiis harum enim dolores, quidem ratione cum magnam nemo, non excepturi nulla vel ullam
                    aliquam!</span>'
                    . '<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam inventore similique quos fuga
                    sed
                    veritatis officiis harum enim dolores, quidem ratione cum magnam nemo, non excepturi nulla vel ullam
                    aliquam!</span>'
                    . '<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam inventore similique quos fuga
                    sed
                    veritatis officiis harum enim dolores, quidem ratione cum magnam nemo, non excepturi nulla vel ullam
                    aliquam!</span>'
                    . '<div class="img-blog">'
                    . '<img src="https://res.cloudinary.com/vac-global-education-img/image/upload/v1555241496/ielts-banner.jpg" alt="">'
                    . '</div>'
                    . '<span>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Magni facere officiis saepe reiciendis
                    quos laudantium, ipsam quis assumenda dolor est facilis suscipit nobis nam enim consequuntur.
                    Ducimus minima fugiat est!</span>',
                'created_at' => now(),
            ], [
                'name' => 'GIẢI ĐÁP NHỮNG THẮC MẮC THƯỜNG GẶP VỀ KỲ THI IELTS',
                'slug' => Str::slug('GIẢI ĐÁP NHỮNG THẮC MẮC THƯỜNG GẶP VỀ KỲ THI IELTS') . '-' . time() . '.html',
                'image' => 'logo.png',
                'summary' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam sed quis quam ex accusamus!
                    Consequuntur fuga minus quo, itaque aspernatur, sint iure unde neque dicta amet, porro mollitia
                    veritatis tempora?',
                'content' => '<span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam sed quis quam ex accusamus!'
                    . 'Consequuntur fuga minus quo, itaque aspernatur, sint iure unde neque dicta amet, porro mollitia'
                    . 'veritatis tempora?</span>'
                    . '<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam inventore similique quos fugased
                    veritatis officiis harum enim dolores, quidem ratione cum magnam nemo, non excepturi nulla vel ullam
                    aliquam!</span>'
                    . '<div class="img-blog">'
                    . '<img
                            src="https://user-cdn.uef.edu.vn/img/listimage/ielts-face-off-with-mr-andy-1544145173/ielts-face-off-with-mr-andy-001-1543289967.jpg"
                            alt="">'
                    . '</div>'
                    . '<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam inventore similique quos fugased
                    veritatis officiis harum enim dolores, quidem ratione cum magnam nemo, non excepturi nulla vel ullam
                    aliquam!</span>'
                    . '<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam inventore similique quos fuga
                    sed
                    veritatis officiis harum enim dolores, quidem ratione cum magnam nemo, non excepturi nulla vel ullam
                    aliquam!</span>'
                    . '<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam inventore similique quos fuga
                    sed
                    veritatis officiis harum enim dolores, quidem ratione cum magnam nemo, non excepturi nulla vel ullam
                    aliquam!</span>'
                    . '<div class="img-blog">'
                    . '<img src="https://res.cloudinary.com/vac-global-education-img/image/upload/v1555241496/ielts-banner.jpg" alt="">'
                    . '</div>'
                    . '<span>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Magni facere officiis saepe reiciendis
                    quos laudantium, ipsam quis assumenda dolor est facilis suscipit nobis nam enim consequuntur.
                    Ducimus minima fugiat est!</span>',
                'created_at' => now(),
            ],
        ]);

        DB::table('images')->insert([
            [
                'image' => 'default.jpg',
                'title' => 'Ielts cùng Xuân Phi',
                'location' => '1',

            ],[
                'image' => 'default.jpg',
                'title' => '',
                'location' => '1',
            ],[
                'image' => 'default.jpg',
                'title' => '',
                'location' => '1',
            ],
            [
                'image' => 'background.jpg',
                'title' => '',
                'location' => '2'
            ], [
                'image' => 'library_img.jpg',
                'title' => '',
                'location' => '3'
            ], [
                'image' => 'coment.jpg',
                'title' => '',
                'location' => '4'
            ],[
                'image' => 'image_sach.jpg',
                'title' => '',
                'location' => '5'
            ],
        ]);

        DB::table('course_onlines')->insert([
           'video' => '7jkVGDPnewo',
           'link' =>'https://google.com.vn'
        ]);

        DB::table('time')->insert([
           'date' => '2019-9-30',
        ]);
    }
}

class CateLibrarys extends Seeder
{
    public function run()
    {
        DB::table('cate_librarys')->insert([
            'name' => 'Nghe',
            'slug' => Str::slug('Nghe'),
            'icon' => 'UNLC_image_nghe.png',
            'status' => 1,
            'created_at' => now()
        ]);
        DB::table('cate_librarys')->insert([
            'name' => 'Nói',
            'slug' => Str::slug('Nói'),
            'icon' => 'Sb73_image_noi.png',
            'status' => 1,
            'created_at' => now()
        ]);
        DB::table('cate_librarys')->insert([
            'name' => 'Đọc',
            'slug' => Str::slug('Đọc'),
            'icon' => '3uEOkrZ_image_Icon Thư Viện-03.png',
            'status' => 1,
            'created_at' => now()
        ]);
        DB::table('cate_librarys')->insert([
            'name' => 'Viết',
            'slug' => Str::slug('Viết'),
            'icon' => 'kTcrl6x_image_Icon Thư viện-04.png',
            'status' => 1,
            'created_at' => now()
        ]);

        DB::table('librarys')->insert([
            [
                'name' => 'Sách IELTS Writing Task 2 2019',
                'slug' => Str::slug('Sách IELTS Writing Task 2 2019') . '-' . time() . '.html',
                'image' => 'default.jpg',
                'summary' => 'Tôi thích sách, thích hít hà mùi thơm của từng trang giấy, thích nằm hằng giờ mân mê quyển sách yêu thích của mình, để rồi nhiều ngày sau đó là những suy nghĩ,...',
                'content' => 'Tôi thích sách, thích hít hà mùi thơm của từng trang giấy, thích nằm hằng giờ mân mê quyển sách yêu thích của mình, để rồi nhiều ngày sau đó là những suy nghĩ, cảm xúc vẫn chẳng thể nào dứt ra được. Còn nhớ hồi trước, có một số sách muốn đọc nhưng lại chưa có bản dịch sang tiếng Việt, tôi đành liều mình chạy đi mua/ tải sách bản tiếng Anh để “đọc trước” vì không thể ngồi yên chờ sách được dịch (dù tiếng Anh vẫn chưa sõi, vốn từ vựng thì chẳng bằng ai). Nhưng cũng chính nhờ việc đọc nhiều sách tiếng Anh hồi đó mà vốn tiếng Anh của tôi cải thiện rõ rệt (có lẽ một phần vì tôi không còn thấy sợ đọc những bài viết dài ngoằng ngoẵng hay sợ học những từ lạ hoắc, khó hiểu, có vẻ khô khan). Tôi nghĩ nếu bạn chưa từng đọc sách tiếng Anh thì nên một lần thử. Đừng nghĩ rằng nó quá khó, đừng nghĩ bản thân không thể, bởi “Only those who dare may fly”. Còn với những ai đang băn khoăn không biết nên đọc cuốn sách tiếng Anh nào, bạn có thể bắt đầu với một trong những cuốn sách tôi có gợi ý dưới đây. Chúng là những cuốn sách tôi đã từng đọc, một hay bao nhiêu lần chẳng nhớ. Bạn có thể đọc thử, hoặc tự chọn cho mình cuốn sách phù hợp với sở thích của bạn. (Hãy luôn luôn bắt đầu bằng những gì bạn quan tâm và hứng thú!)',
                'cate_id' => 1,
                'created_at' => now(),
            ], [
                'name' => 'Sách IELTS Writing Task 2 2019',
                'slug' => Str::slug('Sách IELTS Writing Task 2 2019') . '-' . time() . '.html',
                'image' => 'default.jpg',
                'summary' => 'Tôi thích sách, thích hít hà mùi thơm của từng trang giấy, thích nằm hằng giờ mân mê quyển sách yêu thích của mình, để rồi nhiều ngày sau đó là những suy nghĩ,...',
                'content' => 'Tôi thích sách, thích hít hà mùi thơm của từng trang giấy, thích nằm hằng giờ mân mê quyển sách yêu thích của mình, để rồi nhiều ngày sau đó là những suy nghĩ, cảm xúc vẫn chẳng thể nào dứt ra được. Còn nhớ hồi trước, có một số sách muốn đọc nhưng lại chưa có bản dịch sang tiếng Việt, tôi đành liều mình chạy đi mua/ tải sách bản tiếng Anh để “đọc trước” vì không thể ngồi yên chờ sách được dịch (dù tiếng Anh vẫn chưa sõi, vốn từ vựng thì chẳng bằng ai). Nhưng cũng chính nhờ việc đọc nhiều sách tiếng Anh hồi đó mà vốn tiếng Anh của tôi cải thiện rõ rệt (có lẽ một phần vì tôi không còn thấy sợ đọc những bài viết dài ngoằng ngoẵng hay sợ học những từ lạ hoắc, khó hiểu, có vẻ khô khan). Tôi nghĩ nếu bạn chưa từng đọc sách tiếng Anh thì nên một lần thử. Đừng nghĩ rằng nó quá khó, đừng nghĩ bản thân không thể, bởi “Only those who dare may fly”. Còn với những ai đang băn khoăn không biết nên đọc cuốn sách tiếng Anh nào, bạn có thể bắt đầu với một trong những cuốn sách tôi có gợi ý dưới đây. Chúng là những cuốn sách tôi đã từng đọc, một hay bao nhiêu lần chẳng nhớ. Bạn có thể đọc thử, hoặc tự chọn cho mình cuốn sách phù hợp với sở thích của bạn. (Hãy luôn luôn bắt đầu bằng những gì bạn quan tâm và hứng thú!)',
                'cate_id' => 1,
                'created_at' => now(),
            ], [
                'name' => 'Sách IELTS Writing Task 2 2019',
                'slug' => Str::slug('Sách IELTS Writing Task 2 2019') . '-' . time() . '.html',
                'image' => 'default.jpg',
                'summary' => 'Tôi thích sách, thích hít hà mùi thơm của từng trang giấy, thích nằm hằng giờ mân mê quyển sách yêu thích của mình, để rồi nhiều ngày sau đó là những suy nghĩ,...',
                'content' => 'Tôi thích sách, thích hít hà mùi thơm của từng trang giấy, thích nằm hằng giờ mân mê quyển sách yêu thích của mình, để rồi nhiều ngày sau đó là những suy nghĩ, cảm xúc vẫn chẳng thể nào dứt ra được. Còn nhớ hồi trước, có một số sách muốn đọc nhưng lại chưa có bản dịch sang tiếng Việt, tôi đành liều mình chạy đi mua/ tải sách bản tiếng Anh để “đọc trước” vì không thể ngồi yên chờ sách được dịch (dù tiếng Anh vẫn chưa sõi, vốn từ vựng thì chẳng bằng ai). Nhưng cũng chính nhờ việc đọc nhiều sách tiếng Anh hồi đó mà vốn tiếng Anh của tôi cải thiện rõ rệt (có lẽ một phần vì tôi không còn thấy sợ đọc những bài viết dài ngoằng ngoẵng hay sợ học những từ lạ hoắc, khó hiểu, có vẻ khô khan). Tôi nghĩ nếu bạn chưa từng đọc sách tiếng Anh thì nên một lần thử. Đừng nghĩ rằng nó quá khó, đừng nghĩ bản thân không thể, bởi “Only those who dare may fly”. Còn với những ai đang băn khoăn không biết nên đọc cuốn sách tiếng Anh nào, bạn có thể bắt đầu với một trong những cuốn sách tôi có gợi ý dưới đây. Chúng là những cuốn sách tôi đã từng đọc, một hay bao nhiêu lần chẳng nhớ. Bạn có thể đọc thử, hoặc tự chọn cho mình cuốn sách phù hợp với sở thích của bạn. (Hãy luôn luôn bắt đầu bằng những gì bạn quan tâm và hứng thú!)',
                'cate_id' => 1,
                'created_at' => now(),
            ], [
                'name' => 'Sách IELTS Writing Task 2 2019',
                'slug' => Str::slug('Sách IELTS Writing Task 2 2019') . '-' . time() . '.html',
                'image' => 'default.jpg',
                'summary' => 'Tôi thích sách, thích hít hà mùi thơm của từng trang giấy, thích nằm hằng giờ mân mê quyển sách yêu thích của mình, để rồi nhiều ngày sau đó là những suy nghĩ,...',
                'content' => 'Tôi thích sách, thích hít hà mùi thơm của từng trang giấy, thích nằm hằng giờ mân mê quyển sách yêu thích của mình, để rồi nhiều ngày sau đó là những suy nghĩ, cảm xúc vẫn chẳng thể nào dứt ra được. Còn nhớ hồi trước, có một số sách muốn đọc nhưng lại chưa có bản dịch sang tiếng Việt, tôi đành liều mình chạy đi mua/ tải sách bản tiếng Anh để “đọc trước” vì không thể ngồi yên chờ sách được dịch (dù tiếng Anh vẫn chưa sõi, vốn từ vựng thì chẳng bằng ai). Nhưng cũng chính nhờ việc đọc nhiều sách tiếng Anh hồi đó mà vốn tiếng Anh của tôi cải thiện rõ rệt (có lẽ một phần vì tôi không còn thấy sợ đọc những bài viết dài ngoằng ngoẵng hay sợ học những từ lạ hoắc, khó hiểu, có vẻ khô khan). Tôi nghĩ nếu bạn chưa từng đọc sách tiếng Anh thì nên một lần thử. Đừng nghĩ rằng nó quá khó, đừng nghĩ bản thân không thể, bởi “Only those who dare may fly”. Còn với những ai đang băn khoăn không biết nên đọc cuốn sách tiếng Anh nào, bạn có thể bắt đầu với một trong những cuốn sách tôi có gợi ý dưới đây. Chúng là những cuốn sách tôi đã từng đọc, một hay bao nhiêu lần chẳng nhớ. Bạn có thể đọc thử, hoặc tự chọn cho mình cuốn sách phù hợp với sở thích của bạn. (Hãy luôn luôn bắt đầu bằng những gì bạn quan tâm và hứng thú!)',
                'cate_id' => 1,
                'created_at' => now(),
            ], [
                'name' => 'Sách IELTS Writing Task 2 2019',
                'slug' => Str::slug('Sách IELTS Writing Task 2 2019') . '-' . time() . '.html',
                'image' => 'default.jpg',
                'summary' => 'Tôi thích sách, thích hít hà mùi thơm của từng trang giấy, thích nằm hằng giờ mân mê quyển sách yêu thích của mình, để rồi nhiều ngày sau đó là những suy nghĩ,...',
                'content' => 'Tôi thích sách, thích hít hà mùi thơm của từng trang giấy, thích nằm hằng giờ mân mê quyển sách yêu thích của mình, để rồi nhiều ngày sau đó là những suy nghĩ, cảm xúc vẫn chẳng thể nào dứt ra được. Còn nhớ hồi trước, có một số sách muốn đọc nhưng lại chưa có bản dịch sang tiếng Việt, tôi đành liều mình chạy đi mua/ tải sách bản tiếng Anh để “đọc trước” vì không thể ngồi yên chờ sách được dịch (dù tiếng Anh vẫn chưa sõi, vốn từ vựng thì chẳng bằng ai). Nhưng cũng chính nhờ việc đọc nhiều sách tiếng Anh hồi đó mà vốn tiếng Anh của tôi cải thiện rõ rệt (có lẽ một phần vì tôi không còn thấy sợ đọc những bài viết dài ngoằng ngoẵng hay sợ học những từ lạ hoắc, khó hiểu, có vẻ khô khan). Tôi nghĩ nếu bạn chưa từng đọc sách tiếng Anh thì nên một lần thử. Đừng nghĩ rằng nó quá khó, đừng nghĩ bản thân không thể, bởi “Only those who dare may fly”. Còn với những ai đang băn khoăn không biết nên đọc cuốn sách tiếng Anh nào, bạn có thể bắt đầu với một trong những cuốn sách tôi có gợi ý dưới đây. Chúng là những cuốn sách tôi đã từng đọc, một hay bao nhiêu lần chẳng nhớ. Bạn có thể đọc thử, hoặc tự chọn cho mình cuốn sách phù hợp với sở thích của bạn. (Hãy luôn luôn bắt đầu bằng những gì bạn quan tâm và hứng thú!)',
                'cate_id' => 1,
                'created_at' => now(),
            ], [
                'name' => 'Sách IELTS Writing Task 2 2019',
                'slug' => Str::slug('Sách IELTS Writing Task 2 2019') . '-' . time() . '.html',
                'image' => 'default.jpg',
                'summary' => 'Tôi thích sách, thích hít hà mùi thơm của từng trang giấy, thích nằm hằng giờ mân mê quyển sách yêu thích của mình, để rồi nhiều ngày sau đó là những suy nghĩ,...',
                'content' => 'Tôi thích sách, thích hít hà mùi thơm của từng trang giấy, thích nằm hằng giờ mân mê quyển sách yêu thích của mình, để rồi nhiều ngày sau đó là những suy nghĩ, cảm xúc vẫn chẳng thể nào dứt ra được. Còn nhớ hồi trước, có một số sách muốn đọc nhưng lại chưa có bản dịch sang tiếng Việt, tôi đành liều mình chạy đi mua/ tải sách bản tiếng Anh để “đọc trước” vì không thể ngồi yên chờ sách được dịch (dù tiếng Anh vẫn chưa sõi, vốn từ vựng thì chẳng bằng ai). Nhưng cũng chính nhờ việc đọc nhiều sách tiếng Anh hồi đó mà vốn tiếng Anh của tôi cải thiện rõ rệt (có lẽ một phần vì tôi không còn thấy sợ đọc những bài viết dài ngoằng ngoẵng hay sợ học những từ lạ hoắc, khó hiểu, có vẻ khô khan). Tôi nghĩ nếu bạn chưa từng đọc sách tiếng Anh thì nên một lần thử. Đừng nghĩ rằng nó quá khó, đừng nghĩ bản thân không thể, bởi “Only those who dare may fly”. Còn với những ai đang băn khoăn không biết nên đọc cuốn sách tiếng Anh nào, bạn có thể bắt đầu với một trong những cuốn sách tôi có gợi ý dưới đây. Chúng là những cuốn sách tôi đã từng đọc, một hay bao nhiêu lần chẳng nhớ. Bạn có thể đọc thử, hoặc tự chọn cho mình cuốn sách phù hợp với sở thích của bạn. (Hãy luôn luôn bắt đầu bằng những gì bạn quan tâm và hứng thú!)',
                'cate_id' => 1,
                'created_at' => now(),
            ], [
                'name' => 'Sách IELTS Writing Task 2 2019',
                'slug' => Str::slug('Sách IELTS Writing Task 2 2019') . '-' . time() . '.html',
                'image' => 'default.jpg',
                'summary' => 'Tôi thích sách, thích hít hà mùi thơm của từng trang giấy, thích nằm hằng giờ mân mê quyển sách yêu thích của mình, để rồi nhiều ngày sau đó là những suy nghĩ,...',
                'content' => 'Tôi thích sách, thích hít hà mùi thơm của từng trang giấy, thích nằm hằng giờ mân mê quyển sách yêu thích của mình, để rồi nhiều ngày sau đó là những suy nghĩ, cảm xúc vẫn chẳng thể nào dứt ra được. Còn nhớ hồi trước, có một số sách muốn đọc nhưng lại chưa có bản dịch sang tiếng Việt, tôi đành liều mình chạy đi mua/ tải sách bản tiếng Anh để “đọc trước” vì không thể ngồi yên chờ sách được dịch (dù tiếng Anh vẫn chưa sõi, vốn từ vựng thì chẳng bằng ai). Nhưng cũng chính nhờ việc đọc nhiều sách tiếng Anh hồi đó mà vốn tiếng Anh của tôi cải thiện rõ rệt (có lẽ một phần vì tôi không còn thấy sợ đọc những bài viết dài ngoằng ngoẵng hay sợ học những từ lạ hoắc, khó hiểu, có vẻ khô khan). Tôi nghĩ nếu bạn chưa từng đọc sách tiếng Anh thì nên một lần thử. Đừng nghĩ rằng nó quá khó, đừng nghĩ bản thân không thể, bởi “Only those who dare may fly”. Còn với những ai đang băn khoăn không biết nên đọc cuốn sách tiếng Anh nào, bạn có thể bắt đầu với một trong những cuốn sách tôi có gợi ý dưới đây. Chúng là những cuốn sách tôi đã từng đọc, một hay bao nhiêu lần chẳng nhớ. Bạn có thể đọc thử, hoặc tự chọn cho mình cuốn sách phù hợp với sở thích của bạn. (Hãy luôn luôn bắt đầu bằng những gì bạn quan tâm và hứng thú!)',
                'cate_id' => 2,
                'created_at' => now(),
            ], [
                'name' => 'Sách IELTS Writing Task 2 2019',
                'slug' => Str::slug('Sách IELTS Writing Task 2 2019') . '-' . time() . '.html',
                'image' => 'default.jpg',
                'summary' => 'Tôi thích sách, thích hít hà mùi thơm của từng trang giấy, thích nằm hằng giờ mân mê quyển sách yêu thích của mình, để rồi nhiều ngày sau đó là những suy nghĩ,...',
                'content' => 'Tôi thích sách, thích hít hà mùi thơm của từng trang giấy, thích nằm hằng giờ mân mê quyển sách yêu thích của mình, để rồi nhiều ngày sau đó là những suy nghĩ, cảm xúc vẫn chẳng thể nào dứt ra được. Còn nhớ hồi trước, có một số sách muốn đọc nhưng lại chưa có bản dịch sang tiếng Việt, tôi đành liều mình chạy đi mua/ tải sách bản tiếng Anh để “đọc trước” vì không thể ngồi yên chờ sách được dịch (dù tiếng Anh vẫn chưa sõi, vốn từ vựng thì chẳng bằng ai). Nhưng cũng chính nhờ việc đọc nhiều sách tiếng Anh hồi đó mà vốn tiếng Anh của tôi cải thiện rõ rệt (có lẽ một phần vì tôi không còn thấy sợ đọc những bài viết dài ngoằng ngoẵng hay sợ học những từ lạ hoắc, khó hiểu, có vẻ khô khan). Tôi nghĩ nếu bạn chưa từng đọc sách tiếng Anh thì nên một lần thử. Đừng nghĩ rằng nó quá khó, đừng nghĩ bản thân không thể, bởi “Only those who dare may fly”. Còn với những ai đang băn khoăn không biết nên đọc cuốn sách tiếng Anh nào, bạn có thể bắt đầu với một trong những cuốn sách tôi có gợi ý dưới đây. Chúng là những cuốn sách tôi đã từng đọc, một hay bao nhiêu lần chẳng nhớ. Bạn có thể đọc thử, hoặc tự chọn cho mình cuốn sách phù hợp với sở thích của bạn. (Hãy luôn luôn bắt đầu bằng những gì bạn quan tâm và hứng thú!)',
                'cate_id' => 2,
                'created_at' => now(),
            ], [
                'name' => 'Sách IELTS Writing Task 2 2019',
                'slug' => Str::slug('Sách IELTS Writing Task 2 2019') . '-' . time() . '.html',
                'image' => 'default.jpg',
                'summary' => 'Tôi thích sách, thích hít hà mùi thơm của từng trang giấy, thích nằm hằng giờ mân mê quyển sách yêu thích của mình, để rồi nhiều ngày sau đó là những suy nghĩ,...',
                'content' => 'Tôi thích sách, thích hít hà mùi thơm của từng trang giấy, thích nằm hằng giờ mân mê quyển sách yêu thích của mình, để rồi nhiều ngày sau đó là những suy nghĩ, cảm xúc vẫn chẳng thể nào dứt ra được. Còn nhớ hồi trước, có một số sách muốn đọc nhưng lại chưa có bản dịch sang tiếng Việt, tôi đành liều mình chạy đi mua/ tải sách bản tiếng Anh để “đọc trước” vì không thể ngồi yên chờ sách được dịch (dù tiếng Anh vẫn chưa sõi, vốn từ vựng thì chẳng bằng ai). Nhưng cũng chính nhờ việc đọc nhiều sách tiếng Anh hồi đó mà vốn tiếng Anh của tôi cải thiện rõ rệt (có lẽ một phần vì tôi không còn thấy sợ đọc những bài viết dài ngoằng ngoẵng hay sợ học những từ lạ hoắc, khó hiểu, có vẻ khô khan). Tôi nghĩ nếu bạn chưa từng đọc sách tiếng Anh thì nên một lần thử. Đừng nghĩ rằng nó quá khó, đừng nghĩ bản thân không thể, bởi “Only those who dare may fly”. Còn với những ai đang băn khoăn không biết nên đọc cuốn sách tiếng Anh nào, bạn có thể bắt đầu với một trong những cuốn sách tôi có gợi ý dưới đây. Chúng là những cuốn sách tôi đã từng đọc, một hay bao nhiêu lần chẳng nhớ. Bạn có thể đọc thử, hoặc tự chọn cho mình cuốn sách phù hợp với sở thích của bạn. (Hãy luôn luôn bắt đầu bằng những gì bạn quan tâm và hứng thú!)',
                'cate_id' => 2,
                'created_at' => now(),
            ], [
                'name' => 'Sách IELTS Writing Task 2 2019',
                'slug' => Str::slug('Sách IELTS Writing Task 2 2019') . '-' . time() . '.html',
                'image' => 'default.jpg',
                'summary' => 'Tôi thích sách, thích hít hà mùi thơm của từng trang giấy, thích nằm hằng giờ mân mê quyển sách yêu thích của mình, để rồi nhiều ngày sau đó là những suy nghĩ,...',
                'content' => 'Tôi thích sách, thích hít hà mùi thơm của từng trang giấy, thích nằm hằng giờ mân mê quyển sách yêu thích của mình, để rồi nhiều ngày sau đó là những suy nghĩ, cảm xúc vẫn chẳng thể nào dứt ra được. Còn nhớ hồi trước, có một số sách muốn đọc nhưng lại chưa có bản dịch sang tiếng Việt, tôi đành liều mình chạy đi mua/ tải sách bản tiếng Anh để “đọc trước” vì không thể ngồi yên chờ sách được dịch (dù tiếng Anh vẫn chưa sõi, vốn từ vựng thì chẳng bằng ai). Nhưng cũng chính nhờ việc đọc nhiều sách tiếng Anh hồi đó mà vốn tiếng Anh của tôi cải thiện rõ rệt (có lẽ một phần vì tôi không còn thấy sợ đọc những bài viết dài ngoằng ngoẵng hay sợ học những từ lạ hoắc, khó hiểu, có vẻ khô khan). Tôi nghĩ nếu bạn chưa từng đọc sách tiếng Anh thì nên một lần thử. Đừng nghĩ rằng nó quá khó, đừng nghĩ bản thân không thể, bởi “Only those who dare may fly”. Còn với những ai đang băn khoăn không biết nên đọc cuốn sách tiếng Anh nào, bạn có thể bắt đầu với một trong những cuốn sách tôi có gợi ý dưới đây. Chúng là những cuốn sách tôi đã từng đọc, một hay bao nhiêu lần chẳng nhớ. Bạn có thể đọc thử, hoặc tự chọn cho mình cuốn sách phù hợp với sở thích của bạn. (Hãy luôn luôn bắt đầu bằng những gì bạn quan tâm và hứng thú!)',
                'cate_id' => 2,
                'created_at' => now(),
            ], [
                'name' => 'Sách IELTS Writing Task 2 2019',
                'slug' => Str::slug('Sách IELTS Writing Task 2 2019') . '-' . time() . '.html',
                'image' => 'default.jpg',
                'summary' => 'Tôi thích sách, thích hít hà mùi thơm của từng trang giấy, thích nằm hằng giờ mân mê quyển sách yêu thích của mình, để rồi nhiều ngày sau đó là những suy nghĩ,...',
                'content' => 'Tôi thích sách, thích hít hà mùi thơm của từng trang giấy, thích nằm hằng giờ mân mê quyển sách yêu thích của mình, để rồi nhiều ngày sau đó là những suy nghĩ, cảm xúc vẫn chẳng thể nào dứt ra được. Còn nhớ hồi trước, có một số sách muốn đọc nhưng lại chưa có bản dịch sang tiếng Việt, tôi đành liều mình chạy đi mua/ tải sách bản tiếng Anh để “đọc trước” vì không thể ngồi yên chờ sách được dịch (dù tiếng Anh vẫn chưa sõi, vốn từ vựng thì chẳng bằng ai). Nhưng cũng chính nhờ việc đọc nhiều sách tiếng Anh hồi đó mà vốn tiếng Anh của tôi cải thiện rõ rệt (có lẽ một phần vì tôi không còn thấy sợ đọc những bài viết dài ngoằng ngoẵng hay sợ học những từ lạ hoắc, khó hiểu, có vẻ khô khan). Tôi nghĩ nếu bạn chưa từng đọc sách tiếng Anh thì nên một lần thử. Đừng nghĩ rằng nó quá khó, đừng nghĩ bản thân không thể, bởi “Only those who dare may fly”. Còn với những ai đang băn khoăn không biết nên đọc cuốn sách tiếng Anh nào, bạn có thể bắt đầu với một trong những cuốn sách tôi có gợi ý dưới đây. Chúng là những cuốn sách tôi đã từng đọc, một hay bao nhiêu lần chẳng nhớ. Bạn có thể đọc thử, hoặc tự chọn cho mình cuốn sách phù hợp với sở thích của bạn. (Hãy luôn luôn bắt đầu bằng những gì bạn quan tâm và hứng thú!)',
                'cate_id' => 2,
                'created_at' => now(),
            ], [
                'name' => 'Sách IELTS Writing Task 2 2019',
                'slug' => Str::slug('Sách IELTS Writing Task 2 2019') . '-' . time() . '.html',
                'image' => 'default.jpg',
                'summary' => 'Tôi thích sách, thích hít hà mùi thơm của từng trang giấy, thích nằm hằng giờ mân mê quyển sách yêu thích của mình, để rồi nhiều ngày sau đó là những suy nghĩ,...',
                'content' => 'Tôi thích sách, thích hít hà mùi thơm của từng trang giấy, thích nằm hằng giờ mân mê quyển sách yêu thích của mình, để rồi nhiều ngày sau đó là những suy nghĩ, cảm xúc vẫn chẳng thể nào dứt ra được. Còn nhớ hồi trước, có một số sách muốn đọc nhưng lại chưa có bản dịch sang tiếng Việt, tôi đành liều mình chạy đi mua/ tải sách bản tiếng Anh để “đọc trước” vì không thể ngồi yên chờ sách được dịch (dù tiếng Anh vẫn chưa sõi, vốn từ vựng thì chẳng bằng ai). Nhưng cũng chính nhờ việc đọc nhiều sách tiếng Anh hồi đó mà vốn tiếng Anh của tôi cải thiện rõ rệt (có lẽ một phần vì tôi không còn thấy sợ đọc những bài viết dài ngoằng ngoẵng hay sợ học những từ lạ hoắc, khó hiểu, có vẻ khô khan). Tôi nghĩ nếu bạn chưa từng đọc sách tiếng Anh thì nên một lần thử. Đừng nghĩ rằng nó quá khó, đừng nghĩ bản thân không thể, bởi “Only those who dare may fly”. Còn với những ai đang băn khoăn không biết nên đọc cuốn sách tiếng Anh nào, bạn có thể bắt đầu với một trong những cuốn sách tôi có gợi ý dưới đây. Chúng là những cuốn sách tôi đã từng đọc, một hay bao nhiêu lần chẳng nhớ. Bạn có thể đọc thử, hoặc tự chọn cho mình cuốn sách phù hợp với sở thích của bạn. (Hãy luôn luôn bắt đầu bằng những gì bạn quan tâm và hứng thú!)',
                'cate_id' => 2,
                'created_at' => now(),
            ], [
                'name' => 'Sách IELTS Writing Task 2 2019',
                'slug' => Str::slug('Sách IELTS Writing Task 2 2019') . '-' . time() . '.html',
                'image' => 'default.jpg',
                'summary' => 'Tôi thích sách, thích hít hà mùi thơm của từng trang giấy, thích nằm hằng giờ mân mê quyển sách yêu thích của mình, để rồi nhiều ngày sau đó là những suy nghĩ,...',
                'content' => 'Tôi thích sách, thích hít hà mùi thơm của từng trang giấy, thích nằm hằng giờ mân mê quyển sách yêu thích của mình, để rồi nhiều ngày sau đó là những suy nghĩ, cảm xúc vẫn chẳng thể nào dứt ra được. Còn nhớ hồi trước, có một số sách muốn đọc nhưng lại chưa có bản dịch sang tiếng Việt, tôi đành liều mình chạy đi mua/ tải sách bản tiếng Anh để “đọc trước” vì không thể ngồi yên chờ sách được dịch (dù tiếng Anh vẫn chưa sõi, vốn từ vựng thì chẳng bằng ai). Nhưng cũng chính nhờ việc đọc nhiều sách tiếng Anh hồi đó mà vốn tiếng Anh của tôi cải thiện rõ rệt (có lẽ một phần vì tôi không còn thấy sợ đọc những bài viết dài ngoằng ngoẵng hay sợ học những từ lạ hoắc, khó hiểu, có vẻ khô khan). Tôi nghĩ nếu bạn chưa từng đọc sách tiếng Anh thì nên một lần thử. Đừng nghĩ rằng nó quá khó, đừng nghĩ bản thân không thể, bởi “Only those who dare may fly”. Còn với những ai đang băn khoăn không biết nên đọc cuốn sách tiếng Anh nào, bạn có thể bắt đầu với một trong những cuốn sách tôi có gợi ý dưới đây. Chúng là những cuốn sách tôi đã từng đọc, một hay bao nhiêu lần chẳng nhớ. Bạn có thể đọc thử, hoặc tự chọn cho mình cuốn sách phù hợp với sở thích của bạn. (Hãy luôn luôn bắt đầu bằng những gì bạn quan tâm và hứng thú!)',
                'cate_id' => 3,
                'created_at' => now(),
            ], [
                'name' => 'Sách IELTS Writing Task 2 2019',
                'slug' => Str::slug('Sách IELTS Writing Task 2 2019') . '-' . time() . '.html',
                'image' => 'default.jpg',
                'summary' => 'Tôi thích sách, thích hít hà mùi thơm của từng trang giấy, thích nằm hằng giờ mân mê quyển sách yêu thích của mình, để rồi nhiều ngày sau đó là những suy nghĩ,...',
                'content' => 'Tôi thích sách, thích hít hà mùi thơm của từng trang giấy, thích nằm hằng giờ mân mê quyển sách yêu thích của mình, để rồi nhiều ngày sau đó là những suy nghĩ, cảm xúc vẫn chẳng thể nào dứt ra được. Còn nhớ hồi trước, có một số sách muốn đọc nhưng lại chưa có bản dịch sang tiếng Việt, tôi đành liều mình chạy đi mua/ tải sách bản tiếng Anh để “đọc trước” vì không thể ngồi yên chờ sách được dịch (dù tiếng Anh vẫn chưa sõi, vốn từ vựng thì chẳng bằng ai). Nhưng cũng chính nhờ việc đọc nhiều sách tiếng Anh hồi đó mà vốn tiếng Anh của tôi cải thiện rõ rệt (có lẽ một phần vì tôi không còn thấy sợ đọc những bài viết dài ngoằng ngoẵng hay sợ học những từ lạ hoắc, khó hiểu, có vẻ khô khan). Tôi nghĩ nếu bạn chưa từng đọc sách tiếng Anh thì nên một lần thử. Đừng nghĩ rằng nó quá khó, đừng nghĩ bản thân không thể, bởi “Only those who dare may fly”. Còn với những ai đang băn khoăn không biết nên đọc cuốn sách tiếng Anh nào, bạn có thể bắt đầu với một trong những cuốn sách tôi có gợi ý dưới đây. Chúng là những cuốn sách tôi đã từng đọc, một hay bao nhiêu lần chẳng nhớ. Bạn có thể đọc thử, hoặc tự chọn cho mình cuốn sách phù hợp với sở thích của bạn. (Hãy luôn luôn bắt đầu bằng những gì bạn quan tâm và hứng thú!)',
                'cate_id' => 3,
                'created_at' => now(),
            ], [
                'name' => 'Sách IELTS Writing Task 2 2019',
                'slug' => Str::slug('Sách IELTS Writing Task 2 2019') . '-' . time() . '.html',
                'image' => 'default.jpg',
                'summary' => 'Tôi thích sách, thích hít hà mùi thơm của từng trang giấy, thích nằm hằng giờ mân mê quyển sách yêu thích của mình, để rồi nhiều ngày sau đó là những suy nghĩ,...',
                'content' => 'Tôi thích sách, thích hít hà mùi thơm của từng trang giấy, thích nằm hằng giờ mân mê quyển sách yêu thích của mình, để rồi nhiều ngày sau đó là những suy nghĩ, cảm xúc vẫn chẳng thể nào dứt ra được. Còn nhớ hồi trước, có một số sách muốn đọc nhưng lại chưa có bản dịch sang tiếng Việt, tôi đành liều mình chạy đi mua/ tải sách bản tiếng Anh để “đọc trước” vì không thể ngồi yên chờ sách được dịch (dù tiếng Anh vẫn chưa sõi, vốn từ vựng thì chẳng bằng ai). Nhưng cũng chính nhờ việc đọc nhiều sách tiếng Anh hồi đó mà vốn tiếng Anh của tôi cải thiện rõ rệt (có lẽ một phần vì tôi không còn thấy sợ đọc những bài viết dài ngoằng ngoẵng hay sợ học những từ lạ hoắc, khó hiểu, có vẻ khô khan). Tôi nghĩ nếu bạn chưa từng đọc sách tiếng Anh thì nên một lần thử. Đừng nghĩ rằng nó quá khó, đừng nghĩ bản thân không thể, bởi “Only those who dare may fly”. Còn với những ai đang băn khoăn không biết nên đọc cuốn sách tiếng Anh nào, bạn có thể bắt đầu với một trong những cuốn sách tôi có gợi ý dưới đây. Chúng là những cuốn sách tôi đã từng đọc, một hay bao nhiêu lần chẳng nhớ. Bạn có thể đọc thử, hoặc tự chọn cho mình cuốn sách phù hợp với sở thích của bạn. (Hãy luôn luôn bắt đầu bằng những gì bạn quan tâm và hứng thú!)',
                'cate_id' => 3,
                'created_at' => now(),
            ], [
                'name' => 'Sách IELTS Writing Task 2 2019',
                'slug' => Str::slug('Sách IELTS Writing Task 2 2019') . '-' . time() . '.html',
                'image' => 'default.jpg',
                'summary' => 'Tôi thích sách, thích hít hà mùi thơm của từng trang giấy, thích nằm hằng giờ mân mê quyển sách yêu thích của mình, để rồi nhiều ngày sau đó là những suy nghĩ,...',
                'content' => 'Tôi thích sách, thích hít hà mùi thơm của từng trang giấy, thích nằm hằng giờ mân mê quyển sách yêu thích của mình, để rồi nhiều ngày sau đó là những suy nghĩ, cảm xúc vẫn chẳng thể nào dứt ra được. Còn nhớ hồi trước, có một số sách muốn đọc nhưng lại chưa có bản dịch sang tiếng Việt, tôi đành liều mình chạy đi mua/ tải sách bản tiếng Anh để “đọc trước” vì không thể ngồi yên chờ sách được dịch (dù tiếng Anh vẫn chưa sõi, vốn từ vựng thì chẳng bằng ai). Nhưng cũng chính nhờ việc đọc nhiều sách tiếng Anh hồi đó mà vốn tiếng Anh của tôi cải thiện rõ rệt (có lẽ một phần vì tôi không còn thấy sợ đọc những bài viết dài ngoằng ngoẵng hay sợ học những từ lạ hoắc, khó hiểu, có vẻ khô khan). Tôi nghĩ nếu bạn chưa từng đọc sách tiếng Anh thì nên một lần thử. Đừng nghĩ rằng nó quá khó, đừng nghĩ bản thân không thể, bởi “Only those who dare may fly”. Còn với những ai đang băn khoăn không biết nên đọc cuốn sách tiếng Anh nào, bạn có thể bắt đầu với một trong những cuốn sách tôi có gợi ý dưới đây. Chúng là những cuốn sách tôi đã từng đọc, một hay bao nhiêu lần chẳng nhớ. Bạn có thể đọc thử, hoặc tự chọn cho mình cuốn sách phù hợp với sở thích của bạn. (Hãy luôn luôn bắt đầu bằng những gì bạn quan tâm và hứng thú!)',
                'cate_id' => 3,
                'created_at' => now(),
            ], [
                'name' => 'Sách IELTS Writing Task 2 2019',
                'slug' => Str::slug('Sách IELTS Writing Task 2 2019') . '-' . time() . '.html',
                'image' => 'default.jpg',
                'summary' => 'Tôi thích sách, thích hít hà mùi thơm của từng trang giấy, thích nằm hằng giờ mân mê quyển sách yêu thích của mình, để rồi nhiều ngày sau đó là những suy nghĩ,...',
                'content' => 'Tôi thích sách, thích hít hà mùi thơm của từng trang giấy, thích nằm hằng giờ mân mê quyển sách yêu thích của mình, để rồi nhiều ngày sau đó là những suy nghĩ, cảm xúc vẫn chẳng thể nào dứt ra được. Còn nhớ hồi trước, có một số sách muốn đọc nhưng lại chưa có bản dịch sang tiếng Việt, tôi đành liều mình chạy đi mua/ tải sách bản tiếng Anh để “đọc trước” vì không thể ngồi yên chờ sách được dịch (dù tiếng Anh vẫn chưa sõi, vốn từ vựng thì chẳng bằng ai). Nhưng cũng chính nhờ việc đọc nhiều sách tiếng Anh hồi đó mà vốn tiếng Anh của tôi cải thiện rõ rệt (có lẽ một phần vì tôi không còn thấy sợ đọc những bài viết dài ngoằng ngoẵng hay sợ học những từ lạ hoắc, khó hiểu, có vẻ khô khan). Tôi nghĩ nếu bạn chưa từng đọc sách tiếng Anh thì nên một lần thử. Đừng nghĩ rằng nó quá khó, đừng nghĩ bản thân không thể, bởi “Only those who dare may fly”. Còn với những ai đang băn khoăn không biết nên đọc cuốn sách tiếng Anh nào, bạn có thể bắt đầu với một trong những cuốn sách tôi có gợi ý dưới đây. Chúng là những cuốn sách tôi đã từng đọc, một hay bao nhiêu lần chẳng nhớ. Bạn có thể đọc thử, hoặc tự chọn cho mình cuốn sách phù hợp với sở thích của bạn. (Hãy luôn luôn bắt đầu bằng những gì bạn quan tâm và hứng thú!)',
                'cate_id' => 3,
                'created_at' => now(),
            ], [
                'name' => 'Sách IELTS Writing Task 2 2019',
                'slug' => Str::slug('Sách IELTS Writing Task 2 2019') . '-' . time() . '.html',
                'image' => 'default.jpg',
                'summary' => 'Tôi thích sách, thích hít hà mùi thơm của từng trang giấy, thích nằm hằng giờ mân mê quyển sách yêu thích của mình, để rồi nhiều ngày sau đó là những suy nghĩ,...',
                'content' => 'Tôi thích sách, thích hít hà mùi thơm của từng trang giấy, thích nằm hằng giờ mân mê quyển sách yêu thích của mình, để rồi nhiều ngày sau đó là những suy nghĩ, cảm xúc vẫn chẳng thể nào dứt ra được. Còn nhớ hồi trước, có một số sách muốn đọc nhưng lại chưa có bản dịch sang tiếng Việt, tôi đành liều mình chạy đi mua/ tải sách bản tiếng Anh để “đọc trước” vì không thể ngồi yên chờ sách được dịch (dù tiếng Anh vẫn chưa sõi, vốn từ vựng thì chẳng bằng ai). Nhưng cũng chính nhờ việc đọc nhiều sách tiếng Anh hồi đó mà vốn tiếng Anh của tôi cải thiện rõ rệt (có lẽ một phần vì tôi không còn thấy sợ đọc những bài viết dài ngoằng ngoẵng hay sợ học những từ lạ hoắc, khó hiểu, có vẻ khô khan). Tôi nghĩ nếu bạn chưa từng đọc sách tiếng Anh thì nên một lần thử. Đừng nghĩ rằng nó quá khó, đừng nghĩ bản thân không thể, bởi “Only those who dare may fly”. Còn với những ai đang băn khoăn không biết nên đọc cuốn sách tiếng Anh nào, bạn có thể bắt đầu với một trong những cuốn sách tôi có gợi ý dưới đây. Chúng là những cuốn sách tôi đã từng đọc, một hay bao nhiêu lần chẳng nhớ. Bạn có thể đọc thử, hoặc tự chọn cho mình cuốn sách phù hợp với sở thích của bạn. (Hãy luôn luôn bắt đầu bằng những gì bạn quan tâm và hứng thú!)',
                'cate_id' => 3,
                'created_at' => now(),
            ], [
                'name' => 'Sách IELTS Writing Task 2 2019',
                'slug' => Str::slug('Sách IELTS Writing Task 2 2019') . '-' . time() . '.html',
                'image' => 'default.jpg',
                'summary' => 'Tôi thích sách, thích hít hà mùi thơm của từng trang giấy, thích nằm hằng giờ mân mê quyển sách yêu thích của mình, để rồi nhiều ngày sau đó là những suy nghĩ,...',
                'content' => 'Tôi thích sách, thích hít hà mùi thơm của từng trang giấy, thích nằm hằng giờ mân mê quyển sách yêu thích của mình, để rồi nhiều ngày sau đó là những suy nghĩ, cảm xúc vẫn chẳng thể nào dứt ra được. Còn nhớ hồi trước, có một số sách muốn đọc nhưng lại chưa có bản dịch sang tiếng Việt, tôi đành liều mình chạy đi mua/ tải sách bản tiếng Anh để “đọc trước” vì không thể ngồi yên chờ sách được dịch (dù tiếng Anh vẫn chưa sõi, vốn từ vựng thì chẳng bằng ai). Nhưng cũng chính nhờ việc đọc nhiều sách tiếng Anh hồi đó mà vốn tiếng Anh của tôi cải thiện rõ rệt (có lẽ một phần vì tôi không còn thấy sợ đọc những bài viết dài ngoằng ngoẵng hay sợ học những từ lạ hoắc, khó hiểu, có vẻ khô khan). Tôi nghĩ nếu bạn chưa từng đọc sách tiếng Anh thì nên một lần thử. Đừng nghĩ rằng nó quá khó, đừng nghĩ bản thân không thể, bởi “Only those who dare may fly”. Còn với những ai đang băn khoăn không biết nên đọc cuốn sách tiếng Anh nào, bạn có thể bắt đầu với một trong những cuốn sách tôi có gợi ý dưới đây. Chúng là những cuốn sách tôi đã từng đọc, một hay bao nhiêu lần chẳng nhớ. Bạn có thể đọc thử, hoặc tự chọn cho mình cuốn sách phù hợp với sở thích của bạn. (Hãy luôn luôn bắt đầu bằng những gì bạn quan tâm và hứng thú!)',
                'cate_id' => 4,
                'created_at' => now(),
            ], [
                'name' => 'Sách IELTS Writing Task 2 2019',
                'slug' => Str::slug('Sách IELTS Writing Task 2 2019') . '-' . time() . '.html',
                'image' => 'default.jpg',
                'summary' => 'Tôi thích sách, thích hít hà mùi thơm của từng trang giấy, thích nằm hằng giờ mân mê quyển sách yêu thích của mình, để rồi nhiều ngày sau đó là những suy nghĩ,...',
                'content' => 'Tôi thích sách, thích hít hà mùi thơm của từng trang giấy, thích nằm hằng giờ mân mê quyển sách yêu thích của mình, để rồi nhiều ngày sau đó là những suy nghĩ, cảm xúc vẫn chẳng thể nào dứt ra được. Còn nhớ hồi trước, có một số sách muốn đọc nhưng lại chưa có bản dịch sang tiếng Việt, tôi đành liều mình chạy đi mua/ tải sách bản tiếng Anh để “đọc trước” vì không thể ngồi yên chờ sách được dịch (dù tiếng Anh vẫn chưa sõi, vốn từ vựng thì chẳng bằng ai). Nhưng cũng chính nhờ việc đọc nhiều sách tiếng Anh hồi đó mà vốn tiếng Anh của tôi cải thiện rõ rệt (có lẽ một phần vì tôi không còn thấy sợ đọc những bài viết dài ngoằng ngoẵng hay sợ học những từ lạ hoắc, khó hiểu, có vẻ khô khan). Tôi nghĩ nếu bạn chưa từng đọc sách tiếng Anh thì nên một lần thử. Đừng nghĩ rằng nó quá khó, đừng nghĩ bản thân không thể, bởi “Only those who dare may fly”. Còn với những ai đang băn khoăn không biết nên đọc cuốn sách tiếng Anh nào, bạn có thể bắt đầu với một trong những cuốn sách tôi có gợi ý dưới đây. Chúng là những cuốn sách tôi đã từng đọc, một hay bao nhiêu lần chẳng nhớ. Bạn có thể đọc thử, hoặc tự chọn cho mình cuốn sách phù hợp với sở thích của bạn. (Hãy luôn luôn bắt đầu bằng những gì bạn quan tâm và hứng thú!)',
                'cate_id' => 4,
                'created_at' => now(),
            ], [
                'name' => 'Sách IELTS Writing Task 2 2019',
                'slug' => Str::slug('Sách IELTS Writing Task 2 2019') . '-' . time() . '.html',
                'image' => 'default.jpg',
                'summary' => 'Tôi thích sách, thích hít hà mùi thơm của từng trang giấy, thích nằm hằng giờ mân mê quyển sách yêu thích của mình, để rồi nhiều ngày sau đó là những suy nghĩ,...',
                'content' => 'Tôi thích sách, thích hít hà mùi thơm của từng trang giấy, thích nằm hằng giờ mân mê quyển sách yêu thích của mình, để rồi nhiều ngày sau đó là những suy nghĩ, cảm xúc vẫn chẳng thể nào dứt ra được. Còn nhớ hồi trước, có một số sách muốn đọc nhưng lại chưa có bản dịch sang tiếng Việt, tôi đành liều mình chạy đi mua/ tải sách bản tiếng Anh để “đọc trước” vì không thể ngồi yên chờ sách được dịch (dù tiếng Anh vẫn chưa sõi, vốn từ vựng thì chẳng bằng ai). Nhưng cũng chính nhờ việc đọc nhiều sách tiếng Anh hồi đó mà vốn tiếng Anh của tôi cải thiện rõ rệt (có lẽ một phần vì tôi không còn thấy sợ đọc những bài viết dài ngoằng ngoẵng hay sợ học những từ lạ hoắc, khó hiểu, có vẻ khô khan). Tôi nghĩ nếu bạn chưa từng đọc sách tiếng Anh thì nên một lần thử. Đừng nghĩ rằng nó quá khó, đừng nghĩ bản thân không thể, bởi “Only those who dare may fly”. Còn với những ai đang băn khoăn không biết nên đọc cuốn sách tiếng Anh nào, bạn có thể bắt đầu với một trong những cuốn sách tôi có gợi ý dưới đây. Chúng là những cuốn sách tôi đã từng đọc, một hay bao nhiêu lần chẳng nhớ. Bạn có thể đọc thử, hoặc tự chọn cho mình cuốn sách phù hợp với sở thích của bạn. (Hãy luôn luôn bắt đầu bằng những gì bạn quan tâm và hứng thú!)',
                'cate_id' => 4,
                'created_at' => now(),
            ], [
                'name' => 'Sách IELTS Writing Task 2 2019',
                'slug' => Str::slug('Sách IELTS Writing Task 2 2019') . '-' . time() . '.html',
                'image' => 'default.jpg',
                'summary' => 'Tôi thích sách, thích hít hà mùi thơm của từng trang giấy, thích nằm hằng giờ mân mê quyển sách yêu thích của mình, để rồi nhiều ngày sau đó là những suy nghĩ,...',
                'content' => 'Tôi thích sách, thích hít hà mùi thơm của từng trang giấy, thích nằm hằng giờ mân mê quyển sách yêu thích của mình, để rồi nhiều ngày sau đó là những suy nghĩ, cảm xúc vẫn chẳng thể nào dứt ra được. Còn nhớ hồi trước, có một số sách muốn đọc nhưng lại chưa có bản dịch sang tiếng Việt, tôi đành liều mình chạy đi mua/ tải sách bản tiếng Anh để “đọc trước” vì không thể ngồi yên chờ sách được dịch (dù tiếng Anh vẫn chưa sõi, vốn từ vựng thì chẳng bằng ai). Nhưng cũng chính nhờ việc đọc nhiều sách tiếng Anh hồi đó mà vốn tiếng Anh của tôi cải thiện rõ rệt (có lẽ một phần vì tôi không còn thấy sợ đọc những bài viết dài ngoằng ngoẵng hay sợ học những từ lạ hoắc, khó hiểu, có vẻ khô khan). Tôi nghĩ nếu bạn chưa từng đọc sách tiếng Anh thì nên một lần thử. Đừng nghĩ rằng nó quá khó, đừng nghĩ bản thân không thể, bởi “Only those who dare may fly”. Còn với những ai đang băn khoăn không biết nên đọc cuốn sách tiếng Anh nào, bạn có thể bắt đầu với một trong những cuốn sách tôi có gợi ý dưới đây. Chúng là những cuốn sách tôi đã từng đọc, một hay bao nhiêu lần chẳng nhớ. Bạn có thể đọc thử, hoặc tự chọn cho mình cuốn sách phù hợp với sở thích của bạn. (Hãy luôn luôn bắt đầu bằng những gì bạn quan tâm và hứng thú!)',
                'cate_id' => 4,
                'created_at' => now(),
            ], [
                'name' => 'Sách IELTS Writing Task 2 2019',
                'slug' => Str::slug('Sách IELTS Writing Task 2 2019') . '-' . time() . '.html',
                'image' => 'default.jpg',
                'summary' => 'Tôi thích sách, thích hít hà mùi thơm của từng trang giấy, thích nằm hằng giờ mân mê quyển sách yêu thích của mình, để rồi nhiều ngày sau đó là những suy nghĩ,...',
                'content' => 'Tôi thích sách, thích hít hà mùi thơm của từng trang giấy, thích nằm hằng giờ mân mê quyển sách yêu thích của mình, để rồi nhiều ngày sau đó là những suy nghĩ, cảm xúc vẫn chẳng thể nào dứt ra được. Còn nhớ hồi trước, có một số sách muốn đọc nhưng lại chưa có bản dịch sang tiếng Việt, tôi đành liều mình chạy đi mua/ tải sách bản tiếng Anh để “đọc trước” vì không thể ngồi yên chờ sách được dịch (dù tiếng Anh vẫn chưa sõi, vốn từ vựng thì chẳng bằng ai). Nhưng cũng chính nhờ việc đọc nhiều sách tiếng Anh hồi đó mà vốn tiếng Anh của tôi cải thiện rõ rệt (có lẽ một phần vì tôi không còn thấy sợ đọc những bài viết dài ngoằng ngoẵng hay sợ học những từ lạ hoắc, khó hiểu, có vẻ khô khan). Tôi nghĩ nếu bạn chưa từng đọc sách tiếng Anh thì nên một lần thử. Đừng nghĩ rằng nó quá khó, đừng nghĩ bản thân không thể, bởi “Only those who dare may fly”. Còn với những ai đang băn khoăn không biết nên đọc cuốn sách tiếng Anh nào, bạn có thể bắt đầu với một trong những cuốn sách tôi có gợi ý dưới đây. Chúng là những cuốn sách tôi đã từng đọc, một hay bao nhiêu lần chẳng nhớ. Bạn có thể đọc thử, hoặc tự chọn cho mình cuốn sách phù hợp với sở thích của bạn. (Hãy luôn luôn bắt đầu bằng những gì bạn quan tâm và hứng thú!)',
                'cate_id' => 4,
                'created_at' => now(),
            ], [
                'name' => 'Sách IELTS Writing Task 2 2019',
                'slug' => Str::slug('Sách IELTS Writing Task 2 2019') . '-' . time() . '.html',
                'image' => 'default.jpg',
                'summary' => 'Tôi thích sách, thích hít hà mùi thơm của từng trang giấy, thích nằm hằng giờ mân mê quyển sách yêu thích của mình, để rồi nhiều ngày sau đó là những suy nghĩ,...',
                'content' => 'Tôi thích sách, thích hít hà mùi thơm của từng trang giấy, thích nằm hằng giờ mân mê quyển sách yêu thích của mình, để rồi nhiều ngày sau đó là những suy nghĩ, cảm xúc vẫn chẳng thể nào dứt ra được. Còn nhớ hồi trước, có một số sách muốn đọc nhưng lại chưa có bản dịch sang tiếng Việt, tôi đành liều mình chạy đi mua/ tải sách bản tiếng Anh để “đọc trước” vì không thể ngồi yên chờ sách được dịch (dù tiếng Anh vẫn chưa sõi, vốn từ vựng thì chẳng bằng ai). Nhưng cũng chính nhờ việc đọc nhiều sách tiếng Anh hồi đó mà vốn tiếng Anh của tôi cải thiện rõ rệt (có lẽ một phần vì tôi không còn thấy sợ đọc những bài viết dài ngoằng ngoẵng hay sợ học những từ lạ hoắc, khó hiểu, có vẻ khô khan). Tôi nghĩ nếu bạn chưa từng đọc sách tiếng Anh thì nên một lần thử. Đừng nghĩ rằng nó quá khó, đừng nghĩ bản thân không thể, bởi “Only those who dare may fly”. Còn với những ai đang băn khoăn không biết nên đọc cuốn sách tiếng Anh nào, bạn có thể bắt đầu với một trong những cuốn sách tôi có gợi ý dưới đây. Chúng là những cuốn sách tôi đã từng đọc, một hay bao nhiêu lần chẳng nhớ. Bạn có thể đọc thử, hoặc tự chọn cho mình cuốn sách phù hợp với sở thích của bạn. (Hãy luôn luôn bắt đầu bằng những gì bạn quan tâm và hứng thú!)',
                'cate_id' => 4,
                'created_at' => now(),
            ], [
                'name' => 'Sách IELTS Writing Task 2 2019',
                'slug' => Str::slug('Sách IELTS Writing Task 2 2019') . '-' . time() . '.html',
                'image' => 'default.jpg',
                'summary' => 'Tôi thích sách, thích hít hà mùi thơm của từng trang giấy, thích nằm hằng giờ mân mê quyển sách yêu thích của mình, để rồi nhiều ngày sau đó là những suy nghĩ,...',
                'content' => 'Tôi thích sách, thích hít hà mùi thơm của từng trang giấy, thích nằm hằng giờ mân mê quyển sách yêu thích của mình, để rồi nhiều ngày sau đó là những suy nghĩ, cảm xúc vẫn chẳng thể nào dứt ra được. Còn nhớ hồi trước, có một số sách muốn đọc nhưng lại chưa có bản dịch sang tiếng Việt, tôi đành liều mình chạy đi mua/ tải sách bản tiếng Anh để “đọc trước” vì không thể ngồi yên chờ sách được dịch (dù tiếng Anh vẫn chưa sõi, vốn từ vựng thì chẳng bằng ai). Nhưng cũng chính nhờ việc đọc nhiều sách tiếng Anh hồi đó mà vốn tiếng Anh của tôi cải thiện rõ rệt (có lẽ một phần vì tôi không còn thấy sợ đọc những bài viết dài ngoằng ngoẵng hay sợ học những từ lạ hoắc, khó hiểu, có vẻ khô khan). Tôi nghĩ nếu bạn chưa từng đọc sách tiếng Anh thì nên một lần thử. Đừng nghĩ rằng nó quá khó, đừng nghĩ bản thân không thể, bởi “Only those who dare may fly”. Còn với những ai đang băn khoăn không biết nên đọc cuốn sách tiếng Anh nào, bạn có thể bắt đầu với một trong những cuốn sách tôi có gợi ý dưới đây. Chúng là những cuốn sách tôi đã từng đọc, một hay bao nhiêu lần chẳng nhớ. Bạn có thể đọc thử, hoặc tự chọn cho mình cuốn sách phù hợp với sở thích của bạn. (Hãy luôn luôn bắt đầu bằng những gì bạn quan tâm và hứng thú!)',
                'cate_id' => 4,
                'created_at' => now(),
            ],
        ]);

    }
}

class Contacts extends Seeder
{
    public function run()
    {
        DB::table('contacts')->insert([
            'name' => 'Xuân Phi IELTS',
            'icon' => 'lDw5MJI_image_logo11.png',

            'status' => 1,
            'created_at' => now(),
        ]);
        DB::table('contacts')->insert([
            'name' => '096 890 7276',
            'icon' => 'M2IC1g0_image_Icon contact-05.png',

            'status' => 1,
            'created_at' => now(),
        ]);
        DB::table('contacts')->insert([
            'name' => 'Mr . Xuân Phi',
            'icon' => 'FkAneuy_image_Icon contact-06.png',
            'link' => 'https://www.facebook.com/phamxuan.phi',
            'status' => 1,
            'created_at' => now(),
        ]);
    }

}
class CourseOfflines extends Seeder
{
    public function run()
    {
        DB::table('course_offlines')->insert([
            [
                'name' => 'KHOÁ RỄ',
                'slug' => Str::slug("KHOÁ RỄ"."-".time()),
                'image' => 'Q3Ly_image_bg3.jpg',
                'content'=>'<h4>Pre-IELTS level 0</h4>'

.'<ol>'
	.'<li>ĐỐI TƯỢNG:'
	.'<ul>'
		.'<li>Đ&atilde; c&oacute; khả năng tiếng Anh cơ bản</li>'
		.'<li>C&aacute;c kỹ năng Nghe - Đọc c&ograve;n chậm, vốn từ hạn chế</li>'
		.'<li>Phản xạ N&oacute;i chậm, chưa biết c&aacute;ch viết luận tiếng Anh</li>'
	.'</ul>'
	.'</li>'
	.'<li>MỤC TI&Ecirc;U:'
	.'<ul>'
		.'<li>C&oacute; phản xạ Nghe - N&oacute;i trực tiếp tiếng Anh kh&ocirc;ng th&ocirc;ng qua tiếng Việt</li>'
		.'<li>Tự tin giao tiếp sử dụng tiếng Anh trong m&ocirc;i trường l&agrave;m việc, trả lời phỏng vấn</li>'
		.'<li>C&oacute; khả năng n&oacute;i - viết c&acirc;u tiếng Anh r&otilde; &yacute;, đ&uacute;ng ngữ ph&aacute;p</li>'
		.'<li>C&oacute; khả năng sử dụng linh hoạt vốn từ vựng trong c&aacute;c kỹ năng</li>'
		.'<li>Tự tin &ocirc;n luyện IELTS mục ti&ecirc;u 6.0+ trong v&ograve;ng 3-4 th&aacute;ng tiếp theo</li>'
	.'</ul>'
	.'</li>'
	.'<li>TH&Ocirc;NG TIN KH&Oacute;A HỌC:'
	.'<ul>'
		.'<li>Thời lượng: 20 buổi (15 buổi kỹ năng + 5 buổi chuy&ecirc;n s&acirc;u ph&aacute;t &acirc;m v&agrave; phản xạ n&oacute;i)</li>'
		.'<li>Thời gian: 2 buổi/ tuần; 2 giờ/ buổi; 19.00 &ndash; 21.00 c&aacute;c buổi tối</li>'
		.'<li>Địa điểm: T&ograve;a nh&agrave; Dream house, ng&otilde; 136 phố Ch&ugrave;a L&aacute;ng, H&agrave; Nội</li>'
		.'<li>Học ph&iacute;: 4,800,000</li>'
	.'</ul>'
	.'</li>'
.'</ol>',
                'status' => 1,
                'created_at' => now(),
            ],
            [
                'name' => 'KHOÁ GỐC',
                'slug' => Str::slug("KHOÁ GỐC"."-".time()),
                'image' => 'Q3Ly_image_bg3.jpg',
                'content'=>'<h4>Pre-IELTS level 0</h4>'

                    .'<ol>'
                    .'<li>ĐỐI TƯỢNG:'
                    .'<ul>'
                    .'<li>Đ&atilde; c&oacute; khả năng tiếng Anh cơ bản</li>'
                    .'<li>C&aacute;c kỹ năng Nghe - Đọc c&ograve;n chậm, vốn từ hạn chế</li>'
                    .'<li>Phản xạ N&oacute;i chậm, chưa biết c&aacute;ch viết luận tiếng Anh</li>'
                    .'</ul>'
                    .'</li>'
                    .'<li>MỤC TI&Ecirc;U:'
                    .'<ul>'
                    .'<li>C&oacute; phản xạ Nghe - N&oacute;i trực tiếp tiếng Anh kh&ocirc;ng th&ocirc;ng qua tiếng Việt</li>'
                    .'<li>Tự tin giao tiếp sử dụng tiếng Anh trong m&ocirc;i trường l&agrave;m việc, trả lời phỏng vấn</li>'
                    .'<li>C&oacute; khả năng n&oacute;i - viết c&acirc;u tiếng Anh r&otilde; &yacute;, đ&uacute;ng ngữ ph&aacute;p</li>'
                    .'<li>C&oacute; khả năng sử dụng linh hoạt vốn từ vựng trong c&aacute;c kỹ năng</li>'
                    .'<li>Tự tin &ocirc;n luyện IELTS mục ti&ecirc;u 6.0+ trong v&ograve;ng 3-4 th&aacute;ng tiếp theo</li>'
                    .'</ul>'
                    .'</li>'
                    .'<li>TH&Ocirc;NG TIN KH&Oacute;A HỌC:'
                    .'<ul>'
                    .'<li>Thời lượng: 20 buổi (15 buổi kỹ năng + 5 buổi chuy&ecirc;n s&acirc;u ph&aacute;t &acirc;m v&agrave; phản xạ n&oacute;i)</li>'
                    .'<li>Thời gian: 2 buổi/ tuần; 2 giờ/ buổi; 19.00 &ndash; 21.00 c&aacute;c buổi tối</li>'
                    .'<li>Địa điểm: T&ograve;a nh&agrave; Dream house, ng&otilde; 136 phố Ch&ugrave;a L&aacute;ng, H&agrave; Nội</li>'
                    .'<li>Học ph&iacute;: 4,800,000</li>'
                    .'</ul>'
                    .'</li>'
                    .'</ol>',
                'status' => 1,
                'created_at' => now(),
            ],
            [
                'name' => 'KHOÁ THÂN',
                'slug' => Str::slug("KHOÁ THÂN"."-".time()),
                'image' => 'Q3Ly_image_bg3.jpg',
                'content'=>'<h4>Pre-IELTS level 0</h4>'

                    .'<ol>'
                    .'<li>ĐỐI TƯỢNG:'
                    .'<ul>'
                    .'<li>Đ&atilde; c&oacute; khả năng tiếng Anh cơ bản</li>'
                    .'<li>C&aacute;c kỹ năng Nghe - Đọc c&ograve;n chậm, vốn từ hạn chế</li>'
                    .'<li>Phản xạ N&oacute;i chậm, chưa biết c&aacute;ch viết luận tiếng Anh</li>'
                    .'</ul>'
                    .'</li>'
                    .'<li>MỤC TI&Ecirc;U:'
                    .'<ul>'
                    .'<li>C&oacute; phản xạ Nghe - N&oacute;i trực tiếp tiếng Anh kh&ocirc;ng th&ocirc;ng qua tiếng Việt</li>'
                    .'<li>Tự tin giao tiếp sử dụng tiếng Anh trong m&ocirc;i trường l&agrave;m việc, trả lời phỏng vấn</li>'
                    .'<li>C&oacute; khả năng n&oacute;i - viết c&acirc;u tiếng Anh r&otilde; &yacute;, đ&uacute;ng ngữ ph&aacute;p</li>'
                    .'<li>C&oacute; khả năng sử dụng linh hoạt vốn từ vựng trong c&aacute;c kỹ năng</li>'
                    .'<li>Tự tin &ocirc;n luyện IELTS mục ti&ecirc;u 6.0+ trong v&ograve;ng 3-4 th&aacute;ng tiếp theo</li>'
                    .'</ul>'
                    .'</li>'
                    .'<li>TH&Ocirc;NG TIN KH&Oacute;A HỌC:'
                    .'<ul>'
                    .'<li>Thời lượng: 20 buổi (15 buổi kỹ năng + 5 buổi chuy&ecirc;n s&acirc;u ph&aacute;t &acirc;m v&agrave; phản xạ n&oacute;i)</li>'
                    .'<li>Thời gian: 2 buổi/ tuần; 2 giờ/ buổi; 19.00 &ndash; 21.00 c&aacute;c buổi tối</li>'
                    .'<li>Địa điểm: T&ograve;a nh&agrave; Dream house, ng&otilde; 136 phố Ch&ugrave;a L&aacute;ng, H&agrave; Nội</li>'
                    .'<li>Học ph&iacute;: 4,800,000</li>'
                    .'</ul>'
                    .'</li>'
                    .'</ol>',
                'status' => 1,
                'created_at' => now(),
            ],
            [
                'name' => 'KHOÁ NGỌN',
                'slug' => Str::slug("KHOÁ NGỌN"."-".time()),
                'image' => 'Q3Ly_image_bg3.jpg',
                'content'=>'<h4>Pre-IELTS level 0</h4>'

                    .'<ol>'
                    .'<li>ĐỐI TƯỢNG:'
                    .'<ul>'
                    .'<li>Đ&atilde; c&oacute; khả năng tiếng Anh cơ bản</li>'
                    .'<li>C&aacute;c kỹ năng Nghe - Đọc c&ograve;n chậm, vốn từ hạn chế</li>'
                    .'<li>Phản xạ N&oacute;i chậm, chưa biết c&aacute;ch viết luận tiếng Anh</li>'
                    .'</ul>'
                    .'</li>'
                    .'<li>MỤC TI&Ecirc;U:'
                    .'<ul>'
                    .'<li>C&oacute; phản xạ Nghe - N&oacute;i trực tiếp tiếng Anh kh&ocirc;ng th&ocirc;ng qua tiếng Việt</li>'
                    .'<li>Tự tin giao tiếp sử dụng tiếng Anh trong m&ocirc;i trường l&agrave;m việc, trả lời phỏng vấn</li>'
                    .'<li>C&oacute; khả năng n&oacute;i - viết c&acirc;u tiếng Anh r&otilde; &yacute;, đ&uacute;ng ngữ ph&aacute;p</li>'
                    .'<li>C&oacute; khả năng sử dụng linh hoạt vốn từ vựng trong c&aacute;c kỹ năng</li>'
                    .'<li>Tự tin &ocirc;n luyện IELTS mục ti&ecirc;u 6.0+ trong v&ograve;ng 3-4 th&aacute;ng tiếp theo</li>'
                    .'</ul>'
                    .'</li>'
                    .'<li>TH&Ocirc;NG TIN KH&Oacute;A HỌC:'
                    .'<ul>'
                    .'<li>Thời lượng: 20 buổi (15 buổi kỹ năng + 5 buổi chuy&ecirc;n s&acirc;u ph&aacute;t &acirc;m v&agrave; phản xạ n&oacute;i)</li>'
                    .'<li>Thời gian: 2 buổi/ tuần; 2 giờ/ buổi; 19.00 &ndash; 21.00 c&aacute;c buổi tối</li>'
                    .'<li>Địa điểm: T&ograve;a nh&agrave; Dream house, ng&otilde; 136 phố Ch&ugrave;a L&aacute;ng, H&agrave; Nội</li>'
                    .'<li>Học ph&iacute;: 4,800,000</li>'
                    .'</ul>'
                    .'</li>'
                    .'</ol>',
                'status' => 1,
                'created_at' => now(),
            ],
        ]);
        DB::table('course_enrolling')->insert([
            [
                'name' => 'Lớp ngọn tháng 10/2019',
                'image' => 'xuanphi.png',
                'status' => 1,
                'created_at' => now()
            ],
            [
                'name' => 'Lớp ngọn tháng 11/2019',
                'image' => 'xuanphi.png',
                'status' => 1,
                'created_at' => now()
            ],
            [
                'name' => 'Lớp ngọn tháng 9/2019',
                'image' => 'xuanphi.png',
                'status' => 1,
                'created_at' => now()
            ],
            [
                'name' => 'Lớp ngọn tháng 10/2019',
                'image' => 'xuanphi1.png',
                'status' => 1,
                'created_at' => now()
            ],

        ]);
    }

}
class Teacher extends Seeder
{
    public function run()
    {
        DB::table('teachers')->insert([
            [
                'name' => 'Xuân phi',
                'position' => 'Giảng viên',
                'content' =>'Có kinh nghiệm 9 năm trong lĩnh vực giảng dạy ',
                'image' => 'xuanphi.png',
                'status' => 1,
                'created_at' => now()
            ],
            [
                'name' => 'Thảo Linh',
                'position' => 'Giảng viên',
                'content' =>'Có kinh nghiệm 4 năm trong lĩnh vực giảng dạy ',
                'image' => 'xuanphi.png',
                'status' => 1,
                'created_at' => now()
            ],
            [
                'name' => 'Linh Linh',
                'position' => 'Giảng viên',
                'content' =>'Có kinh nghiệm 3 năm trong lĩnh vực giảng dạy ',
                'image' => 'xuanphi.png',
                'status' => 1,
                'created_at' => now()
            ],

        ]);
    }
}
class Student extends Seeder
{
    public function run()
    {
        DB::table('student')->insert([
            'name' => 'Hoàng Thu Hà',
            'image' => 'anh.png',
            'course' => 'Khóa rễ',
            'content' => 'Em chả biết nói gì ngoài việc e rất yêu cô Thủy :)) học hết khóa đầu rất nhớ cô, chỉ muốn đi học cô tiếp :( Cô rất tận tình nè, hiền nè, xinh nè, giảng hay dễ hiểu nè, khiến e ko sợ đi học nữa, cô cũng buồn cười nữa =)',
            'status' => 1,
            'created_at' => now()
        ]);
        DB::table('student')->insert([
            'name' => 'Nguyễn Hữu Tiến ',
            'image' => 'anh.png',
            'course' => 'Khóa ngọn',
            'content' => 'Em chả biết nói gì ngoài việc e rất yêu cô Thủy :)) học hết khóa đầu rất nhớ cô, chỉ muốn đi học cô tiếp :( Cô rất tận tình nè, hiền nè, xinh nè, giảng hay dễ hiểu nè, khiến e ko sợ đi học nữa, cô cũng buồn cười nữa =)',
            'status' => 1,
            'created_at' => now()
        ]);
        DB::table('student')->insert([
            'name' => 'Hoàng Văn Việt',
            'image' => 'anh.png',
            'course' => 'Khóa thân',
            'content' => 'Em chả biết nói gì ngoài việc e rất yêu cô Thủy :)) học hết khóa đầu rất nhớ cô, chỉ muốn đi học cô tiếp :( Cô rất tận tình nè, hiền nè, xinh nè, giảng hay dễ hiểu nè, khiến e ko sợ đi học nữa, cô cũng buồn cười nữa =)',
            'status' => 1,
            'created_at' => now()
        ]);
    }
}


