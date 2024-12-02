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
    <div class="container ml-4" style="width: 97%;">
        <h1 style="margin-bottom: 35px;padding-top:15px;">Request Leave</h1>
        @if (count($leave))
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" style="background: transparent; color:#fff;">#</th>
                        <th scope="col" style="background: transparent; color:#fff;">Type</th>
                        <th scope="col" style="background: transparent; color:#fff;">Status</th>
                        <th scope="col" style="background: transparent; color:#fff;">Send At</th>
                        <th scope="col" style="background: transparent; color:#fff;">Start Date</th>
                        <th scope="col" style="background: transparent; color:#fff;">Number Of Days</th>
                        <th scope="col" style="background: transparent; color:#fff;">Action</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($leave as $key => $value)
                        <tr>
                            <th style="background: transparent; color:#fff;" scope="row">{{ $key + 1 }}</th>
                            <td style="background: transparent; color:#fff;">{{ $value->leave->name }}</td>
                            <td style="background: transparent; color:#fff;">{{ $value->status }}</td>
                            <td style="background: transparent; color:#fff;">
                                {{-- @dd($value->start_date) --}}
                                {{ $value->send_at->diffForHumans() }}
                            </td>
                            <td style="background: transparent; color:#fff;">{{ $value->start_date->format('Y-m-d') }}
                            </td>
                            <td style="background: transparent; color:#fff;">{{ $value->duration_days }}</td>
                            <td style="background: transparent; color:#fff;">
                                <form action="{{ route('request.leave.update', $value->id) }}" method="post"
                                    style="display: inline">
                                    @csrf
                                    @method('put')
                                    <input type="submit"
                                        value="{{ Str::ucfirst(\App\Enum\LeaveRequestStatus::ACCEPT->value) }}"
                                        name="leave_request_type"
                                        style="color:#007bff;background:transparent;border:none;" />
                                </form>
                                <form action="{{ route('request.leave.update', $value->id) }}" method="post"
                                    style="display: inline">
                                    @csrf
                                    @method('put')
                                    <input type="submit"
                                        value="{{ Str::ucfirst(\App\Enum\LeaveRequestStatus::DENIED->value) }}"
                                        name="leave_request_type"
                                        style="color:#007bff;background:transparent;border:none;" />
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p style="font-size: 95px; margin-top:120px; text-align:center;">No Leave</p>
        @endif
    </div>
</x-dashboard-layout>
