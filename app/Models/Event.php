<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'events';

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
    protected $fillable = ['user_id', 'room_id', 'speaker_id', 'title', 'description', 'topics', 'start_date', 'finish_date', 'image'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function speaker()
    {
        return $this->belongsTo(Speaker::class);
    }

    public function participant()
    {
        return $this->hasMany(Participant::class);
    }

}
