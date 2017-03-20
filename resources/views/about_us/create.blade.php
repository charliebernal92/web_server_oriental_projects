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
        selector: '#about_us_text'
    });

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

                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/about_us') }}"
                              enctype="multipart/form-data">
                            {{ csrf_field() }}


                            <div class="form-group{{ $errors->has('about_us_text') ? ' has-error' : '' }}">
                                <label for="about_us_text" class="col-md-3 control-label">About US </label>

                                <div class="col-md-8">
                            <textarea class="form-control" type="text" rows="10" id="about_us_text"
                                      name="about_us_text"
                                    ></textarea>

                                    @if ($errors->has('about_us_text'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('about_us_text') }}</strong>
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
