@extends('backend.layouts.app')

@section('title', "Forwardie")



@section('content')
    <div class="card">
        <div class="card-header">
            Task List
        </div>
        <div class="card-body">
            <h2>Ordered by condition order</h2>
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Type</th>
                    <th scope="col">Info</th>
                    <th scope="col">prerequisites</th>
                    <th scope="col">action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $task)
                    <tr>
                        <th scope="row">{{$task->id}}</th>
                        <td>{{$task->title}}</td>
                        <td>{{$task->TaskType->name}}</td>
                        <td>
                            @if($task->wildcard_info !=null)
                                @foreach ($task->wildcard_info as $info =>$value)
                                    <b>{{ $info }}</b>: {{ $value }}<br />
                                @endforeach
                            @endif


                        </td>
                        <td>{{$task->ConditionTitlesString()}}</td>
                        <td><a href="{{"/tasks/addCondition/".$task->id}}" class="btn btn-info">Add prerequisites</a> </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        </div>
    </div>





@endsection
