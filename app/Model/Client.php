<?php

namespace App\Model;

use App\Transformers\ClientTransformer;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table='clients';
    protected $primaryKey = 'ClientID';
    public $timestamps = false;

    protected $fillable=[
        'FirstName',
        'LastName',
        'Telephone',
        'Email',
        'Age',
        'Address',
        'IsFood',
        'Observation'
    ];
}
