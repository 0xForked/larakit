<?php

namespace App\Models\Gammu;

use Illuminate\Database\Eloquent\Model;

class OutboxMultipart extends Model
{

    protected $table = 'outbox_multipart';

    protected $primaryKey = 'ID';

    protected $fillable = [
        'ID',
        'SequencePosition',
        'TextDecoded',
        'UDH',
    ];

    public $incrementing = false;

    public $timestamps = false;

}
