@extends('layouts.app')
@extends('layouts.buttonGroup')
{{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">--}}

<style>
    #button_style {
        margin: 10px;
        padding: 5px;
    }

    #product_name {
        margin: 5px;
    }

    #image_style {
        width: 100px;
        height: 80px;
        margin-left: 10px;
    }

    #product_specification {
    }

</style>

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-15 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading">Product Details</div>

                    <div class="col-md-8 col-md-offset-8">

                        <a class="btn btn-xs btn-primary col-md-2"
                           id="button_style"
                           href="{{ URL::to( 'product/'.$product->id .'/edit') }}">UPDATE</a>

                        {!!  Form::open(array('url' => 'product/' . $product->id ,/* 'class' => 'col-sm-4'*/)) !!}
                        {!! Form::hidden('_method', 'DELETE') !!}
                        {!!  csrf_field() !!}
                        {!! Form::submit('Delete', array('class' => 'btn btn-xs btn-danger col-md-2','id'=>'button_style',)) !!}
                        {!! Form::close() !!}

                        @yield('button_group')
                    </div>

                    <div class="panel-body">
                        <div class="form-horizontal">

                            <div class="form-group">
                                <label class="col-md-3 control-label">Product Name</label>

                                <div class="col-md-8" id="product_name">
                                    {{ $product->product_name }}
                                </div>
                            </div>

                            <div class="panel-body">
                                <div class="form-horizontal">

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Category</label>

                                        <div class="col-md-8" id="product_name">
                                            {{ $category->cat_name }}
                                        </div>
                                    </div>

                                    <div class="panel-body">
                                        <div class="form-horizontal">

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Sub Category</label>

                                                <div class="col-md-8" id="sub_category">
                                                    <?php
                                                    if ($sub_category == null) {
                                                        $sub_cat_name = "No";
                                                    } else {
                                                        $sub_cat_name = $sub_category->sub_cat_name;
                                                    }
                                                    ?>
                                                    {{ $sub_cat_name }}
                                                </div>
                                            </div>

                                            <div class="panel-body">
                                                <div class="form-horizontal">

                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Sub Sub Category</label>

                                                        <div class="col-md-8" id="product_name">
                                                            <?php
                                                            if ($sub_sub_category == null) {
                                                                $sub_sub_cat_name = "No";
                                                            } else {
                                                                $sub_sub_cat_name = $sub_sub_category->sub_sub_cat_name;
                                                            }
                                                            ?>
                                                            {{ $sub_sub_cat_name }}
                                                        </div>
                                                    </div>


                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Images </label>

                                                        <div class="col-md-8" id="product_image">
                                                            <?php
                                                            $image_tbl = new \App\Image();
                                                            $images = $image_tbl::where('product_id', $product->id)->get();?>
                                                            @foreach($images as $image)
                                                                <?php $image_url = "http://localhost/oriental_projects/" . $image->image_url;?>
                                                                <img id="image_style"
                                                                     src="{{$image_url}}"
                                                                        >
                                                                </img>
                                                            @endforeach

                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Videos </label>

                                                        <div class="col-md-8" id="product_video">
                                                            <?php
                                                            $video_tbl = new \App\Video();
                                                            $videos = $video_tbl::where('product_id', $product->id)->get();
                                                            $counter = 1;
                                                            ?>
                                                            @foreach($videos as $video)
                                                                <?php
                                                                $path = "http://localhost/oriental_projects/" . $video->video_url;
                                                                $title = "Show Video " . $counter."";
                                                                $counter++;
                                                                ?>
                                                                <a href={{$path}}>{{$title}}.</a>
                                                            @endforeach

                                                        </div>
                                                    </div>


                                                    <div class="panel-body">
                                                        <div class="form-horizontal">

                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label">Offers</label>

                                                                <div class="col-md-8" id="product_name">
                                                                    <?php
                                                                    if ($offer_pdf != null) {
                                                                        $path = "http://localhost/oriental_projects/" . $offer_pdf->url;
                                                                        $title = "Show Pdf";
                                                                    } else {
                                                                        $path = null;
                                                                        $title = "No Offer file exist";
                                                                    }
                                                                    ?>
                                                                    <a href={{$path}}>{{$title}}.</a>
                                                                    {{-- {{ link_to_asset($path, 'Open the pdf!') }}--}}
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label">Specification
                                                                    Pdf</label>

                                                                <div class="col-md-8" id="$specification_pdf">
                                                                    <?php
                                                                    if ($specification_pdf != null) {
                                                                        $path = "http://localhost/oriental_projects/" . $specification_pdf->url;
                                                                        $title = "Show Pdf";
                                                                    } else {
                                                                        $path = null;
                                                                        $title = "No Specification file exist";
                                                                    }
                                                                    ?>
                                                                    <a href={{$path}}>{{$title}}.</a>
                                                                    {{-- {{ link_to_asset($path, 'Open the pdf!') }}--}}
                                                                </div>
                                                            </div>


                                                            <div class="form-group">
                                                                <label for="note" class="col-md-3 control-label">Product
                                                                    Specification</label>

                                                                <div class="col-md-8" id="product_specification">
                                                                    {!! $product->product_specification !!}
                                                                </div>
                                                            </div>


                                                            <div class="form-group">
                                                                <label for="note" class="col-md-3 control-label">
                                                                    Special Features</label>

                                                                <div class="col-md-8" id="product_specification">
                                                                    {!! $product->product_special_feature !!}
                                                                </div>
                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
@endsection
