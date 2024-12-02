<x-dashboard-layout title="Create Leave">
    <div class="container" style="width:70%;margin-left:auto;margin-right:auto;">
        <h1 style="padding-top:35px;">Update {{ $leave->name }} Leave<a href="{{ route('leave.index') }}"
                class="btn btn-primary" style="float:right;">Back</a></h1>
        <form action="{{ route('leave.update', $leave->id) }}" method="post" style=" padding-top: 25px;">
            @csrf
            @method('put')
            <div class="form-floating mb-3">
                <input type="text" class="form-control" value="{{ $leave->name }}" id="floatingInput" name="name"
                    placeholder="">
                <label for="floatingInput">Name</label>
                <small>{{ $errors->first('name') }}</small>
            </div>
            <div class="form-floating">
                <select class="form-select" name="status" id="floatingSelect"
                    aria-label="Floating label select example">
                    @foreach (App\Enum\LeaveStatus::cases() as $status)
                        <option value="{{ $status }}" @selected($status == $leave->status)>{{ $status }}</option>
                    @endforeach
                </select>
                <label for="floatingSelect">Select Status</label>
                <small>{{ $errors->first('status') }}</small>
            </div>
            <div class="col-12" style="margin-top:15px;">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</x-dashboard-layout>
