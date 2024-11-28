<?php

namespace App;

use Alfa6661\AutoNumber\AutoNumberTrait;
use Illuminate\Database\Eloquent\Model;

class Keberatan extends Model
{
    use AutoNumberTrait;

    protected $table = 'keberatan';
    protected $guarded = [];

    public function getAutoNumberOptions()
    {
        return [
            'nomorRegistrasi' => [
                'format' => function () {
                    return '?/02/PLID/' . date('m') . '-' . date('Y');
                },
                'length' => 3
            ]
        ];
    }
}
