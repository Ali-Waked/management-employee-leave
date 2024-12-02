<?php

namespace App\Enum;

enum LeaveRequestStatus: string
{
        //'pending', 'approved', 'denied'
    case PENDING = 'pending';
    case ACCEPT = 'Accept';
    case DENIED = 'Denied';
}
