<?php

namespace App\Enums;

enum DebtType: string
{
    case Lent = 'lent';
    case Borrowed = 'borrowed';

    public function label(): string
    {
        return match ($this) {
            self::Lent => 'Money Lent (Receivable)',
            self::Borrowed => 'Money Borrowed (Payable)',
        };
    }
}
