<?php
namespace App\Enums;
enum Status: string
{
    case ACTIVE = 'Available';
    case INACTIVE = 'Unavailable';
}