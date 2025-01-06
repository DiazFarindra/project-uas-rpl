<?php

namespace App\Enums;

enum UserType: string
{
    case TEACHER = 'teacher';
    case STUDENT = 'student';
    case ADMIN = 'admin';
}
