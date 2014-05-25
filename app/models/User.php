<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $guarded = array();
    protected $table = 'users';
    // Basic Function


//    Create User
    public static function createUser($input,$activated)
    {
        $user = Sentry::createUser(array(
            'email' => $input['email'],
            'password' => $input['password'],
            'first_name' => ucfirst($input['first_name']),
            'last_name' => ucfirst($input['last_name']),
            'activated' => $activated,
        ));
        if(isset($input['group'])) {
            foreach ($input['group'] as $group_id) {
                try {
                    $group = Sentry::FindGroupById($group_id);
                    $user->addGroup($group);
                }
                catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e)
                {
                    return Redirect::back()->withFlashMessage('Group was not found.');
                }

            }
        }else{
            try {
                $group = Sentry::FindGroupByName("Users");
                $user->addGroup($group);
            }catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e)
            {
                return Redirect::back()->withFlashMessage('Group was not found.');
            }
        }
        return $user;
    }

    //Update User
    public static function updateUser($id,$input){
        try{

            $user = Sentry::findUserById($id);
            $arr_keys = array_keys($input);
            $user->first_name = $input['first_name'];
            $user->last_name = $input['last_name'];
            $user->activated = $input['activated'];
            $user->permissions = $input['permissions'];
            $user->save();

        //Update User Info
        }catch(Cartalyst\Sentry\Users\UserNotFoundException $e){
            return Redirect::route('admin.users.index')->withFlashMessage('Không tim thầy người dùng cần Update');
        }
        //Update Group Info
        if(isset($input['group'])) {
            $group_old = $user->getGroups();
            foreach ($input['group'] as $group_id) {
                try {
                    DB::table('users_groups')->where('user_id','=',$user->id)->whereNotIn('group_id',$input['group'])->delete();
                    foreach($input['group'] as $group_id) {
                        $group = Sentry::findGroupById($group_id);
                        $user->addGroup($group);
                    }
                }
                catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e)
                {
                    return Redirect::back()->withFlashMessage('Group was not found.');
                }

            }
        }else{
            try {
                $group = Sentry::FindGroupByName("Users");
                $user->addGroup($group);
            }catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e)
            {
                return Redirect::back()->withFlashMessage('Group was not found.');
            }
        }
        return $user;
    }

    public function profile()
    {
        return $this->hasOne('Profile');
    }

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password');

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * Get the token value for the "remember me" session.
     *
     * @return string
     */
    public function getRememberToken()
    {
        return $this->remember_token;
    }

    /**
     * Set the token value for the "remember me" session.
     *
     * @param  string $value
     * @return void
     */
    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    /**
     * Get the e-mail address where password reminders are sent.
     *
     * @return string
     */
    public function getReminderEmail()
    {
        return $this->email;
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
        return;
    }
    public function setPermissionsAttribute($permissions = array()){
        $per_arr = array();
        if($permissions){
            foreach($permissions as $per){
                $per_arr[$per] = 1;
            }
            $this->attributes['permissions'] = json_encode($per_arr);
            return;
        }
        return;
    }
    //Custom function
    public function groups()
    {
        $user = Sentry::findUserById($this->id);
        return $user->getGroups();
    }

}
