<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Speaker extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'speakers';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'name', 'telefone', 'email', 'description', 'skills', 'image'];

    public function event()
    {
        return $this->hasMany(Event::class);
    }

}
