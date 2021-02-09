
@extends('admin_layout')

@section('title')
    <title>Edit Category </title>

@endsection

@section('admin_content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header',['name'=>'category','key'=>'Edit']);

        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        {!! Form::model($category,[ 'route' => ['admin.categories.update', $category->id] ,'method' => 'PUT']) !!}
                        <div class="form-group">
                            {{ Form::label('name', 'Tên danh mục',['class'=>'control-label']) }}

                            {{ Form::text('name',old('name', $category['name']), ['class' => "form-control",'placeholder' => "Nhập tên danh mục"]) }}

                        </div>
                        {{--                            <div class="form-group">--}}
                        {{--                                <label >Tên danh mục</label>--}}
                        {{--                                <input type="text" class="form-control" name="name" placeholder="Nhập tên danh mục">--}}
                        {{--                            </div>--}}
                        <div class="form-group">
                            <label >Chọn danh mục cha</label>
                            <select class="form-control" name="parent_id">
                                <option value="0">Chọn danh mục cha</option>
                                {!! $htmloption !!}
                            </select>
                        </div>

                        {{ Form::submit('Save!', ["class"=>'btn btn-primary']) }}
                        {{ Form::button('Reset!', ["class"=>'btn btn-default', 'type'=> "reset"]) }}
                        {{ Form::close() }}
                    </div>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection


