<?php

namespace Modules\Hr\Models;

use Illuminate\Database\Eloquent\Model;


class Department extends Model
{
    
    protected $table = 'departments';
    protected $fillable = ['title'];
    
    
    public function employees() {
        return $this->hasMany('Modules\Employee\Models\Employee');
    }
    
    public function isDeleteable(){
        return $this->employees->count() < 1;
    }
}