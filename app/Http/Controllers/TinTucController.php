<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TinTuc;
use App\TheLoai;

class TinTucController extends Controller
{
    //

    public function getDanhSach()
    {
        //$tintuc = TinTuc::orderBy('id','DESC')->paginate(5);
        $tintuc = TinTuc::all();
       // return view('admin.tintuc.danhsach',['tintuc'=>$tintuc],compact('tintuc'));
        return view('admin.tintuc.danhsach',['tintuc'=>$tintuc]);
    }

    public function getDanhSachTheLoai ()
    {
        //$tintuc = TinTuc::orderBy('id','DESC')->paginate(5);
        $theloai = TheLoai::all();
       // return view('admin.tintuc.danhsach',['tintuc'=>$tintuc],compact('tintuc'));
        return view('admin.tintuc.them',['theloai'=>$theloai]);
    }


    public function getThem()
    { 
        return view('admin.tintuc.them');
    }

    
    public function postThem(Request $request)
    {

        $this->validate($request, [
           'LoaiTin'=>'required',
           'TieuDe'=>'required|min:3|unique:TinTuc,TieuDe',
           'TomTat'=> 'required',
           'NoiDung'=> 'required'
        ],
        [
            'LoaiTin.required'=>'Ban chua nhap dung ten nguoi dung',           
            'TieuDe.required'=> 'Bạn chưa nhập email',
            'TieuDe.email'=> 'Bạn chưa nhập đúng định danh email',
            'TieuDe.unique'=> 'Email đã tồn tại',
            'TomTat.required'=> 'Bạn chưa nhập đúng mật khẩu',         
            'NoiDung.required'=> 'Bạn chưa nhập lại mật khẩu',
        ]);

        $tintuc = new TinTuc;
        $tintuc->TieuDe = $request->TieuDe;
        $tintuc->TieuDeKhongDau = changeTitle($request->TieuDe);
        $tintuc->idLoatTin = $request->LoaiTin;
        $tintuc->TomTat = $request->TomTat;
        $tintuc->NoiDung = $request->NoiDung;
        $tintuc->SoLuotXem = 0;

        if($request->hasFile('Hinh'))
        {
            $file = $request->file('Hinh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect('admin/tintuc/them')->with('loi','Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
            }
            $name = $file->getClientOriginalName();
            $Hinh = str_random(4)."_".$name;
            while(file_exists("upload/tintuc/".$Hinh))
            {
                $Hinh = str_random(4)."_".$name;
            }
            $file->move("upload/tintuc",$Hinh);

        }
        else
        {
            $tintuc->Hinh = "";
        }

        $tintuc->save();

        return redirect('admin/tintuc/them')->with('thongbao','Thêm tin thành công');

    }


}
