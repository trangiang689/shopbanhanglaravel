@extends('admin_layout')

@section('title')
    <title>List Category </title>

@endsection

@section('admin_content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header',['name'=>'category','key'=>'List'])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{route('admin.categories.create')}}" class="btn btn-success float-right m-2">ADD </a>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Tên danh mục</th>
                                <th scope="col">Tên danh mục cha</th>
                                <th scope="col">Thời gian tạo</th>
                                <th scope="col">Thời gian sửa</th>
                                <th scope="col" colspan="2">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $key=>$category)
                                <tr>
                                    <th scope="row">{!! $key+1 !!}</th>
                                    <td>{!! $category->name !!}</td>
                                    <td>
                                        @if($category->parent_id == 0)
                                            {!! "None" !!}
                                        @else
                                            {{$parent = DB::table('categories')->where('id',$category->parent_id)->value('name')}}

                                        @endif

                                    </td>
                                    <td>
                                        {!! $category->created_at !!}</td>
                                    <td>
                                        {!! $category->updated_at !!}</td>
                                    <td class="center">
                                        {{ Form::open(['url' => route('admin.categories.destroy', $category->id), 'method' => 'delete']) }}
                                        {{ Form::submit('delete!', ["class"=>'btn btn-danger', 'onclick' => "return xacnhanxoa('bạn có chắc chắn xóa')"]) }}
                                        {{ Form::close() }}
                                    </td>
                                    <td class="center">
                                        <a class="btn btn-warning"
                                           href="{{route('admin.categories.edit', $category->id)}}">Edit!</a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>

                    </div>
                    <div class="col-md-12">
                        {{$categories->links('pagination::bootstrap-4')}}
                    </div>

                </div>
                <!-- /.row -->

            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection


