<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountReceivable extends Model
{
    /** @use HasFactory<\Database\Factories\AccountReceivableFactory> */
    use HasFactory;

    protected $table = 'account_receivables';

    // protected $fillable = [
    //     'customer',
    //     'invoice_no',
    //     'terms',
    //     'start_date',
    //     'due_date',
    //     'grand_total'
    // ];

    protected $guarded = [];

}
