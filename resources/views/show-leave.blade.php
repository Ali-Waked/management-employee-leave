<x-dashboard-layout title="Create Leave">
    <div class="container" style="width:70%;margin-left:auto;margin-right:auto;">
        <h1 style="padding-top:35px;">Show Leave Request <a href="{{ route('employee.dashbaord.index') }}"
                class="btn btn-primary" style="float:right;">Back</a></h1>
        <form action="{{ route('employee.dashbaord.store') }}" method="post" style=" padding-top: 25px;">

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" value="{{$leave->name}}">
                <label for="floatingInput">Leave Type</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" value="{{$leave->pivot->status}}">
                <label for="floatingInput">Leave Status</label>
            </div>
            <div class="form-floating mb-3">
                <input type="date" class="form-control" id="floatingInput" value="{{$leave->pivot->start_date}}">
                <label for="floatingInput">Start Date</label>
            </div>
            <div class="form-floating mb-3">
                <input type="number" class="form-control" id="floatingInput" value="{{$leave->pivot->duration_days}}">
                <label for="floatingInput">Number Of Days</label>
            </div>

        </form>
    </div>
</x-dashboard-layout>
