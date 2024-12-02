<x-dashboard-layout title="Update Empolyee Information">
    <div class="container" style="width:70%;margin-left:auto;margin-right:auto;">
        <h1 style="padding-top:35px; margin-bottom:25px;">Show Information About "{{$employee->name}}" <a href="{{ route('employee.index') }}"
                class="btn btn-primary" style="float:right;">Back</a></h1>
        <div class="form-floating mb-3">
            <input type="text" disabled value="{{ $employee->name }}" class="form-control" id="floatingInput" name="name"
                placeholder="">
            <label for="floatingInput">Name</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" disabled value="{{ $employee->username }}" class="form-control" id="floatingInput" name="name"
                placeholder="">
            <label for="floatingInput">Username</label>
        </div>
        <div class="form-floating mb-3">
            <input type="email" disabled value="{{ $employee->email }}" class="form-control" id="floatingInput" name="email"
                placeholder="">
            <label for="floatingInput">Email</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" disabled value="{{ $employee->gender }}" class="form-control" id="floatingInput" name="gnder"
                placeholder="">
            <label for="floatingInput">Gender</label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" disabled class="form-control" value="{{ $employee->address }}" id="floatingInput"
                name="address">
            <label for="floatingInput">Address</label>
        </div>
        <div class="form-floating mb-3">
            <input type="date" disabled class="form-control" value="{{ $employee->birthday }}" id="floatingInput"
                name="birthday">
            <label for="floatingInput">Birthday</label>
        </div>
        <div class="form-floating mb-3">
            <input type="number" disabled class="form-control" value="{{ $employee->phone_number }}" id="floatingInput"
                name="phone_number">
            <label for="floatingInput">Phone Number</label>
        </div>
    </div>
</x-dashboard-layout>
