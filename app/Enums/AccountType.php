<?php

namespace App\Enums;

enum AccountType: string
{
    case Bank = 'bank';
    case Cash = 'cash';
    case CreditCard = 'credit_card';
    case Savings = 'savings';
    case Investment = 'investment';

    public function label(): string
    {
        return match ($this) {
            self::Bank => 'Bank Account',
            self::Cash => 'Cash in Hand',
            self::CreditCard => 'Credit Card',
            self::Savings => 'Savings Account',
            self::Investment => 'Investment',
        };
    }
}
