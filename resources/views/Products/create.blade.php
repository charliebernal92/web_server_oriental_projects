@extends('layouts.app')

{{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">--}}{{--
<!-- jQuery library -->
--}}{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>--}}
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

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content a:hover {
        background-color: #f1f1f1
    }

</style>

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-15 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading">Store Your Memory</div>
                    <div class="panel-body">

                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/product') }}"
                              enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('product_name') ? ' has-error' : '' }}">
                                <label for="product_name" class="col-md-3 control-label">Product Name</label>

                                <div class="col-md-8">
                                    <textarea class="form-control" type="text" rows="1" id="product_name"
                                              name="product_name"
                                              value="{{ old('product_name') }}" required
                                            ></textarea>

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
                                        <option value=-1>{{"Please Choose an Option"}}</option>
                                        @foreach($categories as $category)
                                            <option value={{$category->id}}>{{$category->cat_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="sub_category" class="col-md-3 control-label">Sub Category</label>

                                <div class="col-md-8">
                                    <select name="sub_category" id="sub_category"
                                            onChange=" makeSubSubCategory('sub_category', 'sub_sub_category' )">
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="sub_sub_category" class="col-md-3 control-label">Sub Sub Category</label>

                                <div class="col-md-8">
                                    <select name="sub_sub_category" id="sub_sub_category"></select>
                                </div>
                            </div>


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
                                        var total_file = document.getElementById("file").files.length;
                                        for (var i = 0; i < total_file; i++) {
                                            $('#image_preview').append("<div class='col-md-3'><img class='img-responsive' src='" + URL.createObjectURL(event.target.files[i]) + "'></div>");
                                        }
                                    }
                                </script>

                            </div>


                            <div class="form-group">
                                <label for="specification_pdf" class="col-md-3 control-label">Upload Specification
                                    Pdf</label>

                                <div class="col-md-8">
                                    <input type="file" class="form-control" id="specification_pdf"
                                           name="specification_pdf" multiple="false"/>
                                </div>

                                {{-- <div class="row" id="specification_pdf_preview"></div>
                                 <script>
                                     function preview_images() {
                                         $("#specification_pdf_preview").html("");
                                         var total_file = document.getElementById("specification_pdf").files.length;
                                         for (var i = 0; i < total_file; i++) {
                                             $('#specification_pdf_preview').append("<div class='col-md-3'><img class='img-responsive' src='" + URL.createObjectURL(event.target.files[i]) + "'></div>");
                                         }
                                     }
                                 </script>--}}

                            </div>


                            <div class="form-group">
                                <label for="offer_pdf" class="col-md-3 control-label">Upload Offer Pdf</label>

                                <div class="col-md-8">
                                    <input type="file" class="form-control" id="offer_pdf" name="offer_pdf"
                                           multiple="false"/>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="video" class="col-md-3 control-label">Upload Video</label>

                                <div class="col-md-8">
                                    <input type="file" class="form-control" id="video" name="videos[]" multiple="true"
                                            />
                                </div>

                                {{-- <div class="row" id="image_preview"></div>
                                 <script>
                                     function preview_images() {
                                         $("#image_preview").html("");
                                         var total_file = document.getElementById("file").files.length;
                                         for (var i = 0; i < total_file; i++) {
                                             $('#image_preview').append("<div class='col-md-3'><img class='img-responsive' src='" + URL.createObjectURL(event.target.files[i]) + "'></div>");
                                         }
                                     }
                                 </script>--}}

                            </div>


                            <div class="form-group{{ $errors->has('product_specification') ? ' has-error' : '' }}">
                                <label for="product_specification" class="col-md-3 control-label">Specifications</label>

                                <div class="col-md-8">
                            <textarea class="form-control" type="text" rows="10" id="product_specification"
                                      name="product_specification"
                                    ></textarea>

                                    @if ($errors->has('product_specification'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('product_specification') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>



                            <div class="form-group{{ $errors->has('product_special_feature') ? ' has-error' : '' }}">
                                <label for="product_special_feature" class="col-md-3 control-label">Special Feature</label>

                                <div class="col-md-8">
                            <textarea class="form-control" type="text" rows="10" id="product_special_feature"
                                      name="product_special_feature"
                                    ></textarea>

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
                                        Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
