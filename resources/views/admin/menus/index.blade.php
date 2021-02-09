
@extends('admin_layout')

@section('title')
    <title>List Menu </title>

@endsection

@section('admin_content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header',['name'=>'menu','key'=>'List'])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{route('admin.menus.create')}}" class="btn btn-success float-right m-2">ADD </a>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Tên menu</th>
                                <th scope="col">Tên menu cha</th>
                                <th scope="col">Thời gian tạo</th>
                                <th scope="col">Thời gian sửa</th>
                                <th scope="col" colspan="2">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($menus as $key=>$menu)
                                <tr>
                                    <th scope="row">{!! $key+1 !!}</th>
                                    <td>{!! $menu->name !!}</td>
                                    <td>
                                        @if($menu->parent_id == 0)
                                            {!! "None" !!}
                                        @else

                                            {{$parent = DB::table('menus')->where('id',$menu->parent_id)->value('name')}}

                                        @endif

                                    </td>
                                    <td>
                                        {!! $menu->created_at !!}
{{--                                        {!!\Carbon\Carbon::createFromTimestamp(strtotime($menu->created_at))->diffForHumans() !!}--}}
                                        </td>
                                    <td>
                                        {!! $menu->updated_at !!}
{{--                                        {!! \Carbon\Carbon::createFromTimestamp(strtotime($menu->updated_at))->diffForHumans() !!}--}}
                                        </td>
                                    <td class="center">
                                        {{ Form::open(['url' => route('admin.menus.destroy', $menu->id), 'method' => 'delete']) }}
                                        {{ Form::submit('delete!', ["class"=>'btn btn-danger', 'onclick' => "return xacnhanxoa('bạn có chắc chắn xóa')"]) }}
                                        {{ Form::close() }}
                                    </td>
                                    <td class="center">
                                        <a class="btn btn-warning"
                                           href="{{route('admin.menus.edit', $menu->id)}}">Edit!</a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>

                    </div>
                    <div class="col-md-12">
                        {{$menus->links('pagination::bootstrap-4')}}
                    </div>

                </div>
                <!-- /.row -->

            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection


