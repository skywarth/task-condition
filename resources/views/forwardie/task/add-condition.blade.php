@extends('backend.layouts.app')

@section('title', "Forwardie")



@section('content')
    <div class="card">
        <div class="card-header">
            Task List
        </div>
        <div class="card-body">
        <form id="taskCreateForm">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Task Title">

            </div>
            <div class="form-group">
                <label for="task_type_id">Example select</label>
                <select class="form-control" name="task_type_id" id="task_type_id">
                    @foreach($taskTypes as $type)
                        <option value="{{$type->id}}">{{$type->name}}</option>
                    @endforeach
                </select>
            </div>

            <hr>
            <div class="form-group typeSpecificDataContainer">
                <div id="additionals" class="additionalsForm">
                <div class="datapane custom_ops d-none">
                    <div class="form-row ">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Country" value="Country"   readonly>
                        </div>
                        <div class="col">
                            <input type="text" name="country" class="form-control" placeholder="TR">
                        </div>
                    </div>
                </div>

                <div class="datapane invoice_ops d-none">
                    <div class="form-row ">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="First name" value="Currency" readonly>
                        </div>
                        <div class="col">
                            <select class="form-control" name="currency" id="currency">
                                <option value="" selected>None</option>
                                @foreach($currencies as $currency)

                                    {{-- <option value="{{$currency->id}}">{{$currency->name.' ('.$currency->sign.')'}}</option>--}}
                                     <option value="{{$currency->sign}}">{{$currency->name.' ('.$currency->sign.')'}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-row ">
                        <div class="col">
                            <input type="text"  class="form-control" placeholder="Quantity" value="Quantity"   readonly>
                        </div>
                        <div class="col">
                            <input type="text" name="quantity" id="quantity" class="form-control" placeholder="0">
                        </div>
                    </div>
                </div>

                <div class="datapane common_ops d-none">

                </div>
                </div>
            </div>
            <hr>

            <span class="text-muted d-block">You can add prerequisites later</span>
            <button id="createTaskButton" type="button" class="btn btn-primary mb-2">Save</button>

        </form>
        </div>
    </div>





@endsection
@push('after-scripts')
    <script type="text/javascript" src="{{ URL::asset ('js/Task.js') }}"></script>
@endpush
