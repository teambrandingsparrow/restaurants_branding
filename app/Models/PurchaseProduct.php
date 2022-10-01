<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseProduct extends Model
{
    use HasFactory;
    protected $fillable = [
       
        'productName',
        'saleid',
        'quantities',
        'create_by'

      ];
}
