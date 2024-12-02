<x-dashboard-layout title="Create Leave">
    <div class="container" style="width:70%;margin-left:auto;margin-right:auto;">
        <h1 style="padding-top:35px;">Add New Employee <a href="{{ route('employee.index') }}" class="btn btn-primary"
                style="float:right;">Back</a></h1>
        <form action="{{ route('employee.store') }}" method="post" style=" padding-top: 25px;">
            @csrf
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="name" placeholder="">
                <label for="floatingInput">Name</label>
                <small>{{ $errors->first('name') }}</small>
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput" name="email" placeholder="">
                <label for="floatingInput">Email</label>
                <small>{{ $errors->first('email') }}</small>
            </div>
            <div class="form-floating mb-3">
                <select class="form-select" name="gender" id="floatingSelect"
                    aria-label="Floating label select example">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
                <label for="floatingSelect">Gender</label>
                <small>{{ $errors->first('gender') }}</small>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="address">
                <label for="floatingInput">Address</label>
                <small>{{ $errors->first('address') }}</small>
            </div>
            <div class="form-floating mb-3">
                <input type="date" class="form-control" id="floatingInput" name="birthday">
                <label for="floatingInput">Birthday</label>
                <small>{{ $errors->first('birthday') }}</small>
            </div>
            <div class="form-floating mb-3">
                <input type="number" class="form-control" id="floatingInput" name="phone_number">
                <label for="floatingInput">Phone Number</label>
                <small>{{ $errors->first('phone_number') }}</small>
            </div>
            <div class="col-12" style="margin-top:15px; margin-bottom:25px;">
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </form>
    </div>
</x-dashboard-layout>
