<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;

class TheLoaiController extends Controller
{
    //
    public function getDanhSach()
    {
        $theloai = TheLoai::all();
        return view('admin.theloai.danhsach',['theloai'=>$theloai]);
    }
    public function getThem()
    { 
        return view('admin.theloai.them');
    }
    public function postThem(Request $request)
    {

        $this->validate($request, [        
           'Ten'=>'required|min:3|max:3',         
        ],
        [
            'Ten.required'=>'Ban chua nhap dung ten nguoi dung',           
            'Ten.min'=> 'Bạn chưa nhập email',
            'Ten.max'=> 'Bạn chưa nhập đúng định danh email',
        ]);

        $theloai = new TheLoai;
        $theloai->Ten = $request->Ten;
        $theloai->TenKhongDau = changeTitle($request->Ten);

        $theloai->save();

        return redirect('admin/theloai/list')->with('thongbao','Thêm tin thành công');

    }




}