@extends('master')


@section('content')

    @include('sweet::alert')

    <div class="row">
        <div class="col-md-12"  id="info">
            <div class="current-day">
                Today is the {{ $currentDay . addSuffix($currentDay) }} day of your cycle
            </div>
            <br>
            <ul class="list-group">
                <li class="list-group-item">
                    <span class="badge">{{ $lastPeriodOn->toDateString() }}</span>
                    Last cycle started on:
                </li>
                <li class="list-group-item">
                    <span class="badge">{{ $estNext->toDateString() }}</span>
                    Estimated next cycle starts on:
                </li>
            </ul>
        </div>
    </div>

    <hr class="separator">

    <div class="row">
        <div class="col-md-12" id="forms">
            <form action="{{ route("addPeriod") }}" method="post">

                {{ csrf_field() }}
                <input type="hidden" name="date" value="{{ date('d/m/Y') }}">

                <div class="form-group">
                    <button class="btn btn-lg btn-primary center-block" type="submit">It started today</button>
                </div>
            </form>

            <div style="width: 100%; margin: 30px 0px;" class="text-center">
                <span>- OR -</span>
            </div>



            <form action="{{ route("addPeriod") }}" method="post" class="form-horizontal">
                {{ csrf_field() }}
                <div class='col-md-4'>
                    <label for="date" class="control-label pull-right">Add another date:</label>
                </div>
                <div class='col-md-4'>
                    <input id="date" type="text" name="date" class="form-control" placeholder="dd/mm/YYYY">
                </div>
                <div class='col-md-4'>
                    <button class="btn btn-primary pull-left" type="submit">Submit</button>
                </div>
            </form>

        </div>
    </div>
@endsection

@section('footer-scripts')
    <script>
        $('#date').datepicker({
            format: "dd/mm/yyyy",
            todayBtn: "linked"
        });
    </script>
@endsection