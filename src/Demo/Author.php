<?php namespace Iginikolaev\Rapyd\Demo;

/**
 * Author
 */
class Author extends \Eloquent
{

    protected $table = 'demo_users';

    protected $appends = array('fullname');

    public function articles()
    {
        return $this->hasMany('Iginikolaev\Rapyd\Models\Article');
    }

    public function comments()
    {
        return $this->hasMany('Iginikolaev\Rapyd\Models\Comment');
    }

    public function getFullnameAttribute($value)
    {
        return $this->firstname ." ". $this->lastname;
    }

}
