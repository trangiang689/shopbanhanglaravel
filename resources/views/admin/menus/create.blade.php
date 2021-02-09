
@extends('admin_layout')

@section('title')
    <title>Add Menu </title>

@endsection

@section('admin_content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header',['name'=>'Menu','key'=>'Add']);

        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        {{ Form::model($menu, array('route' => 'admin.menus.store')) }}
                        <div class="form-group">
                            {{ Form::label('name', 'Tên danh mục',['class'=>'control-label']) }}

                            {{ Form::text('name',"", ['class' => "form-control",'placeholder' => "Nhập tên menu"]) }}

                        </div>

                        <div class="form-group">
                            <label >Chọn menu cha</label>
                            <select class="form-control" name="parent_id">
                                <option value="0">Chọn menu cha</option>
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


