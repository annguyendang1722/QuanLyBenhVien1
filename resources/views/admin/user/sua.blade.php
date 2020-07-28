@extends('admin.layout.index')  

@section('content')
    

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>Edit</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <input type="hidden" class="form-control" name="_token" value="{{csrf_token()}}" />  
                            
                        <form action="/admin/user/sua/{{$user->id}}" method="POST">
                            <div class="form-group">
                                <label>Username</label>
                                <input class="form-control" name="name" value="{{$user->name}}"/>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email" value="{{$user->email}}" placeholder="Nhập địa chỉ email" />
                            </div>                            
                            <div class="form-group">
                                <label>Mật khẩu</label>
                                <input type="password" class="form-control" name="password" value="{{$user->password}}" placeholder="Please Enter Password" />
                            </div>

                            
                            <div class="form-group">
                                <label>Nhập lại mật khẩu</label>
                                <input type="password" class="form-control" name="passwordAgain" value="{{$user->passwordAgain}}" placeholder="Please Enter RePassword" />
                            </div>

                            <div class="form-group">
                                <label>Quyền người dùng</label>
                                <label class="radio-inline">
                                        <input name="quyen" value="0"                                        
                                        @if($user->quyen == 0)
                                        {{"checked"}}
                                        @endif
                                        type="radio">
                                        Thường                                           
                                </label>

                                <label class="radio-inline">
                                    <input name="quyen" value="1" 
                                        @if($user->quyen == 1)
                                        {{"checked"}}
                                        @endif
                                        type="radio">Admin
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">User Edit</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

   

        @endsection