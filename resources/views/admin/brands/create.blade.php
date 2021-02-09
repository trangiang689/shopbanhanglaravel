
@extends('admin_layout')

@section('title')
    <title>Add Brand </title>

@endsection

@section('admin_content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header',['name'=>'brand','key'=>'Add']);

        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        {{ Form::model($brand, array('route' => 'admin.brands.store')) }}
                        <div class="form-group">
                            {{ Form::label('name', 'Tên nhà cung cấp',['class'=>'control-label']) }}

                            {{ Form::text('name',"", ['class' => "form-control",'placeholder' => "Nhập tên cung cấp"]) }}
                        </div>

                            <div class="form-group">
                                <label >Chọn nhà cung cấp cha</label>
                                <select class="form-control" name="parent_id">
                                    <option value="0">Chọn nhà cung cấp cha</option>
                                    {!! $htmloption !!}
                                </select>
                            </div>
                        <div class="form-group">
                            {{ Form::label('email', 'Email',['class'=>'control-label']) }}

                            {{ Form::text('email', '', ['class' => "form-control", 'placeholder' => "Please Enter email"]) }}

                        </div>

                        <div class="form-group">
                            {{ Form::label('phone', 'Phone number',['class'=>'control-label']) }}

                            {{ Form::text('phone', '', ['class' => "form-control", 'placeholder' => "Please Enter phone_number"]) }}

                        </div>

                        <div class="form-group">
                            {{ Form::label('address', 'Address',['class'=>'control-label']) }}

                            {{ Form::text('address', '', ['class' => "form-control", 'placeholder' => "Please Enter address"]) }}

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


