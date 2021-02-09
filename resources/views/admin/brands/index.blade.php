@extends('admin_layout')

@section('title')
    <title>List Brand </title>

@endsection

@section('admin_content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header',['name'=>'Brand','key'=>'List'])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{route('admin.brands.create')}}" class="btn btn-success float-right m-2">ADD </a>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Tên nhà cung cấp</th>
                                <th scope="col">Tên nhà cung cấp cha</th>
                                <th scope="col">Email</th>
                                <th scope="col">Số điện thoại</th>
                                <th scope="col">Địa chỉ</th>
                                <th scope="col">Thời gian tạo</th>
                                <th scope="col">Thời gian sửa</th>
                                <th scope="col" colspan="2">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($brands as $key=>$brand)
                                <tr>
                                    <th scope="row">{!! $key+1 !!}</th>
                                    <td>{!! $brand->name !!}</td>
                                    <td>
                                        @if($brand->parent_id == 0)
                                            {!! "None" !!}
                                        @else
                                            {{$parent = DB::table('brands')->where('id',$brand->parent_id)->value('name')}}

                                        @endif

                                    </td>
                                    <td>{!! $brand->email !!}</td>
                                    <td>{!! $brand->phone !!}</td>
                                    <td>{!! $brand->address !!}</td>
                                    <td>
                                        {!! $brand->created_at !!}</td>
                                    <td>
                                        {!! $brand->updated_at !!}</td>
                                    <td class="center">
                                        {{ Form::open(['url' => route('admin.brands.destroy', $brand->id), 'method' => 'delete']) }}
                                        {{ Form::submit('delete!', ["class"=>'btn btn-danger', 'onclick' => "return xacnhanxoa('bạn có chắc chắn xóa')"]) }}
                                        {{ Form::close() }}
                                    </td>
                                    <td class="center">
                                        <a class="btn btn-warning"
                                           href="{{route('admin.brands.edit', $brand->id)}}">Edit!</a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>

                    </div>
                    <div class="col-md-12">
                        {{$brands->links('pagination::bootstrap-4')}}
                    </div>

                </div>
                <!-- /.row -->

            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection


