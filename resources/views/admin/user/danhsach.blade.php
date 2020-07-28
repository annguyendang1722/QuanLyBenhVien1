@extends('admin.layout.index')
        @section('content')
                <div id="page-wrapper">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <h1 class="page-header">Category
                                    <small>List</small>
                                </h1>
                            </div>
                            <!-- /.col-lg-12 -->
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr align="center">
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email Parent</th>
                                        <th>Level</th>
                                        <th>Delete</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="odd gradeX" align="center">
                                        <td>1</td>
                                        <td>Tin Tức</td>
                                        <td>None</td>
                                        <td>Hiện</td>
                                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td>
                                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">Edit</a></td>
                                    </tr>


                                    @foreach ($user as $u)                                                               
                                        <tr class="odd gradeX" align="center">
                                            <td>{{$u->id}}</td>
                                            <td>{{$u->name}}</td>
                                            <td>{{$u->email}}</td>
                                            <td>
                                            @if($u->quyen == 1)
                                                {{"Admin"}}
                                            @else 
                                                {{"Thường"}}                                              
                                            @endif
                                            </td>
                                            <td class="center">
                                                <i class="fa fa-trash-o  fa-fw"></i>
                                                <a href="/admin/user/xoa/{{$u->id}}"> Delete</a>
                                            </td>
                                            <td class="center">
                                                <i class="fa fa-pencil fa-fw"></i> 
                                                <a href="/admin/user/sua/{{$u->id}}">Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach                                 
                                </tbody>
                            </table>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->
                </div>
                <!-- /#page-wrapper -->
        @endsection