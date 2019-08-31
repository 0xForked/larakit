<?php

namespace App\Models\Gammu;

use Illuminate\Database\Eloquent\Model;

class Outbox extends Model
{

    protected $table = 'outbox';

    protected $primaryKey = 'ID';

    protected $fillable = [
        'SenderID',
        'CreatorID',
        'DestinationNumber',
        'TextDecoded',
        'MultiPart',
        'UDH',
        'Retries',
        'Class'
    ];

    protected $dates = [
        'SendingDateTime',
        'SendingTimeOut',
    ];

    public $timestamps = true;

    const CREATED_AT = 'InsertIntoDB';

    const UPDATED_AT = 'UpdatedInDB';

}
