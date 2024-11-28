<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;

class PermohonanInformasi extends Model
{
    use AutoNumberTrait;

    protected $table = 'permohonaninformasisss';
    protected $guarded = [];

    public function getAutoNumberOptions()
    {
        return [
            'noPendaftaran' => [
                'format' => function () {
                    return '?/01/PLID/' . date('m') . '-' . date('Y');
                },
                'length' => 3
            ]
        ];
    }
}
