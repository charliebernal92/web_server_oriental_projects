@extends('layouts.app')
<script src={{URL::to('js/tinymce/js/tinymce/tinymce.min.js')}}></script>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

{{--<script src="//cloud.tinymce.com/stable/tinymce.min.js"></script>--}} {{--Not Local Use --}}
<script src={{URL::to('js/tinymce/js/tinymce/tinymce.min.js')}}></script>


<script type="text/javascript">
    tinymce.init({
        selector: '#product_specification'
    });
    tinymce.init({
        selector: '#product_special_feature'
    });

    function makeSubCategory(s1, s2) {
        var s1 = document.getElementById(s1);
        var s2 = document.getElementById(s2);
        s2.innerHTML = "";
        var id = s1.value;
        //ajax
        var newOption = document.createElement("option");
        newOption.value = -1;
        newOption.innerHTML = "Please Choose an Option";
        s2.options.add(newOption);


        $.get('/oriental_projects/public/ajax-subcat?cat_id=' + id, function (data) {
            console.log(data)
            $.each(data, function (index, subcatObj) {
                var newOption = document.createElement("option");
                newOption.value = subcatObj.id;
                newOption.innerHTML = subcatObj.sub_cat_name;
                s2.options.add(newOption);
            });
        });
    }

    function makeSubSubCategory(s1, s2) {
        var s1 = document.getElementById(s1);
        var s2 = document.getElementById(s2);
        s2.innerHTML = "";
        var id = s1.value;
        //ajax
        var newOption = document.createElement("option");
        newOption.value = -1;
        newOption.innerHTML = "Please Choose an Option";
        s2.options.add(newOption);
        $.get('/oriental_projects/public/ajax-subsubcat?cat_id=' + id, function (data) {
            console.log(data)
            $.each(data, function (index, subcatObj) {
                var newOption = document.createElement("option");
                newOption.value = subcatObj.id;
                newOption.innerHTML = subcatObj.sub_sub_cat_name;
                s2.options.add(newOption);
            });
        });
    }
</script>

<style>
    #note_box_style {
        width: 100%;
        height: 150px;
        padding: 12px 20px;
        box-sizing: border-box;
        border: 2px solid #ccc;
        border-radius: 4px;
        background-color: #f8f8f8;
        font-size: 16px;
        resize: none;
    }

    #image_style {
        width: 100px;
        height: 80px;
        margin-left: 10px;
    }

