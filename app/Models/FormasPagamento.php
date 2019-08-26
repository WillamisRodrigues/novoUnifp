<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class FormasPagamento
 * @package App\Models
 * @version August 1, 2019, 2:57 pm UTC
 *
 * @property integer QtdeParcelas
 * @property float BrutoTotal
 * @property float ParcelaBruta
 * @property float DescontoPontualidade
 * @property float ParcelaDescontoPontualidade
 * @property float ValorTotalDesconto
 */
class FormasPagamento extends Model
{
    use SoftDeletes;

    public $table = 'formas_pagamento';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'QtdeParcelas',
        'idCurso',
        'BrutoTotal',
        'ParcelaBruta',
        'DescontoPontualidade',
        'ParcelaDescontoPontualidade',
        'ValorTotalDesconto'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'idCurso' => 'integer',
        'QtdeParcelas' => 'integer',
        'BrutoTotal' => 'float',
        'ParcelaBruta' => 'float',
        'DescontoPontualidade' => 'float',
        'ParcelaDescontoPontualidade' => 'float',
        'ValorTotalDesconto' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'QtdeParcelas' => 'required',
        'idCurso' => 'required',
        'BrutoTotal' => 'required',
        'ParcelaBruta' => 'required',
        'DescontoPontualidade' => 'required',
        'ParcelaDescontoPontualidade' => 'required',
        'ValorTotalDesconto' => 'required'
    ];


}
