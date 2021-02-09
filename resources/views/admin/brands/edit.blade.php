
@extends('admin_layout')

@section('title')
    <title>Edit Brand </title>

@endsection

@section('admin_content')
    <?php
    if (!empty(old('faculties'))) {
        $dataOldFaculties = json_encode(array_values(old('faculties')));
    }
    else {
        $facultiesDisabled = "";
        $dataOldFaculties = $facultiesDisabled;
    }
    $facultiesSelected = json_decode($facultiesDisabled);
    ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header',['name'=>'brand','key'=>'Edit']);

        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        {!! Form::model($brand,[ 'route' => ['admin.categories.update', $brand->id] ,'method' => 'PUT']) !!}
                        <div class="form-group">
                            {{ Form::label('name', 'Tên danh mục',['class'=>'control-label']) }}

                            {{ Form::text('name',old('name', $brand['name']), ['class' => "form-control",'placeholder' => "Nhập tên danh mục"]) }}

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
                        <div class="form-group">
                            {{ Form::label('email', 'Email') }}
                            {{ Form::text('email', old('email', $brand['email']), ['class' => "form-control", 'placeholder' => "Please Enter email"]) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('phone', 'Phone number') }}

                            {{ Form::text('phone', old('phone_number', $brand['phone']), ['class' => "form-control", 'placeholder' => "Please Enter phone_number"]) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('address', 'Address') }}
                            {{ Form::text('address', old('address', $brand['address']), ['class' => "form-control", 'placeholder' => "Please Enter address"]) }}

                        </div>
                        {{ Form::label('facultiesInfor', 'Use for faculties :', ['class' => 'control-label']) }}
                        <div class="group-input-faculty container-fluid row">
                            {{ Form::text('facultiesInfor', '', ['class' => 'd-none', 'data-disabled' => '[]', 'data-oldFaculties' => $dataOldFaculties]) }}
                            <div class="col-md-6">
                                @if(!empty(old('faculties')))
                                    @foreach(old('faculties') as $key => $faculty)
                                        <div class="input-group mb-3 row">
                                            {{ Form::select('faculties['.$key.']', $faculties, $faculty,
                                                  ['placeholder' => 'Pick a faculty',
                                                  'id' => 'faculties-'.$key,
                                                  'class' => $errors->has('faculties.'.$key) ? 'input-faculty text-capitalize custom-select border-danger' : 'input-faculty text-capitalize custom-select',
                                                   'onchange' => 'changeChoseFaculty(this);' ,
                                                   'onclick' => 'setOldFaculty(this);']) }}
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-danger " onclick="deleteInputFaculty(this);" type="button">
                                                    &times;
                                                </button>
                                            </div>
                                            @if($errors->has('faculties.'.$key))
                                                <div class="mt-1 text-danger col-12">{{$errors->first('faculties.'.$key)}}</div>
                                            @endif
                                        </div>
                                    @endforeach
                                @elseif(!empty($facultiesSelected))
                                    @foreach($facultiesSelected as $key => $facultySelected)
                                        <div class="input-group mb-3 row">
                                            {{ Form::select('faculties['.$key.']', $faculties, $facultySelected,
                                                  ['placeholder' => 'Pick a faculty',
                                                  'id' => 'faculties-'.$key,
                                                  'class' => 'input-faculty text-capitalize custom-select',
                                                   'onchange' => 'changeChoseFaculty(this);' ,
                                                   'onclick' => 'setOldFaculty(this);']) }}
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-danger " onclick="deleteInputFaculty(this);" type="button">
                                                    &times;
                                                </button>
                                            </div>
                                        </div>

                                    @endforeach
                                @else
                                    <div class="input-group mb-3 row boxChua">
                                        {{ Form::select('faculties[0]', $faculties, null,
                                              ['placeholder' => 'Pick a faculty',
                                              'class' => 'input-faculty text-capitalize custom-select',
                                               'onchange' => 'changeChoseFaculty(this);' ,
                                               'onclick' => 'setOldFaculty(this);']) }}
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-danger " onclick="deleteInputFaculty(this);" type="button">
                                                &times;
                                            </button>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="text-left ml-2 mb-3">
                            <button type="button" class="btn btn-outline-info add-input-faculty">More Faculty</button>
                        </div>
                        <div id="dataInputAdd" class="d-none">
                            <div class="input-group mb-3 row">
                                {{Form::select("", $faculties, null,
                                ['placeholder' => 'Pick a faculty',
                                'class' => 'input-faculty text-capitalize custom-select',
                                'onchange' => 'changeChoseFaculty(this);',
                                'onclick' => 'setOldFaculty(this);' ])}}
                                <div class="input-group-append">
                                    <button class="btn btn-outline-danger" onclick="deleteInputFaculty(this);" type="button">&times;</button>
                                </div>
                            </div>
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

@section('js')

<script src="{{asset('/js/admin/subjects.js')}}"></script>
@endsection


