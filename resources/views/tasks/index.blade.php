@extends("app")


@section('content')

    <table>
    @foreach($tasks as $task)
            <tr>
                <td>{{$task->id}}</td>
                <td>{{$task->task}}</td>
            </tr>
    @endforeach
    </table>


@stop

