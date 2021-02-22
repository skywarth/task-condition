@extends('backend.layouts.app')

@section('title', "Forwardie")



@section('content')
    <div class="card">
        <div class="card-header">
            Task List
        </div>
        <div class="card-body">
            <h1>Adding prerequisites to {{$relatedTask->title}}</h1>
            <form class="form-inline">
                <input type="hidden" id="originTaskIdHidden" value="{{$relatedTask->id}}">
                <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Condition Task:</label>
                <select class="custom-select my-1 mr-sm-2" id="conditionSelect">
                    @foreach($tasks as $task)
                        <option value="{{$task->id}}">{{$task->title}}</option>
                    @endforeach
                </select>

                <button id="addConditionButton" type="button" class="btn btn-primary my-1">Add</button>
            </form>
        </div>
    </div>





@endsection
@push('after-scripts')
    <script type="text/javascript" src="{{ URL::asset ('js/Task.js') }}"></script>
    <script>
        document.querySelector("#addConditionButton").addEventListener("click",function (){
            addCondition(document.getElementById("conditionSelect").value);
        })
    </script>
@endpush
