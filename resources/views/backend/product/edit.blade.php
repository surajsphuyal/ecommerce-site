
@extends('backend.layout.app')
@section('content')

    <div class="col-md-10 display-area">
        <div class="row text-center">
            <div class="col-md-12">
                <div class="content-box-large">
                    <div class="row justify-content-center">
                        <ol class="breadcrumb content-breadcrumb" >
                            <li>
                                <a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i>Dashboard</a>
                            </li>
                            <li><a href="{{ url('/backend/product') }}">Product</a></li>
                            <li class="active">Edit Product</li>
                        </ol>

                        <div class="col-md-8" style="background-color:#f2f2f2; margin:0 auto; width: 915px!important; float: none; padding-bottom:27px; padding-top:10px;">
                            <div class="card">
                                <div class="card-header">
                                    <h3>Edit Product</h3>
                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-8 col-md-offset-2">
                                            {!! Form::model($product,[ 'route' => ['backend.product.update', $product->id], 'method' => 'put', 'files' => true]) !!}

                                                <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }} ">
                                                    {{ Form::label('title', 'Title', ['style' => 'font-size:15px; font-weight: none;']) }}
                                                    {{ Form::text('title', null, array('class' => 'form-control', 'placeholder' => 'Title')) }}

                                                    @if($errors->has('title'))
                                                        <span class="help-block">{{ $errors->first('title') }}</span>
                                                    @endif
                                                </div>

                                                <div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }} ">
                                                    {{ Form::label('slug', 'Slug', ['style' => 'font-size:15px; font-weight: none;']) }}
                                                    {{ Form::text('slug', null, array('class' => 'form-control', 'placeholder' => 'Slug')) }}

                                                    @if($errors->has('slug'))
                                                        <span class="help-block">{{ $errors->first('slug') }}</span>
                                                    @endif
                                                </div>

                                                <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }} ">
                                                    {{ Form::label('description', 'Description', ['style' => 'font-size:15px; font-weight: none;']) }}
                                                    {{ Form::textarea('description', null, array('class' => 'form-control', 'id' => 'article-ckeditor' )) }}

                                                    @if($errors->has('description'))
                                                        <span class="help-block">{{ $errors->first('description') }}</span>
                                                    @endif
                                                </div>

                                                <div class="form-group {{ $errors->has('size') ? 'has-error' : '' }} ">
                                                    {{ Form::label('size', 'Size', ['style' => 'font-size:15px; font-weight: none;']) }}
                                                    {{ Form::select('size', ['small' => 'Small', 'medium'=> 'Medium', 'large' => 'Large'], null, array('class' => 'form-control')) }}

                                                    @if($errors->has('size'))
                                                        <span class="help-block">{{ $errors->first('size') }}</span>
                                                    @endif
                                                </div>

                                                <div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }} ">
                                                    {{ Form::label('category_id', 'Category', ['style' => 'font-size:15px; font-weight: none;']) }}
                                                    {{ Form::select('category_id', $categories, null, array('class' => 'form-control')) }}

                                                    @if($errors->has('category_id'))
                                                        <span class="help-block">{{ $errors->first('category_id') }}</span>
                                                    @endif
                                                </div>

                                                <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }} ">
                                                    {{ Form::label('price', 'Price', ['style' => 'font-size:15px; font-weight: none;']) }}
                                                    {{ Form::text('price', null, array('class' => 'form-control', 'placeholder' => 'Only input price without Rs.')) }}

                                                    @if($errors->has('price'))
                                                        <span class="help-block">{{ $errors->first('price') }}</span>
                                                    @endif
                                                </div>

                                                <div class="form-group {{ $errors->has('stock') ? 'has-error' : '' }} ">
                                                    {{ Form::label('stock', 'Stock', ['style' => 'font-size:15px; font-weight: none;']) }}
                                                    {{ Form::select('stock', ['available'=>'Available', 'unavailable'=>'Unavailable'], null, array('class' => 'form-control')) }}

                                                    @if($errors->has('stock'))
                                                        <span class="help-block">{{ $errors->first('stock') }}</span>
                                                    @endif
                                                </div>

                                                <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }} ">
                                                    {{ Form::label('image', 'Image', ['style' => 'font-size:15px; font-weight: none;']) }}
                                                    {{ Form::file('image', null, array('class' => 'form-control', 'placeholder' => 'Choose image')) }}

                                                    @if($errors->has('image'))
                                                        <span class="help-block">{{ $errors->first('image') }}</span>
                                                    @endif
                                                </div>
                                                

                                                {{ Form::submit('Update', array('class' => 'btn btn-primary ')) }}

                                            {!! Form::close() !!}

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/Display area after sidenav-->


    <!-- ck-editor script here -->
    <script type="text/javascript" src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>

    <!-- slug script here -->
    <script type="text/javascript">
        $('#title').on('blur', function(){
            var theTitle = this.value.toLowerCase().trim(),
            slugInput = $('#slug');
            theSlug = theTitle .replace(/&/g, '-and-')
                               .replace(/[^a-z0-9-]+/g, '-')
                               .replace(/\-\-+/g, '-')
                               .replace(/^-+|-+$/g, '');
                               

            slugInput.val(theSlug);
        });
    </script>


@endsection

    





