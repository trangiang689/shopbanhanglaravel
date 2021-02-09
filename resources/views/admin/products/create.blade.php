@extends('admin_layout')

@section('title')
    <title>Add Product </title>

@endsection

@section('admin_content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header',['name'=>'Product','key'=>'Add']);

        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        {{ Form::model($product, array('route' => 'admin.products.store','enctype'=>"multipart/form-data")) }}
                        <div class="form-group">
                            {{ Form::label('name', 'Tên sản phẩm',['class'=>'control-label']) }}

                            {{ Form::text('name',"", ['class' => "form-control",'placeholder' => "Nhập tên sản phẩm"]) }}

                        </div>
                        <div class="form-group">
                            {{ Form::label('price', 'Giá',['class'=>'control-label']) }}

                            {{ Form::text('price',"", ['class' => "form-control",'placeholder' => "Nhập giá sản phẩm"]) }}

                        </div>
                        <div class="form-group">
                            {{Form::label('mfg','Ngày sản xuất',['class'=>'control-label'])}}
                            {{Form::date('mfg', \Carbon\Carbon::now())}}
                        </div>
                        <div class="form-group">
                            {{Form::label('exp','Hạn sử dụng',['class'=>'control-label'])}}
                            {{Form::date('exp', \Carbon\Carbon::now())}}
                        </div>
                        <div class="form-group">
                            {{ Form::label('feature_image_path', 'Ảnh đại diện',['class'=>'control-label']) }}
                            <input type="file" name="feature_image_path" accept="image/*">
                        </div>

                        <div class="form-group">
                            <label>Ảnh chi tiết</label>
                            <input type="file" multiple class="form-control" name="image_path[]" accept="image/*">
                        </div>




                        {{--                        <div class="form-group">--}}
                        {{--                            {{ Form::label('user_id', 'Username',['class'=>'control-label']) }}--}}
                        {{--                            {{Form::select('user_id',$users,null,['class'=>'control-label states'])}}--}}
                        {{--                        </div>--}}

                        <div class="form-group">
                            <label>Chọn danh mục</label>
                            <select class="form-control" name="category_id">
                                <option value="0">Chọn danh mục</option>
                                {!! $categories !!}
                            </select>
                        </div>

                        <div >
                            <label for="content">Nội dung</label>
                            <div>
                                <textarea  rows="3" name="content"></textarea>
                            </div>

                        </div>

                        {{csrf_field()}}
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


