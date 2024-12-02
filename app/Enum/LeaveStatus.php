<?php

namespace App\Enum;

enum LeaveStatus: string
{
    case ACTIVE = 'active';
    case ARCIVED = 'archived';
}