</style>

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-15 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading">Store Your Memory</div>
                    <div class="panel-body">

                        <link rel="stylesheet"
                              href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
                        <div class="form-horizontal" role="form" method="PUT"
                                {{--  action="{{ url('/product/'.$product->id.'/update' ) }}"--}}>

                            {!! Form::open(array('url' => 'product/'.$product->id, 'method' => 'put', 'files'=>true)) !!}
                            {{ csrf_field() }}


                            <div class="form-group{{ $errors->has('product_name') ? ' has-error' : '' }}">
                                <label for="product_name" class="col-md-3 control-label">Product Name</label>

                                <div class="col-md-8">
                                    <textarea class="form-control" type="text" rows="1" id="product_name"
                                              name="product_name"
                                              required
                                            >
                                          {!! $product->product_name  !!}
                                    </textarea>
                                    @if ($errors->has('product_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('product_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="category" class="col-md-3 control-label">Category</label>

                                <div class="col-md-8">
                                    <select name="category" id="category"
                                            onChange=" makeSubCategory('category', 'sub_category' )">
                                        <option value={!! $category->id  !!}>{{$category->cat_name}}</option>
                                        @foreach($categories as $category)
                                            <option value={{$category->id}}>{{$category->cat_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="sub_category" class="col-md-3 control-label">Sub Category</label>
                                <?php
                                if ($sub_category == null) {
                                    $sub_cat_name = "No";
                                    $sub_cat_id = -1;
                                } else {
                                    $sub_cat_name = $sub_category->sub_cat_name;
                                    $sub_cat_id = $sub_category->id;
                                }
                                ?>
                                <div class="col-md-8">
                                    <select name="sub_category" id="sub_category"
                                            onChange=" makeSubSubCategory('sub_category', 'sub_sub_category' )">
                                        <option value={!!  $sub_cat_id !!}>{{$sub_cat_name}}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="sub_sub_category" class="col-md-3 control-label">Sub Sub Category</label>
                                <?php
                                if ($sub_sub_category == null) {
                                    $sub_sub_cat_name = "No";
                                    $sub_sub_cat_id = -1;
                                } else {
                                    $sub_sub_cat_name = $sub_sub_category->sub_sub_cat_name;
                                    $sub_sub_cat_id = $sub_sub_category->id;
                                }
                                ?>
                                <div class="col-md-8">
                                    <select name="sub_sub_category" id="sub_sub_category">
                                        <option value={!!  $sub_sub_cat_id !!}>{{ $sub_sub_cat_name}}</option>
                                    </select>
                                </div>
                            </div>

                            {{--Image Update--}}
                            <div class="form-group">
                                <label for="image" class="col-md-3 control-label">Upload image</label>

                                <div class="col-md-8">
                                    <input type="file" class="form-control" id="file" name="files[]" multiple="true"
                                           onchange="preview_images();"/>
                                </div>

                                <div class="row" id="image_preview"></div>
                                <script>
                                    function preview_images() {
                                        $("#image_preview").html("");
                                        $("#product_image").html("");
                                        var total_file = document.getElementById("file").files.length;
                                        for (var i = 0; i < total_file; i++) {
                                            $('#image_preview').append("<div class='col-md-3'><img class='img-responsive' src='" + URL.createObjectURL(event.target.files[i]) + "'></div>");
                                        }
                                    }
                                </script>

                            </div>

                            {{-- Old Image Show--}}
                            <div class="form-group">
                                <label class="col-md-3 control-label"></label>

                                <div class="col-md-8" id="product_image">
                                    <?php
                                    $image_tbl = new \App\Image();
                                    $images = $image_tbl::where('product_id', $product->id)->get();
                                    ?>
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
                                <label for="video" class="col-md-3 control-label">Upload Video</label>

                                <div class="col-md-8">
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
                                    <input type="file" class="form-control" id="video"
                                           name="videos[]" multiple="true"/>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="specification_pdf" class="col-md-3 control-label">Upload Specification
                                    Pdf</label>

                                <div class="col-md-8">
                                    <?php
                                    if ($specification_pdf != null) {
                                        $path = "http://localhost/oriental_projects/" . $specification_pdf->url;
                                        $title = "Show Pdf";
                                    } else {
                                        $path = null;
                                        $title = "No Specification file exist.";
                                    }
                                    ?>
                                    <a href={{$path}}>{{$title}}.</a>
                                    <input type="file" class="form-control" id="specification_pdf"
                                           name="specification_pdf" multiple="false"/>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="offer_pdf" class="col-md-3 control-label">Upload Offer Pdf</label>

                                <div class="col-md-8">
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
                                    <input type="file" class="form-control" id="offer_pdf" name="offer_pdf"
                                           multiple="false"/>
                                </div>
                            </div>




                            <div class="form-group{{ $errors->has('product_specification') ? ' has-error' : '' }}">
                                <label for="product_specification"
                                       class="col-md-3 control-label">Specifications</label>

                                <div class="col-md-8">
                            <textarea class="form-control" type="text" rows="10" id="product_specification"
                                      name="product_specification">
                                 {{ $product->product_specification  }}
                            </textarea>
                                    @if ($errors->has('product_specification'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('product_specification') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group{{ $errors->has('product_special_feature') ? ' has-error' : '' }}">
                                <label for="product_special_feature" class="col-md-3 control-label">Special
                                    Feature</label>

                                <div class="col-md-8">
                            <textarea class="form-control" type="text" rows="10" id="product_special_feature"
                                      name="product_special_feature">
                                 {{$product->product_special_feature}}
                            </textarea>
                                    @if ($errors->has('product_special_feature'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('product_special_feature') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-10">
                                    <button type="submit" class="btn btn-primary">
                                        Update
                                    </button>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
