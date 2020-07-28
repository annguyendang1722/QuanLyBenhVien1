<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    //
    public function getDanhSach()
    {
        $user = User::all();
        return view('admin.user.danhsach',['user'=>$user]);
    }
    public function getThem()
    {  
        return view('admin.user.them');
    }
    public function postThem(Request $request)
    {

        $this->validate($request, [
           'name'=>'required|min:3',
           'email'=>'required|email|unique:users,email',
           'password'=> 'required|min:3|max:32',
           'passwordAgain'=> 'required|same:password'
        ],
        [
            'name.required'=>'Ban chua nhap dung ten nguoi dung',
            'name.min'=>'Tên người dùng phải ít nhất 3 kí tự',
            'email.required'=> 'Bạn chưa nhập email',
            'email.email'=> 'Bạn chưa nhập đúng định danh email',
            'email.unique'=> 'Email đã tồn tại',
            'password.required'=> 'Bạn chưa nhập đúng mật khẩu',
            'password.min'=> 'Mật khẩu phải ít nhất 3 kí tự',
            'password.max'=> 'Mật khẩu chỉ được tối đa 32 kí tự',

            'passwordAgain.required'=> 'Bạn chưa nhập lại mật khẩu',
            'passwordAgain.same'=> 'Mật khẩu nhập lại chưa khớp'


        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->quyen = $request->quyen;





        $user->save();

        return redirect('admin/user/them')->with('thongbao','Thêm người dùng thành công');

    }
    public function getSua($id)
    {
        $user = User::find($id);
        return view('admin.user.sua',['user'=>$user]);
    }
    public function postSua(Request $request, $id)
    {
        $this->validate($request, [
           'name'=>'required|min:3',
           'email'=>'required|email|unique:users,email',
           'password'=> 'required|min:3|max:32',
           'passwordAgain'=> 'required|same:password'
        ],
        [
            'name.required'=>'Ban chua nhap dung ten nguoi dung',
            'name.min'=>'Tên người dùng phải ít nhất 3 kí tự',
            'email.required'=> 'Bạn chưa nhập email',
            'email.email'=> 'Bạn chưa nhập đúng định danh email',
            'email.unique'=> 'Email đã tồn tại',
            'password.required'=> 'Bạn chưa nhập đúng mật khẩu',
            'password.min'=> 'Mật khẩu phải ít nhất 3 kí tự',
            'password.max'=> 'Mật khẩu chỉ được tối đa 32 kí tự',

            'passwordAgain.required'=> 'Bạn chưa nhập lại mật khẩu',
            'passwordAgain.same'=> 'Mật khẩu nhập lại chưa khớp'


        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->quyen = $request->quyen;

        echo $user->name;
        echo '</br>';
        echo $user->email;
        echo '</br>';
        echo $user->password;
        echo '</br>';
        echo $user->quyen;


        die();

        $user->save();

        return redirect('admin/user/sua'.$id)->with('thongbao','Bạn đã sửa thành công');
            
    }
    public function getXoa($id)
    {
      
        //return view('admin.user.danhsach'),['user'=>$user]);
        $user = User::find($id);
        $user->delete();
        return redirect('admin/user/danhsach')->with('thongbao','Xóa người dùng thành công');
    }
}
