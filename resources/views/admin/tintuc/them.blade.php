@extends('admin.layout.index')

@section('content')
    

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Thêm Tin Tức
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        @if(session('thongbao'))
                            <div class="alrert alrert-success">
                                {{session('thongbao')}}
                            </div>                     
                        @endif                       
                        <form action="{{route('admin.tintuc.them')}}" method="POST" enctype="multipart/form-data">             
                            <input type="hidden" class="form-control" name="_token" value="{{csrf_token()}}" />  
                            <div class="form-group">
                                <label>Thể loại</label>
                                <select class="form-control" name="TheLoai" id="TheLoai">
                                    @foreach($theloai as $t1)t 
                                        <option value="{{$t1->id}}">
                                            {{$t1->Ten}}
                                        </option> 
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tiêu đề</label>
                                <input class="form-control" name="TieuDe" placeholder="Nhập tiêu đề" />
                            </div>
                            <div class="form-group">
                                <label>Tóm tắt</label>
                                <textarea name="TomTat" class="form-control" rows="3" name="txtIntro"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Nội dung</label>
                                <textarea name="NoiDung" class="form-control ckeditor" rows="3" name="txtContent"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Hình ảnh</label>
                                <input type="file" name="Hinh">
                            </div>
                 
                            <div class="form-group">
                                <label>Nổi bật</label>
                                <label class="radio-inline">
                                    <input name="NoiBat" value="0" checked="" type="radio">Không
                                </label>
                                <label class="radio-inline">
                                    <input name="NoiBat" value="1" type="radio">Có
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Thêm</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->



        <!-- /#page-wrapper -->

@endsection