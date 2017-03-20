@extends('layouts.app')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<style xmlns="http://www.w3.org/1999/html">
    #button_style {
        margin-top: 40px;
        margin-left: 10px;
        margin-bottom: 10px;
        margin-right: 10px;
        padding: 5px;
    }

    #name_style {
        margin-top: 10px;
        margin-left: 0px;
        padding: 5px;
        size: 20px;
    }

    #title_style {
        margin-top: 10px;
        margin-left: 0px;
        padding: 5px;
        size: 20px;
    }

</style>

@section('content')

    <div>
        <ul class="list-group">
                <li class="list-group-item"
                    style="margin-top: 0px">

                    <div class="row">
                        <div class="col-md-2" id="title_style">
                            {!!" <b>About Us Text :</b>" !!}
                        </div>

                    <div class="row">
                        <div class="col-md-2" id="name_style">
                            {!! $abouts->about_us_string !!}
                        </div>

                        <div class="col-md-4 pull-right">

                            <a class="btn btn-xs btn-primary col-md-2"
                               id="button_style"
                               href="{{ URL::to( 'about_us/'.$abouts->id .'/edit') }}">UPDATE</a>

                           {{-- {!!  Form::open(array('url' => 'about_us/' . $abouts->id ,/* 'class' => 'col-sm-4'*/)) !!}
                            {!! Form::hidden('_method', 'DELETE') !!}
                            {!!  csrf_field() !!}
                            {!! Form::submit('Delete', array('class' => 'btn btn-xs btn-danger col-md-2','id'=>'button_style',)) !!}
                            {!! Form::close() !!}--}}

                        </div>
                    </div>

                </li>
        </ul>


    </div>
@endsection


