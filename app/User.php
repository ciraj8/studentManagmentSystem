<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username','first_name', 'last_name', 'role', 'email',
        'password','phone','address','gender','dob','join_date','job_type','city','salary','age','course_name','campus_name',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
//    For counting the leave
    

    public function get_UserNumber(){

        $this->db->select("count(*) as no");
        $query = $this->db->get("users");
        return $query->result();

    }

    public function documents(){
        return $this->hasMany('App\Document');
    }
    public function messages(){
        return $this->hasMany('App\Message');
    }
}
