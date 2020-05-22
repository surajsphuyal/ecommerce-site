
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
                            <li><a href="{{ url('/backend/category') }}">Category</a></li>
                            <li class="active">Edit Category</li>
                        </ol>

                        <div class="col-md-8" style="background-color:#f2f2f2; margin:0 auto; width: 915px!important; float: none; padding-bottom:27px; padding-top:10px;">
                            <div class="card">
                                <div class="card-header">
                                    <h3>Edit Category</h3>
                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-8 col-md-offset-2">
                                            {!! Form::model($category,[ 'route' => ['backend.category.update', $category->id], 'method' => 'put', 'files' => true]) !!}

                                                <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }} ">
                                                    {{ Form::label('title', 'Title', ['style' => 'font-size:15px; font-weight: none;']) }}
                                                    {{ Form::text('title', null, array('class' => 'form-control')) }}

                                                    @if($errors->has('title'))
                                                        <span class="help-block">{{ $errors->first('title') }}</span>
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

@endsection
