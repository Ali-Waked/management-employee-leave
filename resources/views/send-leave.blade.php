<x-dashboard-layout title="Create Leave">
    <div class="container" style="width:70%;margin-left:auto;margin-right:auto;">
        <h1 style="padding-top:35px;">Send New Leave Request <a href="{{ route('employee.dashbaord.index') }}"
                class="btn btn-primary" style="float:right;">Back</a></h1>
        <form action="{{ route('employee.dashbaord.store') }}" method="post" style=" padding-top: 25px;">
            @csrf
            <div class="form-floating mb-3">
                <select class="form-select" name="leave_type" id="floatingSelect"
                    aria-label="Floating label select example">
                    @foreach ($leaves as $leave)
                        <option value="{{ $leave->id }}">{{ $leave->name }}</option>
                    @endforeach
                </select>
                <label for="floatingSelect">Select Leave Type</label>
                <small>{{ $errors->first('leave_type') }}</small>
            </div>
            <div class="form-floating mb-3">
                <input type="date" class="form-control" id="floatingInput" name="start_date" placeholder="">
                <label for="floatingInput">Start Date</label>
                <small>{{ $errors->first('start_date') }}</small>
            </div>
            <div class="form-floating mb-3">
                <input type="number" class="form-control" id="floatingInput" name="number_of_days">
                <label for="floatingInput">Number Of Days</label>
                <small>{{ $errors->first('number_of_days') }}</small>
            </div>
            <div class="col-12" style="margin-top:15px; margin-bottom:25px;">
                <button type="submit" class="btn btn-primary">Send Request</button>
            </div>
        </form>
    </div>
</x-dashboard-layout>
