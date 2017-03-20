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

    #title_style {
        margin-top: 40px;
        margin-left: 10px;
        padding: 5px;
    }

    #image_style {
        width: 100px;
        height: 100px;
    }

</style>

@section('content')

    <div>
        <ul class="list-group">

            @foreach($products as $product)

                <li class="list-group-item"
                    style="margin-top: 20px">

                    <div class="row">

                        <div class="col-md-2"
                                >
                            <?php
                            $image_tbl = new \App\Image();
                            $image = $image_tbl::where('product_id', $product->id)->first();
                            if ($image != null) {
                                $image_url = "http://localhost/oriental_projects/" . $image->image_url;
                            }else{
                                $image_url="null";
                            }
                            ?>

                            <img id="image_style"
                                 src="{{$image_url}}"
                                    {{--  src=http://www.oriental.com.bd/wp-content/uploads/2016/12/cp-w3530wn.jpg--}}
                                    >
                            </img>

                        </div>

                        <div class="col-md-2" id="title_style">
                            {!! $product->product_name !!}
                        </div>

                        <div class="col-md-4 pull-right">

                            <a class="btn btn-xs btn-info col-md-2"
                               id="button_style"
                               href="{{ URL::to( 'product/'.$product->id ) }}">Details</a>

                            <a class="btn btn-xs btn-primary col-md-2"
                               id="button_style"
                               href="{{ URL::to( 'product/'.$product->id .'/edit') }}">UPDATE</a>

                            {!!  Form::open(array('url' => 'product/' . $product->id ,/* 'class' => 'col-sm-4'*/)) !!}
                            {!! Form::hidden('_method', 'DELETE') !!}
                            {!!  csrf_field() !!}
                            {!! Form::submit('Delete', array('class' => 'btn btn-xs btn-danger col-md-2','id'=>'button_style',)) !!}
                            {!! Form::close() !!}

                        </div>
                    </div>

                </li>


            @endforeach
        </ul>


    </div>
@endsection


