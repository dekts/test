<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'url',
        'parent_id'
    ];

    /**
     * Fetch the parent menus
     */
    public function parent()
    {
        return $this->belongsTo(self::class , 'parent_id');
    }

    /**
     * Fetch the child menus
     */
    public function children()
    {
        return $this->hasMany(self::class, 'parent_id')->with('children');
    }
}
