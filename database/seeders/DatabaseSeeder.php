<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
//        Category::factory(5)->has(Product::factory(100))->create();

//        Category::factory(5)->create();
//        Brand::factory(5)->create();
//        Product::factory(100)->create();

        DB::table('categories')->insert([
            'name' => 'Điện thoại',
            'description' => 'Chuyên bán những dòng điện thoại di động từ phổ thông đến cao cấp nhất với giá cả hợp lý, phải chăng'
        ]);
        DB::table('brands')->insert([
            [
                // ID = 1
                'name' => 'Samsung',
            ],
            [
                // ID = 2
                'name' => 'Apple',
            ],
            [
                // ID = 3
                'name' => 'Oppo',
            ],
            [
                // ID = 4
                'name' => 'Xiaomi',
            ],
            [
                // ID = 5
                'name' => 'Asus',
            ],
            [
                // ID = 6
                'name' => 'Sony',
            ],
            [
                // ID = 7
                'name' => 'Nokia',
            ],
            [
                // ID = 8
                'name' => 'Huawei',
            ],
            [
                // ID = 9
                'name' => 'Realme'
            ],
            [
                // ID = 10
                'name' => 'VSmart'
            ],
        ]);


        $products = [
            [
                "name" => "Điện thoại iPhone 12 64GB",
                "description" => "Điện thoại iPhone 12 64GB Trong những tháng cuối năm 2020 Apple đã chính thức giới thiệu đến người dùng cũng như iFan thế hệ iPhone 12 series mới với hàng loạt tính năng bức phá, thiết kế được lột xác hoàn toàn, hiệu năng đầy mạnh mẽ và một trong số đó chính là iPhone 12 64GB.Hiệu năng vượt xa mọi giới hạn.Apple đã trang bị con chip mới nhất của hãng (tính đến 11/2020) cho iPhone 12 đó là A14 Bionic, được sản xuất trên tiến trình 5 nm với hiệu suất ổn định hơn so với chip A13 được trang bị trên phiên bản tiền nhiệm iPhone 11.",
                "img_url" => "https://cdn.tgdd.vn/Products/Images/42/213031/iphone-12-xanh-duong-new-600x600-600x600.jpg",
                "price" => 21990000,
                "screen" => "OLED, 6.1, Super Retina XDR",
                "resolution" => "1170 x 2532 Pixels",
                "ram" => "4 GB",
                "cpu" => "Apple A14 Bionic 6 nhân",
                "gpu" => "Apple GPU 4 nhân",
                "storage" => "64 GB",
                "brand_id" => 2,
                "category_id" => 1,
                "discontinued" => false,
            ],
            [
                "name" => "Điện thoại Samsung Galaxy S21 5G",
                "description" => "Đón năm mới rộn ràng cùng với series Galaxy S21 đến từ Samsung. Phiên bản tiêu chuẩn cho series lần này là Samsung Galaxy S21 5G, nổi bật với thiết kế tràn viền, cụm camera ấn tượng cho đến hiệu năng mạnh mẽ hàng đầu. \"Bộ cánh\" mới nổi bật và sang trọng, Nổi bật với cụm camera sau được thiết kế đầy mới lạ, phần khuôn hình chữ nhật chứa bộ 3 camera ôm trọn cạnh trái của chiếc smartphone, viền khuôn cong uyển chuyển, hạn chế tối đa độ nhô ra so với mặt lưng, mang lại cái nhìn tổng thể hài hòa, độc đáo.",
                "img_url" => "https://cdn.tgdd.vn/Products/Images/42/220833/samsung-galaxy-s21-tim-600x600-600x600.jpg",
                "price" => 20990000,
                "screen" => "Dynamic AMOLED 2X",
                "resolution" => "Full HD+ (1080 x 2400 Pixels)",
                "ram" => "8 GB",
                "cpu" => "Exynos 2100 8 nhân",
                "gpu" => "Mali-G78 MP14",
                "storage" => "128 GB",
                "brand_id" => 1,
                "category_id" => 1,
                "discontinued" => false,
            ],
            [
                "name" => "Điện thoại OPPO Reno5",
                "description" => "OPPO vừa kịp ra mắt thế hệ OPPO Reno mới nhất của mình vào dịp cuối năm 2020. OPPO Reno5 là sự kết hợp đầy ấn tượng giữa hiệu năng và thiết kế, mang đến cho người dùng một chiếc điện thoại tích hợp nhiều công nghệ camera, sạc pin hàng đầu của OPPO trong một mức giá tầm trung.,\nThiết kế đẹp đậm chất OPPO Reno Series. Có thể nói OPPO Reno5 là mẫu điện thoại phô diễn được đỉnh cao thiết kế và công nghệ chế tác của OPPO khi bề mặt lưng được phủ lớp Reno Glow với ngàn tinh thể phát sáng siêu nhỏ tạo nên hiệu ứng chuyển sắc vô cùng hút mắt.",
                "img_url" => "https://cdn.tgdd.vn/Products/Images/42/220438/oppo-reno5-trang-600x600-1-600x600.jpg",
                "price" => 8390000,
                "screen" => "AMOLED",
                "resolution" => "Full HD+ (1080 x 2400 Pixels)",
                "ram" => "8 GB",
                "cpu" => "Snapdragon 720G 8 nhân",
                "gpu" => "Adreno 618",
                "storage" => "128 GB",
                "brand_id" => 3,
                "category_id" => 1,
                "discontinued" => false,
            ],
            [
                "name" => "Điện thoại Xiaomi Redmi Note 10 Pro MFF",
                "description" => "Điện thoại Xiaomi Redmi Note 10 Pro MFF là phiên bản đặc biệt với khẩu hiệu \"Khai phá Tiềm năng Vô cực\" được Xiaomi ra mắt dành cho người hâm mộ. Cấu hình tương tự Redmi Note 10 Pro còn thiết kế thì được cách tân một ít để phù hợp với đối tượng Mi Fan. Thiết kế cứng cáp và sang trọng. Về thiết kế thì phiên bản đặc biệt không có nhiều điểm khác biệt với bản thường, vẫn sử dụng khung viền bằng kim loại, mặt trước và sau được bảo vệ bởi kính cường lực bóng bẩy, mang lại sự cứng cáp, bền bỉ và không kém phần sang trọng.",
                "img_url" => "https://cdn.tgdd.vn/Products/Images/42/236596/xiaomi0redmi-note-10-pro-mff-600x600-600x600.jpg",
                "price" => 7490000,
                "screen" => "AMOLED",
                "resolution" => "Full HD+ (1080 x 2400 Pixels)",
                "ram" => "8 GB",
                "cpu" => "Snapdragon 732G 8 nhân",
                "gpu" => "Adreno 618",
                "storage" => "128 GB",
                "brand_id" => 4,
                "category_id" => 1,
                "discontinued" => false,
            ],
            [
                "name" => "Điện thoại Realme C20",
                "description" => "Giải trí cả ngày với viên cực khủng, màn hình rộng tràn viền thời thượng, vận hành mượt mà với vi xử lý 8 nhân. Realme C20 cho bạn sự tự do làm những gì mình muốn, thoải mái trải nghiệm những gì bạn thích với mức giá hấp dẫn nhất trong phân khúc. Năng động với diện mạo thời thượng .Realme C20 có một thiết kế cơ bản, tập trung vào tính di động và sự tiện lợi cao khi hoàn thiện nguyên khối cứng cáp, trọng lượng nhẹ, các cạnh viền cũng được làm cong, mang đến sự thoải mái khi cầm nắm.",
                "img_url" => "https://cdn.tgdd.vn/Products/Images/42/232518/realme-c20-xanh-600x600-1-2-600x600.jpg",
                "price" => 2490000,
                "screen" => "AMOLED",
                "resolution" => "Full HD+ (1080 x 2400 Pixels)",
                "ram" => "8 GB",
                "cpu" => "Snapdragon 732G 8 nhân",
                "gpu" => "Adreno 618",
                "storage" => "128 GB",
                "brand_id" => 9,
                "category_id" => 1,
                "discontinued" => false,
            ],
            [
                "name" => "Điện thoại iPhone 12 Pro Max 256GB",
                "description" => "Chiếc điện thoại iPhone 12 Pro Max 256 GB là mẫu smartphone sở hữu nhiều tính năng nổi bật với hệ thống camera chất lượng, hiệu năng vượt trội hay hỗ trợ kết nối 5G hứa hẹn sẽ là mẫu sản phẩm mang lại cảm giác trải nghiệm tối ưu cho người dùng. Hiệu năng cao vượt mọi thử thách. Một sự cải tiến được coi là nguồn lõi và là trái tim hay nguồn sức mạnh để có thể vận hành một chiếc điện thoại siêu phẩm 2020 đó là chipset A14 Bionic được sản xuất trên tiến trình 5 nm cho phép tạo ra 11.8 tỷ bóng bán dẫn mang đến hiệu năng vô cùng mạnh mẽ.",
                "img_url" => "https://cdn.tgdd.vn/Products/Images/42/228743/iphone-12-pro-max-vang-new-600x600-600x600.jpg",
                "price" => 21990000,
                "screen" => "OLED, 6.1, Super Retina XDR",
                "resolution" => "1170 x 2532 Pixels",
                "ram" => "4 GB",
                "cpu" => "Apple A14 Bionic 6 nhân",
                "gpu" => "Apple GPU 4 nhân",
                "storage" => "256 GB",
                "brand_id" => 2,
                "category_id" => 1,
                "discontinued" => false,
            ],
            [
                "name" => "Điện thoại Samsung Galaxy Note 20 Ultra 5G",
                "description" => "Đặc điểm nổi bật của Samsung Galaxy Note 20 Ultra 5G\n\nBộ sản phẩm chuẩn => Hộp, Sách hướng dẫn, Bút cảm ứng, Cây lấy sim, Tai nghe dây đầu Type C, Cáp Type C - Type C, Củ sạc nhanh rời đầu Type C\n\nSamsung Galaxy Note 20 Ultra 5G, mẫu điện thoại flagship cao cấp thuộc dòng Note của Samsung, ra mắt tháng 8/2020 với diện mạo thay đổi cùng những nâng cấp đột phá, đây chắc chắn sẽ là sản phẩm được săn lùng từ những người dùng yêu thích công nghệ cũng như yêu thích smartphone Samsung.\nThiết kế mạnh mẽ nhưng vô cùng sang trọng\nThiết kế Galaxy Note 20 Ultra 5G được hoàn thiện từ khung kim loại cao cấp với 2 mặt kính cường lực được làm cong bóng bẩy, mặt kính do Gorilla phát triển mang lại khả năng chống trầy cực tốt, chống bám bụi bẩn và mồ hôi tay hiệu quả.",
                "img_url" => "https://cdn.tgdd.vn/Products/Images/42/225063/sam-sung-note-20-ultra-vang-dong-600x600.jpg",
                "price" => 20990000,
                "screen" => "Dynamic AMOLED 2X",
                "resolution" => "Full HD+ (1080 x 2400 Pixels)",
                "ram" => "8 GB",
                "cpu" => "Exynos 2100 8 nhân",
                "gpu" => "Mali-G78 MP14",
                "storage" => "128 GB",
                "brand_id" => 1,
                "category_id" => 1,
                "discontinued" => false,
            ],
            [
                "name" => "Điện thoại Xiaomi Mi 11 5G",
                "description" => "Bộ sản phẩm chuẩn => Hộp, Sách hướng dẫn, Jack chuyển tai nghe 3.5mm, Cây lấy sim, Ốp lưng, Cáp Type C, Củ sạc nhanh rời đầu Type A\n\nXiaomi chốt năm 2020 cực đỉnh và mở đầu năm mới không thể nào ấn tượng hơn với siêu phẩm mang tên Xiaomi Mi 11. Trải nghiệm hiệu năng hàng đầu với vi xử lý Qualcomm Snapdragon 888, cùng loạt công nghệ đỉnh cao, khiến bất kỳ ai cũng sẽ choáng ngợp về smartphone này.\nThiết kế nổi bật với cụm camera độc nhất\nCó thể thấy, điểm sáng trong thiết kế của Mi 11 đến từ cụm 3 camera mặt sau được đặt trong mô-đun hình vuông, được phân tầng với 2 lớp kính tạo nên sự khác biệt và nổi bật ngay từ cái nhìn đầu tiên.",
                "img_url" => "https://cdn.tgdd.vn/Products/Images/42/226264/xiaomi-mi-11-xanhduong-600x600-600x600.jpg",
                "price" => 8490000,
                "screen" => "AMOLED",
                "resolution" => "Full HD+ (1080 x 2400 Pixels)",
                "ram" => "8 GB",
                "cpu" => "Snapdragon 732G 8 nhân",
                "gpu" => "Adreno 618",
                "storage" => "128 GB",
                "brand_id" => 4,
                "category_id" => 1,
                "discontinued" => false,
            ],
            [
                "name" => "Điện thoại Vsmart Aris Pro",
                "description" => "Thương hiệu smartphone Việt - Vsmart đã chính thức trình làng Vsmart Aris Pro. Sự ra mắt mẫu điện thoại này đánh dấu một bước ngoặc lớn trong làng smartphone với công nghệ camera ẩn trong màn hình, mức giá hợp lý giúp người Việt có cơ hội tiếp cận những công nghệ mới nhất hiện nay.\nCamera selfie ẩn, đỉnh cao của thiết kế màn hình tràn viền\nAris Pro là một trong những dòng điện thoại đầu tiên được trang bị camera selfie với công nghệ ẩn sau màn hình độc đáo, tạo nên một màn hình liền mạch, không còn khiếm khuyết \"đục lỗ\" hay \"giọt nước\".",
                "img_url" => "https://cdn.tgdd.vn/Products/Images/42/228531/vsmart-aris-pro-green-600jpg-600x600.jpg",
                "price" => 2490000,
                "screen" => "AMOLED",
                "resolution" => "Full HD+ (1080 x 2400 Pixels)",
                "ram" => "8 GB",
                "cpu" => "Snapdragon 732G 8 nhân",
                "gpu" => "Adreno 618",
                "storage" => "128 GB",
                "brand_id" => 10,
                "category_id" => 1,
                "discontinued" => false,
            ],
            [
                "name" => "Điện thoại Energizer E20",
                "description" => "Mang thiết kế nắp gập cổ điển, mặt phím bấm lớn cùng thời lượng pin ấn tương 1000 mAh - Energizer E20 phù hợp trở thành chiếc điện thoại thứ 2 hoặc làm quà tặng cho người lớn tuổi.\nGọn gàng và dễ bấm phím\nĐiện thoại Energizer E20 được hoàn thiện bằng lớp vỏ nhựa cứng cáp, thiết kế nắp gập cổ điển hiếm thấy ở thời điểm hiện tại rất ấn tượng so với mức giá siêu rẻ.",
                "img_url" => "https://cdn.tgdd.vn/Products/Images/42/227008/energizer-e20-den-600x600.jpg",
                "price" => 290000,
                "screen" => "AMOLED",
                "resolution" => "Full HD+ (1080 x 2400 Pixels)",
                "ram" => "8 GB",
                "cpu" => "Snapdragon 732G 8 nhân",
                "gpu" => "Adreno 618",
                "storage" => "128 GB",
                "brand_id" => 8,
                "category_id" => 1,
                "discontinued" => true,
            ],
            [
                "name" => "Điện thoại Nokia 5.4",
                "description" => "Sau Nokia 5.3, HMD Global tiếp tục cho ra mắt chiếc điện thoại Nokia 5.4 với nhiều nâng cấp thiết kế, cấu hình cùng camera mạnh mẽ hứa hẹn sẽ làm hài lòng người sử dụng, ngay cả những người khó tính nhất.\nThiết kế nguyên khối bền bỉ chắc chắn\nMặc dù là một chiếc smartphone được sản xuất trong phân khúc giá tầm trung nhưng Nokia 5.4 không hề lỗi thời với lối thiết kế nguyên khối vô cùng cứng cáp, mặt lưng làm từ nhựa phủ bóng giả kính vô cùng sang trọng và bắt mắt.",
                "img_url" => "https://cdn.tgdd.vn/Products/Images/42/231706/nokia-54-xanh-600x600-600x600.jpg",
                "price" => 290000,
                "screen" => "AMOLED",
                "resolution" => "Full HD+ (1080 x 2400 Pixels)",
                "ram" => "8 GB",
                "cpu" => "Snapdragon 732G 8 nhân",
                "gpu" => "Adreno 618",
                "storage" => "128 GB",
                "brand_id" => 7,
                "category_id" => 1,
                "discontinued" => false,
            ]
        ];
        DB::table('products')->insert($products);

        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@local',
            'password' => Hash::make('admin'),
            'is_admin' => true,
        ]);

        DB::table('users')->insert([
            'name' => 'user',
            'email' => 'user@local',
            'password' => Hash::make('user'),
        ]);
    }
}
