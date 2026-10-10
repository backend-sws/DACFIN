<?php

namespace App\Enums;

enum DebtStatus: string
{
    case Pending = 'pending';
    case Partial = 'partial';
    case Settled = 'settled';

    public function label(): string
    {
        return match ($this) {
            self::Pending => 'Pending',
            self::Partial => 'Partially Paid',
            self::Settled => 'Settled',
        };
    }
}
