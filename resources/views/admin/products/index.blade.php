@extends('layouts.admin')

@section('title')
    <title>List product </title>

@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header',['name'=>'product','key'=>'List']);
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{route('admin.products.create')}}" class="btn btn-success float-right m-2">ADD </a>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Ngày sx</th>
                                <th scope="col">Hạn sd</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">User name</th>
                                <th scope="col">Tên danh mục</th>
                                <th scope="col">Thời gian tạo</th>
                                <th scope="col">Thời gian sửa</th>
                                <th scope="col" colspan="2">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $key=>$product)
                                <tr>
                                    <th scope="row">{!! $key+1 !!}</th>
                                    <td>{!! $product->name !!}</td>
                                    <td>{!! $product->mfg !!}</td>
                                    <td>{!! $product->exp !!}</td>
                                    <td>
                                        <img width="200px" src="{{ asset($product->feature_image_path) }}">

                                    </td>
                                    <td>{!! $product->user_id !!}</td>
                                    <td>{!! $product->category_id !!}</td>
                                    <td>
                                        {!! $product->created_at !!}</td>
                                    <td>
                                        {!! $product->updated_at !!}</td>
                                    <td class="center">
                                        {{ Form::open(['url' => route('admin.products.destroy', $product->id), 'method' => 'delete']) }}
                                        {{ Form::submit('delete!', ["class"=>'btn btn-danger', 'onclick' => "return xacnhanxoa('bạn có chắc chắn xóa')"]) }}
                                        {{ Form::close() }}
                                    </td>
                                    <td class="center">
                                        <a class="btn btn-warning"
                                           href="{{route('admin.products.edit', $product->id)}}">Edit!</a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>

                    </div>
                    <div class="col-md-12">
                        {{$products->links('pagination::bootstrap-4')}}
                    </div>

                </div>
                <!-- /.row -->

            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection


