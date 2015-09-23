@extends("app")


@section('content')

    <h1>Push notifications</h1>

    {!! Form::open(array('url' => 'send_push')) !!}
        {!! Form::checkbox('type', '0') !!}Android
        {!! Form::checkbox('type', '1') !!}Ios

        {!! Form::text('tbMessage') !!}

        {!! Form::submit('Send Push!') !!}
    {!! Form::close() !!}

    @if( isset($messages) )
        @foreach ($messages->all('<li>:message</li>') as $message)
            {{$message}}
        @endforeach
    @endif

@stop

