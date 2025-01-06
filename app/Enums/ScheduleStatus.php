<?php

namespace App\Enums;

enum ScheduleStatus: string
{
    const PENDING = 'pending';
    const OVERDUE = 'overdue';
    const COMPLETED = 'completed';
}
