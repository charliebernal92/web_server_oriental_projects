<div class="col-md-4 pull-right">

    <a class="btn btn-xs btn-info col-md-2"
       id="button_style"
       href="{{ URL::to( 'products/'.$product->id ) }}">Details</a>

    <a class="btn btn-xs btn-primary col-md-2"
                             id="button_style"
                             href="{{ URL::to( 'product/'.$product->id .'/edit') }}">UPDATE</a>

    {!!  Form::open(array('url' => 'product/' . $product->id ,/* 'class' => 'col-sm-4'*/)) !!}
    {!! Form::hidden('_method', 'DELETE') !!}
    {!! Form::submit('Delete', array('class' => 'btn btn-xs btn-danger col-md-2','id'=>'button_style',)) !!}
    {!! Form::close() !!}

    @yield('button_group')
</div>