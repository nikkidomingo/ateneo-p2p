@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <p class="text-center" style="margin-top: 40px; margin-bottom: 30px;"><strong>Add</strong> shuttle trip.</p>
            <div class="panel-main">
                <form class="form-horizontal" role="form" method="get" action="/admin/slots/add">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="date_slots" class="col-md-4 control-label">Date</label>
                        <div class="col-md-6">
                            <input id="date_slots" class="form-control date hint" name="date_slots" value="" required autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="morning_schedule" class="col-md-4 control-label">Morning Schedules</label>
                        <div class="col-md-6 radio">
                            @foreach ($schedules as $schedule)
                                @if($schedule->location->trip_type == 0)
                                    <label><input type="checkbox" name="schedules[]" id="schedules" value="{{$schedule -> id}}"> {{$schedule -> location -> name}} || {{ Carbon\Carbon::parse( $schedule -> timeslot -> time_slot )->format('h:i A') }} </label><br>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="afternoon_schedule" class="col-md-4 control-label">Afternoon Schedules</label>
                        <div class="col-md-6 radio">
                            @foreach ($schedules as $schedule)
                                @if($schedule->location->trip_type == 1)
                                    <label><input type="checkbox" name="schedules[]" id="schedules" value="{{$schedule -> id}}"> {{$schedule -> location -> name}} || {{ Carbon\Carbon::parse( $schedule -> timeslot -> time_slot )->format('h:i A') }} </label><br>
                                @endif
                            @endforeach  
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="num_of_seats" class="col-md-4 control-label">Number of Seats</label>
                        <div class="col-md-6 radio">
                            <input class="form-control" type="number" name="num_of_seats" id="num_of_seats" required></input>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button onclick="goBack()" class="btn btn-primary-blue" > Cancel </button>
                            <button type="submit" class="btn btn-primary-yellow"> Submit </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script
    src="https://code.jquery.com/jquery-3.1.1.min.js"
    integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
    crossorigin="anonymous">
</script>
<script src="/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>

<script type="text/javascript">

    $('#date_slots').datepicker({
        multidate: true,
        daysOfWeekDisabled: "0,6",
        startDate:"0",
        clearBtn: "true",
        format: "yyyy-mm-dd",
    });

    $('#scheduled_dates').datepicker({

        daysOfWeekDisabled: "0,6",
        startDate:"0",
        format: "yyyy-mm-dd",
    });

    function goBack() {
        window.location.replace('/home');
    }
</script>
@endsection