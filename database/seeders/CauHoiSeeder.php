<?php

namespace Database\Seeders;

use App\Models\CauHoi;
use App\Models\DapAnCauHoi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CauHoiSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('cau_hois')->delete();
        DB::table('cau_hois')->truncate();

        DB::table('dap_an_cau_hois')->delete();
        DB::table('dap_an_cau_hois')->truncate();

        $monHocs = DB::table('mon_hocs')->get();

        foreach($monHocs as $monHoc) {
            if($monHoc->ma_mon_hoc == 'IS' && $monHoc->ma_so_mon_hoc == '216') {
                $cauHoiTracNghiem = [
                    [
                        'ten_cau_hoi' => 'Khóa chính (Primary Key) trong CSDL là gì?',
                        'dap_an' => [
                            ['noi_dung' => 'Trường dùng để liên kết các bảng', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'Trường xác định duy nhất một bản ghi trong bảng', 'is_dap_an_dung' => 1],
                            ['noi_dung' => 'Trường chứa dữ liệu số', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'Trường đầu tiên của bảng', 'is_dap_an_dung' => 0],
                        ]
                    ],
                    [
                        'ten_cau_hoi' => 'Đâu là các dạng chuẩn hóa cơ sở dữ liệu?',
                        'dap_an' => [
                            ['noi_dung' => '1NF, 2NF, 3NF', 'is_dap_an_dung' => 1],
                            ['noi_dung' => 'A, B, C', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'X, Y, Z', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'Không có dạng chuẩn', 'is_dap_an_dung' => 0],
                        ]
                    ],
                    [
                        'ten_cau_hoi' => 'Một quan hệ được gọi là ở dạng chuẩn 1 (1NF) khi:',
                        'dap_an' => [
                            ['noi_dung' => 'Các thuộc tính khóa phụ phụ thuộc hoàn toàn vào thuộc tính khóa chính', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'Các thuộc tính không khóa phụ thuộc bắc cầu vào thuộc tính khóa chính', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'Các thuộc tính đều chứa giá trị đơn và không lặp lại', 'is_dap_an_dung' => 1],
                            ['noi_dung' => 'Tất cả các phương án trên', 'is_dap_an_dung' => 0],
                        ]
                    ],
                    [
                        'ten_cau_hoi' => 'Trong mô hình quan hệ, khóa ngoại (Foreign Key) là:',
                        'dap_an' => [
                            ['noi_dung' => 'Khóa chính của bảng hiện tại', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'Thuộc tính tham chiếu đến khóa chính của bảng khác', 'is_dap_an_dung' => 1],
                            ['noi_dung' => 'Thuộc tính duy nhất trong bảng', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'Thuộc tính đầu tiên của bảng', 'is_dap_an_dung' => 0],
                        ]
                    ],
                    [
                        'ten_cau_hoi' => 'Trong SQL, lệnh nào dùng để sửa đổi dữ liệu trong bảng?',
                        'dap_an' => [
                            ['noi_dung' => 'MODIFY', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'ALTER', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'UPDATE', 'is_dap_an_dung' => 1],
                            ['noi_dung' => 'CHANGE', 'is_dap_an_dung' => 0],
                        ]
                    ],
                    [
                        'ten_cau_hoi' => 'Câu lệnh SQL nào được sử dụng để xóa toàn bộ dữ liệu trong bảng?',
                        'dap_an' => [
                            ['noi_dung' => 'DELETE TABLE', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'DROP TABLE', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'TRUNCATE TABLE', 'is_dap_an_dung' => 1],
                            ['noi_dung' => 'REMOVE TABLE', 'is_dap_an_dung' => 0],
                        ]
                    ],
                    [
                        'ten_cau_hoi' => 'Trong SQL, để kết hợp kết quả của hai câu lệnh SELECT ta dùng:',
                        'dap_an' => [
                            ['noi_dung' => 'JOIN', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'UNION', 'is_dap_an_dung' => 1],
                            ['noi_dung' => 'MERGE', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'CONNECT', 'is_dap_an_dung' => 0],
                        ]
                    ],
                    [
                        'ten_cau_hoi' => 'Đâu KHÔNG phải là một loại JOIN trong SQL?',
                        'dap_an' => [
                            ['noi_dung' => 'INNER JOIN', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'LEFT JOIN', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'RIGHT JOIN', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'MIDDLE JOIN', 'is_dap_an_dung' => 1],
                        ]
                    ],
                    [
                        'ten_cau_hoi' => 'Trong SQL, hàm COUNT() được sử dụng để:',
                        'dap_an' => [
                            ['noi_dung' => 'Đếm số bản ghi', 'is_dap_an_dung' => 1],
                            ['noi_dung' => 'Tính tổng giá trị', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'Tìm giá trị lớn nhất', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'Tìm giá trị nhỏ nhất', 'is_dap_an_dung' => 0],
                        ]
                    ],
                    [
                        'ten_cau_hoi' => 'Để sắp xếp kết quả truy vấn theo thứ tự tăng dần, ta sử dụng:',
                        'dap_an' => [
                            ['noi_dung' => 'SORT BY', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'ORDER BY DESC', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'ORDER BY ASC', 'is_dap_an_dung' => 1],
                            ['noi_dung' => 'ARRANGE BY', 'is_dap_an_dung' => 0],
                        ]
                    ],
                    [
                        'ten_cau_hoi' => 'Tính đa hình trong OOP là gì?',
                        'dap_an' => [
                            ['noi_dung' => 'Khả năng một đối tượng có nhiều hình dạng', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'Khả năng một phương thức có nhiều cách thực hiện khác nhau', 'is_dap_an_dung' => 1],
                            ['noi_dung' => 'Khả năng tạo nhiều đối tượng từ một class', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'Khả năng kế thừa từ nhiều class', 'is_dap_an_dung' => 0],
                        ]
                    ],
                    [
                        'ten_cau_hoi' => 'Access modifier nào có phạm vi truy cập hẹp nhất?',
                        'dap_an' => [
                            ['noi_dung' => 'public', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'protected', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'private', 'is_dap_an_dung' => 1],
                            ['noi_dung' => 'default', 'is_dap_an_dung' => 0],
                        ]
                    ],
                    [
                        'ten_cau_hoi' => 'Đâu KHÔNG phải là ưu điểm của OOP?',
                        'dap_an' => [
                            ['noi_dung' => 'Tái sử dụng code', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'Dễ bảo trì', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'Tốc độ thực thi nhanh hơn', 'is_dap_an_dung' => 1],
                            ['noi_dung' => 'Tính module hóa cao', 'is_dap_an_dung' => 0],
                        ]
                    ],
                    [
                        'ten_cau_hoi' => 'Phương thức nào được gọi khi một đối tượng bị hủy?',
                        'dap_an' => [
                            ['noi_dung' => 'Destructor', 'is_dap_an_dung' => 1],
                            ['noi_dung' => 'Finalizer', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'Disposer', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'Cleaner', 'is_dap_an_dung' => 0],
                        ]
                    ],
                    [
                        'ten_cau_hoi' => 'Từ khóa "static" trong OOP có ý nghĩa gì?',
                        'dap_an' => [
                            ['noi_dung' => 'Thuộc về instance của class', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'Thuộc về class và dùng chung cho mọi instance', 'is_dap_an_dung' => 1],
                            ['noi_dung' => 'Không thể thay đổi giá trị', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'Chỉ có thể truy cập trong class', 'is_dap_an_dung' => 0],
                        ]
                    ],
                    [
                        'ten_cau_hoi' => 'Overloading là gì?',
                        'dap_an' => [
                            ['noi_dung' => 'Ghi đè phương thức của lớp cha', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'Định nghĩa nhiều phương thức cùng tên khác tham số', 'is_dap_an_dung' => 1],
                            ['noi_dung' => 'Kế thừa từ nhiều lớp', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'Ẩn thuộc tính của lớp', 'is_dap_an_dung' => 0],
                        ]
                    ],
                    [
                        'ten_cau_hoi' => 'Interface khác gì với Abstract class?',
                        'dap_an' => [
                            ['noi_dung' => 'Interface không thể có thuộc tính', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'Interface không thể có constructor', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'Interface có thể implements nhiều interface khác', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'Interface chỉ có thể chứa abstract methods', 'is_dap_an_dung' => 1],
                        ]
                    ],
                    [
                        'ten_cau_hoi' => 'Đâu là cách để ngăn một class không bị kế thừa?',
                        'dap_an' => [
                            ['noi_dung' => 'Sử dụng từ khóa private', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'Sử dụng từ khóa final', 'is_dap_an_dung' => 1],
                            ['noi_dung' => 'Sử dụng từ khóa static', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'Sử dụng từ khóa sealed', 'is_dap_an_dung' => 0],
                        ]
                    ],
                    [
                        'ten_cau_hoi' => 'Composition trong OOP là gì?',
                        'dap_an' => [
                            ['noi_dung' => 'Kế thừa từ nhiều class', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'Một class chứa đối tượng của class khác', 'is_dap_an_dung' => 1],
                            ['noi_dung' => 'Ghi đè phương thức', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'Đóng gói dữ liệu', 'is_dap_an_dung' => 0],
                        ]
                    ],
                    [
                        'ten_cau_hoi' => 'Phương thức nào được gọi tự động khi khởi tạo đối tượng?',
                        'dap_an' => [
                            ['noi_dung' => 'Constructor', 'is_dap_an_dung' => 1],
                            ['noi_dung' => 'Destructor', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'Initializer', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'Main', 'is_dap_an_dung' => 0],
                        ]
                    ],
                    [
                        'ten_cau_hoi' => 'Tính đóng gói (Encapsulation) trong OOP là gì?',
                        'dap_an' => [
                            ['noi_dung' => 'Khả năng tái sử dụng code', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'Khả năng che giấu thông tin và đóng gói dữ liệu', 'is_dap_an_dung' => 1],
                            ['noi_dung' => 'Khả năng kế thừa từ class khác', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'Khả năng tạo nhiều đối tượng', 'is_dap_an_dung' => 0],
                        ]
                    ],
                    [
                        'ten_cau_hoi' => 'Đâu là cách khai báo một interface trong PHP?',
                        'dap_an' => [
                            ['noi_dung' => 'abstract class MyInterface', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'interface MyInterface', 'is_dap_an_dung' => 1],
                            ['noi_dung' => 'class MyInterface', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'implement MyInterface', 'is_dap_an_dung' => 0],
                        ]
                    ],
                    [
                        'ten_cau_hoi' => 'Trong PHP, từ khóa nào được sử dụng để kế thừa class?',
                        'dap_an' => [
                            ['noi_dung' => 'implements', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'extends', 'is_dap_an_dung' => 1],
                            ['noi_dung' => 'inherits', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'include', 'is_dap_an_dung' => 0],
                        ]
                    ],
                    [
                        'ten_cau_hoi' => 'Phương thức abstract trong abstract class có đặc điểm gì?',
                        'dap_an' => [
                            ['noi_dung' => 'Phải có code thực thi', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'Không được có code thực thi', 'is_dap_an_dung' => 1],
                            ['noi_dung' => 'Phải là static', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'Phải là private', 'is_dap_an_dung' => 0],
                        ]
                    ],
                    [
                        'ten_cau_hoi' => 'Đâu là ví dụ về tính đa hình trong OOP?',
                        'dap_an' => [
                            ['noi_dung' => 'Sử dụng private để ẩn dữ liệu', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'Kế thừa thuộc tính từ class cha', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'Ghi đè phương thức của class cha', 'is_dap_an_dung' => 1],
                            ['noi_dung' => 'Tạo nhiều instance từ một class', 'is_dap_an_dung' => 0],
                        ]
                    ],
                    [
                        'ten_cau_hoi' => 'Magic method nào trong PHP được gọi khi truy cập thuộc tính không tồn tại?',
                        'dap_an' => [
                            ['noi_dung' => '__construct()', 'is_dap_an_dung' => 0],
                            ['noi_dung' => '__get()', 'is_dap_an_dung' => 1],
                            ['noi_dung' => '__set()', 'is_dap_an_dung' => 0],
                            ['noi_dung' => '__call()', 'is_dap_an_dung' => 0],
                        ]
                    ],
                    [
                        'ten_cau_hoi' => 'Trait trong PHP được sử dụng để làm gì?',
                        'dap_an' => [
                            ['noi_dung' => 'Thay thế kế thừa đa cấp', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'Tái sử dụng code trong nhiều class', 'is_dap_an_dung' => 1],
                            ['noi_dung' => 'Định nghĩa interface', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'Tạo abstract class', 'is_dap_an_dung' => 0],
                        ]
                    ],
                    [
                        'ten_cau_hoi' => 'Namespace trong PHP có tác dụng gì?',
                        'dap_an' => [
                            ['noi_dung' => 'Tăng tốc độ thực thi', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'Tránh xung đột tên class', 'is_dap_an_dung' => 1],
                            ['noi_dung' => 'Tạo kế thừa đa cấp', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'Quản lý bộ nhớ', 'is_dap_an_dung' => 0],
                        ]
                    ],

                ];

                $cauHoiTraLoiNgan = [
                    [
                        'ten_cau_hoi' => 'Giải thích khái niệm "method chaining" trong OOP?',
                        'dap_an' => 'Method chaining là kỹ thuật cho phép gọi nhiều phương thức liên tiếp trên cùng một đối tượng bằng cách return $this'
                    ],
                    [
                        'ten_cau_hoi' => 'Sự khác biệt giữa "early binding" và "late binding"?',
                        'dap_an' => 'Early binding xảy ra tại compile time, late binding xảy ra tại runtime. Late binding cho phép đa hình động'
                    ],
                    [
                        'ten_cau_hoi' => 'Giải thích khái niệm "composition over inheritance"?',
                        'dap_an' => 'Ưu tiên sử dụng composition (has-a) thay vì inheritance (is-a) để giảm sự phụ thuộc và tăng tính linh hoạt'
                    ],
                    [
                        'ten_cau_hoi' => 'Magic method __toString() trong PHP dùng để làm gì?',
                        'dap_an' => 'Định nghĩa cách chuyển đổi một object thành string khi object được sử dụng như một string'
                    ],
                    [
                        'ten_cau_hoi' => 'Giải thích khái niệm "method overloading" trong PHP?',
                        'dap_an' => 'PHP không hỗ trợ method overloading trực tiếp nhưng có thể mô phỏng bằng __call() và __callStatic()'
                    ],
                    [
                        'ten_cau_hoi' => 'Tại sao nên sử dụng Dependency Injection?',
                        'dap_an' => 'Giúp giảm sự phụ thuộc giữa các class, dễ test và maintain, tăng tính tái sử dụng'
                    ],
                    [
                        'ten_cau_hoi' => 'Giải thích về "type hinting" trong PHP?',
                        'dap_an' => 'Chỉ định kiểu dữ liệu cho tham số và giá trị trả về của phương thức, giúp code an toàn hơn'
                    ],
                    [
                        'ten_cau_hoi' => 'Khái niệm "final" trong PHP dùng để làm gì?',
                        'dap_an' => 'Ngăn class không bị kế thừa (final class) hoặc ngăn phương thức không bị override (final method)'
                    ],
                    [
                        'ten_cau_hoi' => 'Giải thích về "autoloading" trong PHP?',
                        'dap_an' => 'Tự động load class khi được sử dụng mà không cần include/require, thường dùng spl_autoload_register()'
                    ],
                    [
                        'ten_cau_hoi' => 'SQL là viết tắt của từ gì?',
                        'dap_an' => 'Structured Query Language'
                    ],
                    [
                        'ten_cau_hoi' => 'Lệnh SQL để tạo bảng mới là gì?',
                        'dap_an' => 'CREATE TABLE'
                    ],
                    [
                        'ten_cau_hoi' => 'Viết câu lệnh SQL để lấy tất cả dữ liệu từ bảng "users"',
                        'dap_an' => 'SELECT * FROM users'
                    ],
                    [
                        'ten_cau_hoi' => 'Trong SQL, để thêm điều kiện vào câu truy vấn ta dùng mệnh đề nào?',
                        'dap_an' => 'WHERE'
                    ],
                    [
                        'ten_cau_hoi' => 'Để xóa một bảng trong SQL ta dùng lệnh gì?',
                        'dap_an' => 'DROP TABLE'
                    ],
                    [
                        'ten_cau_hoi' => 'Viết câu lệnh SQL để đếm số bản ghi trong bảng "products"',
                        'dap_an' => 'SELECT COUNT(*) FROM products'
                    ],
                    [
                        'ten_cau_hoi' => 'Trong SQL, để nhóm các bản ghi ta dùng mệnh đề nào?',
                        'dap_an' => 'GROUP BY'
                    ],
                    [
                        'ten_cau_hoi' => 'Để thêm một bản ghi mới vào bảng ta dùng lệnh gì?',
                        'dap_an' => 'INSERT INTO'
                    ],
                    [
                        'ten_cau_hoi' => 'Viết câu lệnh SQL để tìm giá trị lớn nhất trong cột "price"',
                        'dap_an' => 'SELECT MAX(price)'
                    ],
                    [
                        'ten_cau_hoi' => 'Trong SQL, để kết hợp các bảng ta dùng mệnh đề nào?',
                        'dap_an' => 'JOIN'
                    ],
                    [
                        'ten_cau_hoi' => 'Sự khác biệt giữa overriding và overloading là gì?',
                        'dap_an' => 'Overriding là ghi đè phương thức của lớp cha, giữ nguyên tham số. Overloading là định nghĩa nhiều phương thức cùng tên nhưng khác tham số trong cùng một lớp'
                    ],
                    [
                        'ten_cau_hoi' => 'Tại sao nên sử dụng interface thay vì abstract class trong một số trường hợp?',
                        'dap_an' => 'Interface cho phép đa kế thừa, định nghĩa contract rõ ràng, và tăng tính loose coupling trong ứng dụng'
                    ],
                    [
                        'ten_cau_hoi' => 'Giải thích khái niệm "loose coupling"?',
                        'dap_an' => 'Loose coupling là thiết kế trong đó các thành phần có độ phụ thuộc thấp vào nhau, dễ dàng thay đổi/bảo trì'
                    ],
                    [
                        'ten_cau_hoi' => 'Dependency Injection là gì?',
                        'dap_an' => 'Là kỹ thuật truyền các dependency từ bên ngoài vào class thay vì tạo trong class, giúp giảm sự phụ thuộc giữa các class'
                    ],
                    [
                        'ten_cau_hoi' => 'SOLID là viết tắt của những nguyên tắc nào?',
                        'dap_an' => 'Single Responsibility, Open-Closed, Liskov Substitution, Interface Segregation, Dependency Inversion'
                    ],
                    [
                        'ten_cau_hoi' => 'Giải thích nguyên tắc Single Responsibility?',
                        'dap_an' => 'Một class chỉ nên có một lý do để thay đổi, tức là chỉ nên có một nhiệm vụ duy nhất'
                    ],
                    [
                        'ten_cau_hoi' => 'Khi nào nên sử dụng abstract class?',
                        'dap_an' => 'Khi các lớp con có nhiều code chung cần chia sẻ và có mối quan hệ IS-A với lớp cha'
                    ],
                    [
                        'ten_cau_hoi' => 'Giải thích khái niệm "cohesion" trong OOP?',
                        'dap_an' => 'Cohesion là mức độ các thành phần trong một module liên quan với nhau. High cohesion là khi các thành phần có liên quan chặt chẽ'
                    ],
                    [
                        'ten_cau_hoi' => 'Giải thích khái niệm "method chaining" trong OOP?',
                        'dap_an' => 'Method chaining là kỹ thuật cho phép gọi nhiều phương thức liên tiếp trên cùng một đối tượng bằng cách return $this'
                    ],
                    [
                        'ten_cau_hoi' => 'Sự khác biệt giữa "early binding" và "late binding"?',
                        'dap_an' => 'Early binding xảy ra tại compile time, late binding xảy ra tại runtime. Late binding cho phép đa hình động'
                    ],
                    [
                        'ten_cau_hoi' => 'Giải thích khái niệm "composition over inheritance"?',
                        'dap_an' => 'Ưu tiên sử dụng composition (has-a) thay vì inheritance (is-a) để giảm sự phụ thuộc và tăng tính linh hoạt'
                    ],
                    [
                        'ten_cau_hoi' => 'Magic method __toString() trong PHP dùng để làm gì?',
                        'dap_an' => 'Định nghĩa cách chuyển đổi một object thành string khi object được sử dụng như một string'
                    ],
                    [
                        'ten_cau_hoi' => 'Giải thích khái niệm "method overloading" trong PHP?',
                        'dap_an' => 'PHP không hỗ trợ method overloading trực tiếp nhưng có thể mô phỏng bằng __call() và __callStatic()'
                    ],
                    [
                        'ten_cau_hoi' => 'Tại sao nên sử dụng Dependency Injection?',
                        'dap_an' => 'Giúp giảm sự phụ thuộc giữa các class, dễ test và maintain, tăng tính tái sử dụng'
                    ],
                    [
                        'ten_cau_hoi' => 'Giải thích về "type hinting" trong PHP?',
                        'dap_an' => 'Chỉ định kiểu dữ liệu cho tham số và giá trị trả về của phương thức, giúp code an toàn hơn'
                    ],
                    [
                        'ten_cau_hoi' => 'Khái niệm "final" trong PHP dùng để làm gì?',
                        'dap_an' => 'Ngăn class không bị kế thừa (final class) hoặc ngăn phương thức không bị override (final method)'
                    ],
                    [
                        'ten_cau_hoi' => 'Giải thích về "autoloading" trong PHP?',
                        'dap_an' => 'Tự động load class khi được sử dụng mà không cần include/require, thường dùng spl_autoload_register()'
                    ]
                ];

                $cauHoiTuLuan = [
                    [
                        'ten_cau_hoi' => 'So sánh chi tiết các thuật toán sắp xếp (Bubble Sort, Selection Sort, Insertion Sort, Quick Sort, Merge Sort) về độ phức tạp, ưu nhược điểm và trường hợp nên sử dụng?',
                        'dap_an' => "1. Bubble Sort:\n" .
                                   "- Độ phức tạp: O(n^2)\n" .
                                   "- Ưu điểm: Đơn giản, dễ hiểu\n" .
                                   "- Nhược điểm: Chậm với dữ liệu lớn\n" .
                                   "- Sử dụng: Dữ liệu nhỏ, gần như đã sắp xếp\n\n" .
                                   "2. Selection Sort:\n" .
                                   "- Độ phức tạp: O(n^2)\n" .
                                   "- Ưu điểm: Số lần swap ít\n" .
                                   "- Nhược điểm: Không ổn định\n" .
                                   "- Sử dụng: Dữ liệu nhỏ\n\n" .
                                   "3. Insertion Sort:\n" .
                                   "- Độ phức tạp: O(n^2)\n" .
                                   "- Ưu điểm: Hiệu quả với dữ liệu gần sắp xếp\n" .
                                   "- Nhược điểm: Chậm với dữ liệu ngẫu nhiên\n" .
                                   "- Sử dụng: Dữ liệu nhỏ, gần sắp xếp\n\n" .
                                   "4. Quick Sort:\n" .
                                   "- Độ phức tạp: O(n log n) trung bình, O(n^2) worst case\n" .
                                   "- Ưu điểm: Nhanh trong thực tế\n" .
                                   "- Nhược điểm: Worst case kém\n" .
                                   "- S dụng: Phổ biến nhất, dữ liệu lớn\n\n" .
                                   "5. Merge Sort:\n" .
                                   "- Độ phức tạp: O(n log n)\n" .
                                   "- Ưu điểm: Ổn định, độ phức tạp không đổi\n" .
                                   "- Nhược điểm: Cần không gian phụ\n" .
                                   "- Sử dụng: Cần sắp xếp ổn định, dữ liệu lớn"
                    ],
                    [
                        'ten_cau_hoi' => 'Phân tích chi tiết về cây đỏ-đen (Red-Black Tree), các quy tắc và các thao tác cân bằng cây?',
                        'dap_an' => "Cây đỏ-đen (Red-Black Tree):\n\n" .
                                   "1. Các quy tắc:\n" .
                                   "- Mọi node có màu đỏ hoặc đen\n" .
                                   "- Node gốc là đen\n" .
                                   "- Các node lá NULL là đen\n" .
                                   "- Node đỏ không có con đỏ\n" .
                                   "- Mọi đường đi từ gốc đến lá có cùng số node đen\n\n" .
                                   "2. Các thao tác cân bằng:\n" .
                                   "a) Xoay trái (Left Rotation):\n" .
                                   "- Thực hiện khi cần giảm chiều cao bên phải\n" .
                                   "- Giữ tính chất BST\n\n" .
                                   "b) Xoay phải (Right Rotation):\n" .
                                   "- Thực hiện khi cần giảm chiều cao bên trái\n" .
                                   "- Giữ tính chất BST\n\n" .
                                   "3. Thao tác thêm node:\n" .
                                   "- Thêm như BST thông thường\n" .
                                   "- Node mới màu đỏ\n" .
                                   "- Cân bằng lại nếu vi phạm quy tắc\n\n" .
                                   "4. Thao tác xóa node:\n" .
                                   "- Phức tạp hơn thêm node\n" .
                                   "- Cần xử lý nhiều trường hợp\n" .
                                   "- Có thể cần nhiều lần cân bằng"
                    ],
                    [
                        'ten_cau_hoi' => 'Phân tích chi tiết về Design Pattern và các nhóm Design Pattern chính?',
                        'dap_an' => "Design Pattern trong OOP:\n\n" .
                                   "1. Creational Patterns:\n" .
                                   "- Singleton: Đảm bảo một class chỉ có một instance\n" .
                                   "- Factory Method: Tạo đối tượng mà không cần chỉ rõ class\n" .
                                   "- Abstract Factory: Tạo họ các đối tượng liên quan\n" .
                                   "- Builder: Xây dựng đối tượng phức tạp theo từng bước\n" .
                                   "- Prototype: Tạo đối tượng bằng cách clone\n\n" .
                                   "2. Structural Patterns:\n" .
                                   "- Adapter: Chuyển đổi interface của class\n" .
                                   "- Bridge: Tách abstraction và implementation\n" .
                                   "- Composite: Xử lý cấu trúc phân cấp\n" .
                                   "- Decorator: Thêm chức năng động cho đối tượng\n\n" .
                                   "3. Behavioral Patterns:\n" .
                                   "- Observer: Định nghĩa phụ thuộc 1-nhiều\n" .
                                   "- Strategy: Định nghĩa họ thuật toán có thể thay thế\n" .
                                   "- Command: Đóng gói request thành đối tượng\n" .
                                   "- State: Thay đổi hành vi khi state thay đổi"
                    ],
                    [
                        'ten_cau_hoi' => 'Phân tích các Design Pattern phổ biến trong PHP và cách áp dụng?',
                        'dap_an' => "Design Patterns trong PHP:\n\n" .
                                   "1. Singleton Pattern:\n" .
                                   "- Đảm bảo class chỉ có một instance\n" .
                                   "- Sử dụng cho database connection, config\n" .
                                   "- Cách implement: private constructor, static instance\n\n" .
                                   "2. Factory Pattern:\n" .
                                   "- Tạo object mà không expose logic\n" .
                                   "- Sử dụng interface chung\n" .
                                   "- Ví dụ: DatabaseFactory tạo MySQL/PostgreSQL connection\n\n" .
                                   "3. Strategy Pattern:\n" .
                                   "- Định nghĩa họ các thuật toán có thể thay thế\n" .
                                   "- Ví dụ: Payment strategies (PayPal, Credit Card)\n\n" .
                                   "4. Observer Pattern:\n" .
                                   "- Định nghĩa cơ chế subscription\n" .
                                   "- Ví dụ: Event handling system\n\n" .
                                   "5. Repository Pattern:\n" .
                                   "- Tách logic truy cập dữ liệu\n" .
                                   "- Giúp thay đổi data source dễ dàng"
                    ],

                ];

                // Tạo câu hỏi trắc nghiệm
                foreach($cauHoiTracNghiem as $cauHoi) {
                    $ch = CauHoi::create([
                        'id_mon_hoc'      => $monHoc->id,
                        'ten_cau_hoi'     => $cauHoi['ten_cau_hoi'],
                        'loai_cau_hoi'    => CauHoi::TRAC_NGHIEM,
                        'so_luong_dap_an' => count($cauHoi['dap_an']),
                        'slug'            => Str::slug($cauHoi['ten_cau_hoi'])
                    ]);

                    foreach($cauHoi['dap_an'] as $key => $dapAn) {
                        DapAnCauHoi::create([
                            'id_cau_hoi'     => $ch->id,
                            'ten_dap_an'     => 'Đáp án ' . ($key + 1),
                            'noi_dung'       => $dapAn['noi_dung'],
                            'is_dap_an_dung' => $dapAn['is_dap_an_dung']
                        ]);
                    }
                }

                // Tạo câu hỏi trả lời ngắn
                foreach($cauHoiTraLoiNgan as $cauHoi) {
                    $ch = CauHoi::create([
                        'id_mon_hoc'      => $monHoc->id,
                        'ten_cau_hoi'     => $cauHoi['ten_cau_hoi'],
                        'loai_cau_hoi'    => CauHoi::TRA_LOI_NGAN,
                        'so_luong_dap_an' => 1,
                        'slug'            => Str::slug($cauHoi['ten_cau_hoi'])
                    ]);

                    DapAnCauHoi::create([
                        'id_cau_hoi'     => $ch->id,
                        'ten_dap_an'     => 'Đáp án Ngắn',
                        'noi_dung'       => $cauHoi['dap_an'],
                        'is_dap_an_dung' => 1
                    ]);
                }

                // Tạo câu hỏi tự luận
                foreach($cauHoiTuLuan as $cauHoi) {
                    $ch = CauHoi::create([
                        'id_mon_hoc'      => $monHoc->id,
                        'ten_cau_hoi'     => $cauHoi['ten_cau_hoi'],
                        'loai_cau_hoi'    => CauHoi::TU_LUAN,
                        'so_luong_dap_an' => 1,
                        'slug'            => Str::slug($cauHoi['ten_cau_hoi'])
                    ]);

                    DapAnCauHoi::create([
                        'id_cau_hoi'     => $ch->id,
                        'ten_dap_an'     => 'Đáp án chi tiết',
                        'noi_dung'       => $cauHoi['dap_an'],
                        'is_dap_an_dung' => 1
                    ]);
                }
            } else if($monHoc->ma_mon_hoc == 'CS' && $monHoc->ma_so_mon_hoc == '203') { // Lập Trình Hướng Đối Tượng
                $cauHoiTracNghiem = [
                    [
                        'ten_cau_hoi' => 'Đâu là 4 tính chất cơ bản của OOP?',
                        'dap_an' => [
                            ['noi_dung' => 'Kế thừa, Đa hình, Trừu tượng, Đóng gói', 'is_dap_an_dung' => 1],
                            ['noi_dung' => 'Kế thừa, Đa hình, Interface, Abstract', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'Class, Object, Method, Property', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'Public, Private, Protected, Default', 'is_dap_an_dung' => 0],
                        ]
                    ],
                    [
                        'ten_cau_hoi' => 'Phương thức nào được gọi tự động khi kh���i tạo đối tượng?',
                        'dap_an' => [
                            ['noi_dung' => 'Constructor', 'is_dap_an_dung' => 1],
                            ['noi_dung' => 'Destructor', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'Initializer', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'Main', 'is_dap_an_dung' => 0],
                        ]
                    ],
                    [
                        'ten_cau_hoi' => 'Tính đóng gói (Encapsulation) trong OOP là gì?',
                        'dap_an' => [
                            ['noi_dung' => 'Khả năng tái sử dụng code', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'Khả năng che giấu thông tin và đóng gói dữ liệu', 'is_dap_an_dung' => 1],
                            ['noi_dung' => 'Khả năng kế thừa từ class khác', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'Khả năng tạo nhiều đối tượng', 'is_dap_an_dung' => 0],
                        ]
                    ],
                    [
                        'ten_cau_hoi' => 'Đâu là cách khai báo một interface trong PHP?',
                        'dap_an' => [
                            ['noi_dung' => 'abstract class MyInterface', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'interface MyInterface', 'is_dap_an_dung' => 1],
                            ['noi_dung' => 'class MyInterface', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'implement MyInterface', 'is_dap_an_dung' => 0],
                        ]
                    ],
                    [
                        'ten_cau_hoi' => 'Trong PHP, từ khóa nào được sử dụng để kế thừa class?',
                        'dap_an' => [
                            ['noi_dung' => 'implements', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'extends', 'is_dap_an_dung' => 1],
                            ['noi_dung' => 'inherits', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'include', 'is_dap_an_dung' => 0],
                        ]
                    ],
                    [
                        'ten_cau_hoi' => 'Phương thức abstract trong abstract class có đặc điểm gì?',
                        'dap_an' => [
                            ['noi_dung' => 'Phải có code thực thi', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'Không được có code thực thi', 'is_dap_an_dung' => 1],
                            ['noi_dung' => 'Phải là static', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'Phải là private', 'is_dap_an_dung' => 0],
                        ]
                    ],
                    [
                        'ten_cau_hoi' => 'Đâu là ví dụ về tính đa hình trong OOP?',
                        'dap_an' => [
                            ['noi_dung' => 'Sử dụng private để ẩn dữ liệu', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'Kế thừa thuộc tính từ class cha', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'Ghi đè phương thức của class cha', 'is_dap_an_dung' => 1],
                            ['noi_dung' => 'Tạo nhiều instance từ một class', 'is_dap_an_dung' => 0],
                        ]
                    ],
                    [
                        'ten_cau_hoi' => 'Magic method nào trong PHP được gọi khi truy cập thuộc tính không tồn tại?',
                        'dap_an' => [
                            ['noi_dung' => '__construct()', 'is_dap_an_dung' => 0],
                            ['noi_dung' => '__get()', 'is_dap_an_dung' => 1],
                            ['noi_dung' => '__set()', 'is_dap_an_dung' => 0],
                            ['noi_dung' => '__call()', 'is_dap_an_dung' => 0],
                        ]
                    ],
                    [
                        'ten_cau_hoi' => 'Trait trong PHP được sử dụng để làm gì?',
                        'dap_an' => [
                            ['noi_dung' => 'Thay thế kế thừa đa cấp', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'Tái sử dụng code trong nhiều class', 'is_dap_an_dung' => 1],
                            ['noi_dung' => 'Định nghĩa interface', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'Tạo abstract class', 'is_dap_an_dung' => 0],
                        ]
                    ],
                    [
                        'ten_cau_hoi' => 'Namespace trong PHP có tác dụng gì?',
                        'dap_an' => [
                            ['noi_dung' => 'Tăng tốc độ thực thi', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'Tránh xung đột tên class', 'is_dap_an_dung' => 1],
                            ['noi_dung' => 'Tạo kế thừa đa cấp', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'Quản lý bộ nhớ', 'is_dap_an_dung' => 0],
                        ]
                    ],
                    [
                        'ten_cau_hoi' => 'Tính đóng gói (Encapsulation) trong OOP là gì?',
                        'dap_an' => [
                            ['noi_dung' => 'Khả năng tái sử dụng code', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'Khả năng che giấu thông tin và đóng gói dữ liệu', 'is_dap_an_dung' => 1],
                            ['noi_dung' => 'Khả năng kế thừa từ class khác', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'Khả năng tạo nhiều đối tượng', 'is_dap_an_dung' => 0],
                        ]
                    ],
                    [
                        'ten_cau_hoi' => 'Đâu là cách khai báo một interface trong PHP?',
                        'dap_an' => [
                            ['noi_dung' => 'abstract class MyInterface', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'interface MyInterface', 'is_dap_an_dung' => 1],
                            ['noi_dung' => 'class MyInterface', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'implement MyInterface', 'is_dap_an_dung' => 0],
                        ]
                    ],
                    [
                        'ten_cau_hoi' => 'Trong PHP, từ khóa nào được sử dụng để kế thừa class?',
                        'dap_an' => [
                            ['noi_dung' => 'implements', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'extends', 'is_dap_an_dung' => 1],
                            ['noi_dung' => 'inherits', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'include', 'is_dap_an_dung' => 0],
                        ]
                    ],
                    [
                        'ten_cau_hoi' => 'Phương thức abstract trong abstract class có đặc điểm gì?',
                        'dap_an' => [
                            ['noi_dung' => 'Phải có code thực thi', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'Không được có code thực thi', 'is_dap_an_dung' => 1],
                            ['noi_dung' => 'Phải là static', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'Phải là private', 'is_dap_an_dung' => 0],
                        ]
                    ],
                    [
                        'ten_cau_hoi' => 'Đâu là ví dụ về tính đa hình trong OOP?',
                        'dap_an' => [
                            ['noi_dung' => 'Sử dụng private để ẩn dữ liệu', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'Kế thừa thuộc tính từ class cha', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'Ghi đè phương thức của class cha', 'is_dap_an_dung' => 1],
                            ['noi_dung' => 'Tạo nhiều instance từ một class', 'is_dap_an_dung' => 0],
                        ]
                    ],
                    [
                        'ten_cau_hoi' => 'Magic method nào trong PHP được gọi khi truy cập thuộc tính không tồn tại?',
                        'dap_an' => [
                            ['noi_dung' => '__construct()', 'is_dap_an_dung' => 0],
                            ['noi_dung' => '__get()', 'is_dap_an_dung' => 1],
                            ['noi_dung' => '__set()', 'is_dap_an_dung' => 0],
                            ['noi_dung' => '__call()', 'is_dap_an_dung' => 0],
                        ]
                    ],
                    [
                        'ten_cau_hoi' => 'Trait trong PHP được sử dụng để làm gì?',
                        'dap_an' => [
                            ['noi_dung' => 'Thay thế kế thừa đa cấp', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'Tái sử dụng code trong nhiều class', 'is_dap_an_dung' => 1],
                            ['noi_dung' => 'Định nghĩa interface', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'Tạo abstract class', 'is_dap_an_dung' => 0],
                        ]
                    ],
                    [
                        'ten_cau_hoi' => 'Namespace trong PHP có tác dụng gì?',
                        'dap_an' => [
                            ['noi_dung' => 'Tăng tốc độ thực thi', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'Tránh xung đột tên class', 'is_dap_an_dung' => 1],
                            ['noi_dung' => 'Tạo kế thừa đa cấp', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'Quản lý bộ nhớ', 'is_dap_an_dung' => 0],
                        ]
                    ],

                ];

                $cauHoiTraLoiNgan = [
                    [
                        'ten_cau_hoi' => 'Giải thích khái niệm "method chaining" trong OOP?',
                        'dap_an' => 'Method chaining là kỹ thuật cho phép g���i nhiều phương thức liên tiếp trên cùng một đối tượng bằng cách return $this'
                    ],
                    [
                        'ten_cau_hoi' => 'Sự khác biệt giữa "early binding" và "late binding"?',
                        'dap_an' => 'Early binding xảy ra tại compile time, late binding xảy ra tại runtime. Late binding cho phép đa hình động'
                    ],
                    [
                        'ten_cau_hoi' => 'Giải thích khái niệm "composition over inheritance"?',
                        'dap_an' => 'Ưu tiên sử dụng composition (has-a) thay vì inheritance (is-a) để giảm sự phụ thuộc và tăng tính linh hoạt'
                    ],
                    [
                        'ten_cau_hoi' => 'Magic method __toString() trong PHP dùng để làm gì?',
                        'dap_an' => 'Định nghĩa cách chuyển đổi một object thành string khi object được sử dụng như một string'
                    ],
                    [
                        'ten_cau_hoi' => 'Giải thích khái niệm "method overloading" trong PHP?',
                        'dap_an' => 'PHP không hỗ trợ method overloading trực tiếp nhưng có thể mô phỏng bằng __call() và __callStatic()'
                    ],
                    [
                        'ten_cau_hoi' => 'Tại sao nên sử dụng Dependency Injection?',
                        'dap_an' => 'Giúp giảm sự phụ thuộc giữa các class, dễ test và maintain, tăng tính tái sử dụng'
                    ],
                    [
                        'ten_cau_hoi' => 'Giải thích về "type hinting" trong PHP?',
                        'dap_an' => 'Chỉ định kiểu dữ liệu cho tham số và giá trị trả về của phương thức, giúp code an toàn hơn'
                    ],
                    [
                        'ten_cau_hoi' => 'Khái niệm "final" trong PHP dùng để làm gì?',
                        'dap_an' => 'Ngăn class không bị kế thừa (final class) hoặc ngăn phương thức không bị override (final method)'
                    ],
                    [
                        'ten_cau_hoi' => 'Giải thích về "autoloading" trong PHP?',
                        'dap_an' => 'Tự động load class khi được sử dụng mà không cần include/require, thường dùng spl_autoload_register()'
                    ],
                    [
                        'ten_cau_hoi' => 'Constructor là gì và có đặc điểm gì?',
                        'dap_an' => 'Constructor là phương thức đặc biệt được gọi khi tạo đối tượng, có tên trùng với tên lớp và không có kiểu trả về'
                    ],

                    [
                        'ten_cau_hoi' => 'Giải thích khái niệm "method chaining" trong OOP?',
                        'dap_an' => 'Method chaining là kỹ thuật cho phép gọi nhiều phương thức liên tiếp trên cùng một đối tượng bằng cách return $this'
                    ],
                    [
                        'ten_cau_hoi' => 'Sự khác biệt giữa "early binding" và "late binding"?',
                        'dap_an' => 'Early binding xảy ra tại compile time, late binding xảy ra tại runtime. Late binding cho phép đa hình động'
                    ],
                    [
                        'ten_cau_hoi' => 'Giải thích khái niệm "composition over inheritance"?',
                        'dap_an' => 'Ưu tiên sử dụng composition (has-a) thay vì inheritance (is-a) để giảm sự phụ thuộc và tăng tính linh hoạt'
                    ],
                    [
                        'ten_cau_hoi' => 'Magic method __toString() trong PHP dùng để làm gì?',
                        'dap_an' => 'Định nghĩa cách chuyển đổi một object thành string khi object được sử dụng như một string'
                    ],
                    [
                        'ten_cau_hoi' => 'Giải thích khái niệm "method overloading" trong PHP?',
                        'dap_an' => 'PHP không hỗ trợ method overloading trực tiếp nhưng có thể mô phỏng bằng __call() và __callStatic()'
                    ],
                    [
                        'ten_cau_hoi' => 'Tại sao nên sử dụng Dependency Injection?',
                        'dap_an' => 'Giúp giảm sự phụ thuộc giữa các class, dễ test và maintain, tăng tính tái sử dụng'
                    ],
                    [
                        'ten_cau_hoi' => 'Giải thích về "type hinting" trong PHP?',
                        'dap_an' => 'Chỉ định kiểu dữ liệu cho tham số và giá trị trả về của phương thức, giúp code an toàn hơn'
                    ],
                    [
                        'ten_cau_hoi' => 'Khái niệm "final" trong PHP dùng để làm gì?',
                        'dap_an' => 'Ngăn class không bị kế thừa (final class) hoặc ngăn phương thức không bị override (final method)'
                    ],
                    [
                        'ten_cau_hoi' => 'Giải thích về "autoloading" trong PHP?',
                        'dap_an' => 'Tự động load class khi được sử dụng mà không cần include/require, thường dùng spl_autoload_register()'
                    ]
                ];

                $cauHoiTuLuan = [
                    [
                        'ten_cau_hoi' => 'So sánh chi tiết về Abstract Class và Interface. Khi nào nên sử dụng cái nào?',
                        'dap_an' => "So sánh Abstract Class và Interface:\n\n" .
                                   "1. Abstract Class:\n" .
                                   "- Có thể có phương thức concrete\n" .
                                   "- Có thể có thuộc tính\n" .
                                   "- Chỉ cho phép đơn kế thừa\n" .
                                   "- Sử dụng khi các lớp con có nhiều code chung\n\n" .
                                   "2. Interface:\n" .
                                   "- Chỉ có phương thức abstract\n" .
                                   "- Chỉ có hằng số\n" .
                                   "- Cho phép đa kế thừa\n" .
                                   "- Sử dụng khi cần định nghĩa hành vi chung"
                    ],
                    [
                        'ten_cau_hoi' => 'Phân tích các Design Pattern phổ biến trong PHP và cách áp dụng?',
                        'dap_an' => "Design Patterns trong PHP:\n\n" .
                                   "1. Singleton Pattern:\n" .
                                   "- Đảm bảo class chỉ có một instance\n" .
                                   "- Sử dụng cho database connection, config\n" .
                                   "- Cách implement: private constructor, static instance\n\n" .
                                   "2. Factory Pattern:\n" .
                                   "- Tạo object mà không expose logic\n" .
                                   "- Sử dụng interface chung\n" .
                                   "- Ví dụ: DatabaseFactory tạo MySQL/PostgreSQL connection\n\n" .
                                   "3. Strategy Pattern:\n" .
                                   "- Định nghĩa họ các thuật toán có thể thay thế\n" .
                                   "- Ví dụ: Payment strategies (PayPal, Credit Card)\n\n" .
                                   "4. Observer Pattern:\n" .
                                   "- Định nghĩa cơ chế subscription\n" .
                                   "- Ví dụ: Event handling system\n\n" .
                                   "5. Repository Pattern:\n" .
                                   "- Tách logic truy cập dữ liệu\n" .
                                   "- Giúp thay đổi data source dễ dàng"
                    ]
                ];

                // Tạo câu hỏi trắc nghiệm
                foreach($cauHoiTracNghiem as $cauHoi) {
                    $ch = CauHoi::create([
                        'id_mon_hoc'      => $monHoc->id,
                        'ten_cau_hoi'     => $cauHoi['ten_cau_hoi'],
                        'loai_cau_hoi'    => CauHoi::TRAC_NGHIEM,
                        'so_luong_dap_an' => count($cauHoi['dap_an']),
                        'slug'            => Str::slug($cauHoi['ten_cau_hoi'])
                    ]);

                    foreach($cauHoi['dap_an'] as $key => $dapAn) {
                        DapAnCauHoi::create([
                            'id_cau_hoi'     => $ch->id,
                            'ten_dap_an'     => 'Đáp án ' . ($key + 1),
                            'noi_dung'       => $dapAn['noi_dung'],
                            'is_dap_an_dung' => $dapAn['is_dap_an_dung']
                        ]);
                    }
                }

                // Tạo câu hỏi trả lời ngắn
                foreach($cauHoiTraLoiNgan as $cauHoi) {
                    $ch = CauHoi::create([
                        'id_mon_hoc'      => $monHoc->id,
                        'ten_cau_hoi'     => $cauHoi['ten_cau_hoi'],
                        'loai_cau_hoi'    => CauHoi::TRA_LOI_NGAN,
                        'so_luong_dap_an' => 1,
                        'slug'            => Str::slug($cauHoi['ten_cau_hoi'])
                    ]);

                    DapAnCauHoi::create([
                        'id_cau_hoi'     => $ch->id,
                        'ten_dap_an'     => 'Đáp án',
                        'noi_dung'       => $cauHoi['dap_an'],
                        'is_dap_an_dung' => 1
                    ]);
                }

                // Tạo câu hỏi tự luận
                foreach($cauHoiTuLuan as $cauHoi) {
                    $ch = CauHoi::create([
                        'id_mon_hoc'      => $monHoc->id,
                        'ten_cau_hoi'     => $cauHoi['ten_cau_hoi'],
                        'loai_cau_hoi'    => CauHoi::TU_LUAN,
                        'so_luong_dap_an' => 1,
                        'slug'            => Str::slug($cauHoi['ten_cau_hoi'])
                    ]);

                    DapAnCauHoi::create([
                        'id_cau_hoi'     => $ch->id,
                        'ten_dap_an'     => 'Đáp án chi tiết',
                        'noi_dung'       => $cauHoi['dap_an'],
                        'is_dap_an_dung' => 1
                    ]);
                }
            } else if($monHoc->ma_mon_hoc == 'ENG' && $monHoc->ma_so_mon_hoc == '302') { // Anh Ngữ Cao Cấp 2
                $cauHoiTracNghiem = [
                    [
                        'ten_cau_hoi' => 'Choose the correct form: If I _____ rich, I would travel around the world.',
                        'dap_an' => [
                            ['noi_dung' => 'am', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'were', 'is_dap_an_dung' => 1],
                            ['noi_dung' => 'was', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'had been', 'is_dap_an_dung' => 0],
                        ]
                    ],
                    [
                        'ten_cau_hoi' => 'Which sentence is in the passive voice?',
                        'dap_an' => [
                            ['noi_dung' => 'He writes a letter', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'The letter was written by him', 'is_dap_an_dung' => 1],
                            ['noi_dung' => 'They are writing letters', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'She wrote a letter', 'is_dap_an_dung' => 0],
                        ]
                    ],
                    [
                        'ten_cau_hoi' => 'Choose the correct reported speech: He said, "I am working now"',
                        'dap_an' => [
                            ['noi_dung' => 'He said he was working then', 'is_dap_an_dung' => 1],
                            ['noi_dung' => 'He said he is working now', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'He said he worked then', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'He said he has been working', 'is_dap_an_dung' => 0],
                        ]
                    ],
                    [
                        'ten_cau_hoi' => 'Which word is a gerund?',
                        'dap_an' => [
                            ['noi_dung' => 'to swim', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'swam', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'swimming', 'is_dap_an_dung' => 1],
                            ['noi_dung' => 'swims', 'is_dap_an_dung' => 0],
                        ]
                    ],
                    [
                        'ten_cau_hoi' => 'Select the correct preposition: She\'s been working here _____ 2010.',
                        'dap_an' => [
                            ['noi_dung' => 'for', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'since', 'is_dap_an_dung' => 1],
                            ['noi_dung' => 'from', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'in', 'is_dap_an_dung' => 0],
                        ]
                    ],
                    [
                        'ten_cau_hoi' => 'Choose the correct modal verb: You _____ see a doctor if you\'re feeling sick.',
                        'dap_an' => [
                            ['noi_dung' => 'must', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'should', 'is_dap_an_dung' => 1],
                            ['noi_dung' => 'can', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'may', 'is_dap_an_dung' => 0],
                        ]
                    ],
                    [
                        'ten_cau_hoi' => 'Which sentence uses the present perfect correctly?',
                        'dap_an' => [
                            ['noi_dung' => 'I have seen him yesterday', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'I have never been to Paris', 'is_dap_an_dung' => 1],
                            ['noi_dung' => 'I have go there last week', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'I have went to school', 'is_dap_an_dung' => 0],
                        ]
                    ],
                    [
                        'ten_cau_hoi' => 'Identify the correct relative clause: The man _____ lives next door is a doctor.',
                        'dap_an' => [
                            ['noi_dung' => 'which', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'who', 'is_dap_an_dung' => 1],
                            ['noi_dung' => 'whose', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'whom', 'is_dap_an_dung' => 0],
                        ]
                    ],
                    [
                        'ten_cau_hoi' => 'Choose the correct article: _____ United States is a large country.',
                        'dap_an' => [
                            ['noi_dung' => 'A', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'An', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'The', 'is_dap_an_dung' => 1],
                            ['noi_dung' => 'No article needed', 'is_dap_an_dung' => 0],
                        ]
                    ],
                    [
                        'ten_cau_hoi' => 'Select the correct preposition: She\'s been working here _____ 2010.',
                        'dap_an' => [
                            ['noi_dung' => 'for', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'since', 'is_dap_an_dung' => 1],
                            ['noi_dung' => 'from', 'is_dap_an_dung' => 0],
                            ['noi_dung' => 'in', 'is_dap_an_dung' => 0],
                        ]
                    ]
                ];

                $cauHoiTraLoiNgan = [
                    [
                        'ten_cau_hoi' => 'What is the difference between "affect" and "effect"?',
                        'dap_an' => '"Affect" is usually a verb meaning to influence, while "effect" is usually a noun meaning result or consequence'
                    ],
                    [
                        'ten_cau_hoi' => 'Explain the difference between "its" and "it\'s"',
                        'dap_an' => '"Its" is a possessive pronoun showing ownership, while "it\'s" is a contraction of "it is" or "it has"'
                    ],
                    [
                        'ten_cau_hoi' => 'What is a phrasal verb? Give an example.',
                        'dap_an' => 'A phrasal verb is a combination of a verb and preposition/adverb that creates a new meaning. Example: "give up" means "surrender"'
                    ],
                    [
                        'ten_cau_hoi' => 'When do we use the present perfect tense?',
                        'dap_an' => 'We use present perfect for past actions with present relevance, unfinished time periods, and experiences without specific time'
                    ],
                    [
                        'ten_cau_hoi' => 'What is the difference between "few" and "a few"?',
                        'dap_an' => '"Few" has a negative meaning suggesting "almost none", while "a few" is positive meaning "some"'
                    ],
                    [
                        'ten_cau_hoi' => 'Explain the use of "used to" vs "be used to"',
                        'dap_an' => '"Used to" describes past habits or states that no longer exist, while "be used to" means being accustomed to something'
                    ],
                    [
                        'ten_cau_hoi' => 'What is the difference between "since" and "for" with present perfect?',
                        'dap_an' => '"Since" is used with a specific point in time, while "for" is used with a duration of time'
                    ],
                    [
                        'ten_cau_hoi' => 'When do we use the first conditional?',
                        'dap_an' => 'First conditional is used for possible situations in the future and their probable results, using "if + present simple, will + infinitive"'
                    ],
                    [
                        'ten_cau_hoi' => 'What is the difference between "say" and "tell"?',
                        'dap_an' => '"Say" is used without a personal object, while "tell" requires a personal object (who you are talking to)'
                    ],
                    [
                        'ten_cau_hoi' => 'Explain the use of articles with countable/uncountable nouns',
                        'dap_an' => 'Countable nouns can use a/an/the, uncountable nouns use no article or "the". "A/an" is only used with singular countable nouns'
                    ]
                ];

                $cauHoiTuLuan = [
                    [
                        'ten_cau_hoi' => 'Write an essay about the advantages and disadvantages of social media (250-300 words)',
                        'dap_an' => "Social Media: A Double-Edged Sword\n\n" .
                                   "Advantages:\n" .
                                   "1. Connectivity\n" .
                                   "- Global communication\n" .
                                   "- Instant messaging\n" .
                                   "- Maintaining relationships\n\n" .
                                   "2. Information Sharing\n" .
                                   "- Quick news updates\n" .
                                   "- Educational content\n" .
                                   "- Knowledge sharing\n\n" .
                                   "3. Professional Opportunities\n" .
                                   "- Networking\n" .
                                   "- Job searching\n" .
                                   "- Business promotion\n\n" .
                                   "Disadvantages:\n" .
                                   "1. Privacy Concerns\n" .
                                   "- Data collection\n" .
                                   "- Identity theft risks\n" .
                                   "- Online surveillance\n\n" .
                                   "2. Mental Health Issues\n" .
                                   "- Social comparison\n" .
                                   "- Addiction\n" .
                                   "- Cyberbullying\n\n" .
                                   "3. Time Management\n" .
                                   "- Procrastination\n" .
                                   "- Reduced productivity\n" .
                                   "- Sleep disruption"
                    ],
                    [
                        'ten_cau_hoi' => 'Describe a memorable experience in your life and what you learned from it (300 words)',
                        'dap_an' => "A Memorable Experience: My First Public Speaking Event\n\n" .
                                   "Introduction:\n" .
                                   "- Event: School debate competition\n" .
                                   "- Initial feelings of nervousness and anxiety\n\n" .
                                   "Preparation:\n" .
                                   "- Research on the topic\n" .
                                   "- Practice sessions\n" .
                                   "- Mentor guidance\n\n" .
                                   "The Experience:\n" .
                                   "- Overcoming stage fright\n" .
                                   "- Engaging with the audience\n" .
                                   "- Handling unexpected questions\n\n" .
                                   "Lessons Learned:\n" .
                                   "1. Importance of preparation\n" .
                                   "2. Value of self-confidence\n" .
                                   "3. Power of effective communication\n\n" .
                                   "Impact on Personal Growth:\n" .
                                   "- Improved public speaking skills\n" .
                                   "- Enhanced self-esteem\n" .
                                   "- Better stress management"
                    ]
                ];

                // Tạo câu hỏi trắc nghiệm
                foreach($cauHoiTracNghiem as $cauHoi) {
                    $ch = CauHoi::create([
                        'id_mon_hoc'      => $monHoc->id,
                        'ten_cau_hoi'     => $cauHoi['ten_cau_hoi'],
                        'loai_cau_hoi'    => CauHoi::TRAC_NGHIEM,
                        'so_luong_dap_an' => count($cauHoi['dap_an']),
                        'slug'            => Str::slug($cauHoi['ten_cau_hoi'])
                    ]);

                    foreach($cauHoi['dap_an'] as $key => $dapAn) {
                        DapAnCauHoi::create([
                            'id_cau_hoi'     => $ch->id,
                            'ten_dap_an'     => 'Đáp án ' . ($key + 1),
                            'noi_dung'       => $dapAn['noi_dung'],
                            'is_dap_an_dung' => $dapAn['is_dap_an_dung']
                        ]);
                    }
                }

                // Tạo câu hỏi trả lời ngắn
                foreach($cauHoiTraLoiNgan as $cauHoi) {
                    $ch = CauHoi::create([
                        'id_mon_hoc'      => $monHoc->id,
                        'ten_cau_hoi'     => $cauHoi['ten_cau_hoi'],
                        'loai_cau_hoi'    => CauHoi::TRA_LOI_NGAN,
                        'so_luong_dap_an' => 1,
                        'slug'            => Str::slug($cauHoi['ten_cau_hoi'])
                    ]);

                    DapAnCauHoi::create([
                        'id_cau_hoi'     => $ch->id,
                        'ten_dap_an'     => 'Đáp án',
                        'noi_dung'       => $cauHoi['dap_an'],
                        'is_dap_an_dung' => 1
                    ]);
                }

                // Tạo câu hỏi tự luận
                foreach($cauHoiTuLuan as $cauHoi) {
                    $ch = CauHoi::create([
                        'id_mon_hoc'      => $monHoc->id,
                        'ten_cau_hoi'     => $cauHoi['ten_cau_hoi'],
                        'loai_cau_hoi'    => CauHoi::TU_LUAN,
                        'so_luong_dap_an' => 1,
                        'slug'            => Str::slug($cauHoi['ten_cau_hoi'])
                    ]);

                    DapAnCauHoi::create([
                        'id_cau_hoi'     => $ch->id,
                        'ten_dap_an'     => 'Đáp án chi tiết',
                        'noi_dung'       => $cauHoi['dap_an'],
                        'is_dap_an_dung' => 1
                    ]);
                }
            }
        }
    }
}
