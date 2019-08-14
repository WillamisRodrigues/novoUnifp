<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Ajuda
 * @package App\Models
 * @version July 31, 2019, 6:38 pm UTC
 *
 * @property string Pagina
 * @property string Ticket
 */
class Ajuda extends Model
{
    use SoftDeletes;

    public $table = 'ajuda';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'Pagina',
        'Ticket'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'Pagina' => 'string',
        'Ticket' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'Pagina' => 'required',
        'Ticket' => 'required'
    ];

    
}
