<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        $users = [
//            [
//                'id' => 1,
//                'name' => 'User 1'
//            ],
//            [
//                'id' => 2,
//                'name' => 'User 2'
//            ]
//        ];

//        return view('list-user', compact('users'));
//        return view('list-user')->with(
//            [
//                'users' => $users
//            ]
//        );

//        $listUsers = DB::table('users')->get();

        // Lấy thông tin user có id = 4 (SELECT * FROM users WHERE id = 4)
//        $result = DB::table('users')->where('id',  '4')->first();
//        $result = DB::table('users')->find('4');

        // Lấy thuộc tính 'name' của user có id = 16
//        $result = DB::table('users')->where('id', 16)->value('name');
//        $result = DB::table('users')->where('id', 16)->pluck('name');

        // Lấy danh sách id user của phòng ban 'Ban giám hiệu'
//        $idPhongBan = DB::table('phongban')
//            ->where('ten_donvi', 'like', '%Ban giám hiệu%')
//            ->value('id');
//
//        $result = DB::table('users')->where('phongban_id', $idPhongBan)->pluck('id');

        // Tìm user có độ tuổi lớn nhất trong công ty (SELECT * FROM users WHERE tuoi = MAX(tuoi))
//        $result = DB::table('users')
//            ->where('tuoi', DB::table('users')
//            ->max('tuoi'))->get();

        // Tìm user có độ tuổi nhỏ nhất trong công ty (SELECT * FROM users WHERE tuoi = MIN(tuoi))
//        $result = DB::table('users')
//            ->where('tuoi', DB::table('users')
//            ->min('tuoi'))->get();

        // Đếm xem phòng ban 'Ban giám hiệu' có bao nhiêu user (SELECT * FROM users WHERE phongban_id = idPhongBan GROUP BY phongban_id HAVING COUNT(*) > 1)
//        $idPhongBan = DB::table('phongban')
//            ->where('ten_donvi', 'like', '%Ban giám hiệu%')
//            ->value('id');
//
//        $result = DB::table('users')
//            ->where('phongban_id', $idPhongBan)
//            ->count('id');

        // Lấy danh sách tuổi các user (SELECT DISTINCT tuoi FROM users)
//        $result = DB::table('users')
//            ->distinct()
//            ->pluck('tuoi');

        // Tìm danh sách user có tên 'Khải' hoặc có tên 'Thanh'
//        $result = DB::table('users')
//            ->where('name', 'like', '%Khải')
//            ->orWhere('name', 'like', '%Thanh')
//            ->get();

        // Lấy danh sách user ở phòng ban 'Ban đào tạo'
//        $idPhongBan = DB::table('phongban')
//            ->where('ten_donvi', 'like', '%Ban đào tạo%')
//            ->value('id');
//
//        $result = DB::table('users')->where('phongban_id', $idPhongBan)->get();

        // Lấy danh sách user có tuổi lớn hơn hoặc bằng 30, danh sách sắp xếp tăng dần
//        $result = DB::table('users')
//            ->where('tuoi', '>=', 30)
//            ->orderBy('tuoi', 'asc')
//            ->get();

        // Lấy danh sách 10 user sắp xếp giảm dần độ tuổi, bỏ qua 5 user đầu tiên
        // SQL: SELECT * FROM users ORDER BY tuoi DESC LIMIT 10 OFFSET 5
//        $result = DB::table('users')
//            ->orderBy('tuoi', 'desc')
//            ->skip(5)
//            ->take(10)
//            ->get();

        // Thêm một user mới vào công ty
//        $data = [
//            'name' => 'Nguyễn Văn A',
//            'email' => 'abc@gmail.com',
//            'phongban_id' => '1',
//            'songaynghi' => '0',
//            'tuoi' => '20',
//            'created_at' => Carbon::now(),
//            'updated_at' => Carbon::now()
//        ];
//
//        DB::table('users')->insert($data);

        // Thêm chữ 'PĐT' sau tên tất cả user ở phòng ban 'Ban đào tạo'
//        $idPhongBan = DB::table('phongban')
//            ->where('ten_donvi', 'like', '%Ban đào tạo%')
//            ->value('id');

        // SQL: UPDATE users SET name = CONCAT(name, ' PĐT') WHERE phongban_id = idPhongBan
//        $getNameUser = DB::table('users')
//            ->where('phongban_id', $idPhongBan)
//            ->pluck('name');
//
//        foreach ($getNameUser as $name) {
//            $newName = $name . ' PĐT';
//            DB::table('users')
//                ->where('name', $name)
//                ->update([
//                    'name' => $newName
//                ]);
//        }

//        DB::table('users')
//            ->where('phongban_id', $idPhongBan)
//            ->update([
//                'name' => DB::raw("CONCAT(name, ' PĐT')")
//            ]);

        // Xóa user nghỉ quá 15 ngày
        // SQL: DELETE FROM users WHERE songaynghi > 15
//        DB::table('users')
//            ->where('songaynghi', '>', 15)
//            ->delete();

    }

    public function info()
    {
        $user = [
            'id' => 1,
            'name' => 'Nguyễn Mạnh Dũng',
            'age' => 21,
            'address' => 'Hà Nội',
            'class' => 'WD18321'
        ];

        return view('info', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return "User " . $id;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //

        return $request->input('id');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
