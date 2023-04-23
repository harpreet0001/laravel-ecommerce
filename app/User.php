<?php

namespace App;

use App\Models\Newsletter;
use App\Models\Permission;
use App\Notifications\VerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Notifications\PasswordResetNotification;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Jenssegers\Mongodb\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    protected $connection = 'mongodb';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname','lastname','email', 'password', 'address', 'contact', 'role', 'active', 'loggedin', 'delete'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    static $roles = ['admin','subadmin','customer'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function UserPermission()
    {
        return $this->belongsTo(Permission::class, '_id', 'userid')->with('RoleName');
    }

    public function userorders(){
        return $this->hasMany('App\Models\Order','userId','_id');
    }

    public function recentlyviews(){
        return $this->hasMany('App\Models\Recentlyview','userId','_id');
    }

    public function isNewletterSubscriber(){
         
        $newsletter = Newsletter::where('email',auth()->user()->email)->first();
        if(!is_null($newsletter)){
            return true;
        }else{
            return false;
        }
    }

    public function addressbooks()
    {
        return $this->hasMany('App\Models\Addressbook','userId','id');
    }

    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmail); // my notification
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new PasswordResetNotification($token));
    }

}
