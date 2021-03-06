<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    /**
     * Eloquent relationship to User.php
     * @return \Http\Models\Ticket
     */
    public function user() {
        return $this->belongsTo(User::class);
    }

    /**
     * For safety, by default none of the attributes may be mass assignable, with the exception of these attributes.
     *
     * @var array
     */
    protected $fillable = [
        'task', 'tasklong', 'archived', 'creationdate', 'author', 'room', 'duedate'
    ];

    /**
     * Some manual specifications for Eloquent. They mostly match what would be set by the mapper by default
     * but have been hardcoded for clarity and safety.
     */

    /**
     * Database connection type
     * 
     * @var string
     */
    protected $connection = 'mysql';

    /**
     * Database table for the model
     * 
     * @var string
     */
    protected $table = 'tickets';

    /**
     * Database primary key
     * 
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The primary key shall not be an incrementing integer (@see $fillable 'number'), ...
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * ... but rather a hash (which in turn is generated out of the creation date, current time, author and a random integer).
     * 
     * @var string
     */
    protected $keyType = 'string';
}
