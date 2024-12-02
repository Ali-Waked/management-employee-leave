<x-dashboard-layout title='dashboard'>
    <style>
        table {
            width: 100%;
        }

        table tr th,
        table tr td {
            background: transparent;
        }
    </style>
    <div>{{ session()->get('success') }}</div>
    <div class="container ml-4" style="width: 97%;">
        <div>{{ Session::get('success') }}</div>
        <h1 style="margin-bottom: 35px;padding-top:15px;">Employee <a href="{{ route('employee.create') }}"
                class="btn btn-primary" style="float:right;">Add
                New
                Employee</a></h1>
        @if (count($employees))
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" style="background: transparent; color:#fff;">#</th>
                        <th scope="col" style="background: transparent; color:#fff;">Name</th>
                        <th scope="col" style="background: transparent; color:#fff;">Email</th>
                        <th scope="col" style="background: transparent; color:#fff;">Added At</th>
                        <th scope="col" style="background: transparent; color:#fff;">Action</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($employees as $key => $value)
                        <tr>
                            <th style="background: transparent; color:#fff;" scope="row">{{ $key + 1 }}</th>
                            <td style="background: transparent; color:#fff;">{{ $value->name }}</td>
                            <td style="background: transparent; color:#fff;">{{ $value->email }}</td>
                            <td style="background: transparent; color:#fff;">{{ $value->created_at->diffForHumans() }}
                            </td>
                            <td style="background: transparent; color:#fff;">
                                <a href="{{ route('employee.show', $value->id) }}" class="mr-2">Show</a>
                                <a href="{{ route('employee.edit', $value->id) }}">Edit</a>
                                <form action="{{ route('employee.destroy', $value->id) }}" method="post"
                                    style="display: inline">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" value="Delete"
                                        style="color:#007bff;background:transparent;border:none;" />
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p style="font-size: 95px; margin-top:120px; text-align:center;">No Employee</p>
        @endif
    </div>
</x-dashboard-layout>
