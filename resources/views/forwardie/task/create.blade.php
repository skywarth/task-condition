@extends('backend.layouts.app')

@section('title', "Forwardie")



@section('content')
    <div class="card">
        <div class="card-header">
            Task List
        </div>
        <div class="card-body">
        <form>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title"  placeholder="Task Title">

            </div>

            <div class="form-group typeSpecificDataContainer">
                <div class="form-row">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="First name">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Last name">
                    </div>
                </div>

            </div>

            <div class="form-group">
                <label for="task_type_id">Example select</label>
                <select class="form-control" id="task_type_id">
                    @foreach($taskTypes as $type)
                    <option value="{{$type->id}}">{{$type->name}}</option>
                    @endforeach
                </select>
            </div>
            <span class="text-muted">You can add prerequisites later</span>

        </form>
        </div>
    </div>





@endsection
@push('after-scripts')
    <script type="text/javascript" src="{{ URL::asset ('js/Task.js') }}"></script>
@endpush
