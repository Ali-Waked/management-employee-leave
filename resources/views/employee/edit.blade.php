<x-dashboard-layout title="Update Empolyee Information">
    <div class="container" style="width:70%;margin-left:auto;margin-right:auto;">
        <h1 style="padding-top:35px;">Update Employee Information <a href="{{ route('employee.index') }}"
                class="btn btn-primary" style="float:right;">Back</a></h1>
        <form action="{{ route('employee.update', $employee->id) }}" method="post" style=" padding-top: 25px;">
            @csrf
            @method('put')
            <div class="form-floating mb-3">
                <input type="text" value="{{ $employee->name }}" class="form-control" id="floatingInput"
                    name="name" placeholder="">
                <label for="floatingInput">Name</label>
                <small>{{ $errors->first('name') }}</small>
            </div>
            <div class="form-floating mb-3">
                <input type="email" value="{{ $employee->email }}" class="form-control" id="floatingInput"
                    name="email" placeholder="">
                <label for="floatingInput">Email</label>
                <small>{{ $errors->first('email') }}</small>
            </div>
            <div class="form-floating mb-3">
                <select class="form-select" name="gender" id="floatingSelect"
                    aria-label="Floating label select example">
                    <option value="male" @selected($employee->gender == 'male')>Male</option>
                    <option value="female" @selected($employee->gender == 'female')>Female</option>
                </select>
                <label for="floatingSelect">Gender</label>
                <small>{{ $errors->first('gender') }}</small>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" value="{{ $employee->address }}" id="floatingInput"
                    name="address">
                <label for="floatingInput">Address</label>
                <small>{{ $errors->first('address') }}</small>
            </div>
            <div class="form-floating mb-3">
                <input type="date" class="form-control" value="{{ $employee->birthday }}" id="floatingInput"
                    name="birthday">
                <label for="floatingInput">Birthday</label>
                <small>{{ $errors->first('birthday') }}</small>
            </div>
            <div class="form-floating mb-3">
                <input type="number" class="form-control" value="{{ $employee->phone_number }}" id="floatingInput"
                    name="phone_number">
                <label for="floatingInput">Phone Number</label>
                <small>{{ $errors->first('phone_number') }}</small>
            </div>
            <div class="form-floating mb-3">
                <input type="text" value="{{ $employee->username }}" class="form-control" id="floatingInput"
                    name="username" placeholder="" disabled>
                <label for="floatingInput">UserName</label>
                <small>{{ $errors->first('username') }}</small>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingInput" name="password" placeholder="">
                <label for="floatingInput">Change Password</label>
                <small>{{ $errors->first('name') }}</small>
            </div>
            <div class="col-12" style="margin-top:15px; margin-bottom:25px;">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</x-dashboard-layout>
