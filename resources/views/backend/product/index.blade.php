
@extends('backend.layout.app')
@section('content')

    <div class="col-md-10 display-area">
        <div class="row text-center">
            <div class="col-md-12">
                <div class="content-box-large">
                    <div class="row justify-content-center">
                        <ol class="breadcrumb content-breadcrumb" style="">
                            <li>
                                <a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i>Dashboard</a>
                            </li>
                            <li class="active">All Product</li>
                        </ol>
                        <div class="col-md-8" style="background-color:#f2f2f2; margin:0 auto; width: 915px!important; float: none; padding-bottom:27px; padding-top:10px;">
                            
                            <div class="pull-left">
                                <a href="{{ route('backend.product.create') }}" class="btn btn-primary">Add Product</a>
                            </div>

                            @if (! $product->count())
                                <div class="col-md-7 alert alert-danger" style="margin-left:30px;">
                                    <strong> No record found !</strong>
                                </div>
                            @else

                                <div class="card">
                                    
                                    <div class="col-md-8 card-header">
                                        <h3 >All Product</h3>
                                    </div>

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 col-md-offset-1" style="margin-left:0px;">
                                                <table class="table table-striped table-hover">
                                                    <thead>
                                                        <tr>
                                                        <th scope="col">Action</th>
                                                        <th scope="col">Title</th>
                                                        <th scope="col">Description</th>
                                                        <th scope="col">Category</th>
                                                        <th scope="col">Size</th>
                                                        <th scope="col">Price</th>
                                                        <th scope="col">Stock</th>
                                                        <th scope="col">Date</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($product as $post)
                                                            <tr>
                                                            <td scope="row">
                                                                {!! Form::open(['route' => ['backend.product.destroy', $post->id], 'method' => 'DELETE', 'files' => true]) !!}
                                                                    
                                                                    <a href="{{ route('backend.product.edit', $post->id) }}" class="btn btn-info btn-xs">
                                                                        <span class="glyphicon glyphicon-edit"></span> Edit
                                                                    </a>

                                                                    <button type="submit" onclick="return confirm('Are you sure you want to delete this item ?');" class="btn btn-xs btn-danger">
                                                                    <span class="glyphicon glyphicon-trash"></span> Delete
                                                                    </button>
                                                                {!! Form::close() !!}
                                                            </td>
                                                            <td>{!! str_limit($post->title, 20, '....') !!}</td>
                                                            <td>{!! str_limit($post->description, 20, '....') !!}</td>
                                                            <td>{{ $post->category->title }}</td>
                                                            <td>{{ $post->size }}</td>
                                                            <td>{{ $post->price }}</td>
                                                            <td>{{ $post->stock }}</td>
                                                            <td>{{ $post->updated_at }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-footer clearfix">
                                        <div class="pull-left">
                                            {{ $product->render() }}
                                        </div>
                                    </div>

                                    <div class="pull-right">
                                        <strong>Total: </strong><small>{{ $product_count }} {{ str_plural('Item', $product_count) }}</small>
                                    </div>

                                </div>

                            @endif    
                         
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/Display area after sidenav-->

@endsection
