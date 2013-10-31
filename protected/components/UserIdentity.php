<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity {

    private $_id;
    public $email;

    /**
     * Authenticates a user.
     * The example implementation makes sure if the username and password
     * are both 'demo'.
     * In practical applications, this should be changed to authenticate
     * against some persistent user identity storage (e.g. database).
     * @return boolean whether authentication succeeds.
     */
    public function authenticate() {
        $users = Users::model()->find('email=:email', array(':email' => $this->username));
        if (!$users)
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        else {
            if ($users->password !== md5($this->password))
                $this->errorCode = self::ERROR_PASSWORD_INVALID;
            else {
                $this->_id = $users->id;
                $this->email = $users->email;
                $this->username = $users->first_name;
                $this->errorCode = self::ERROR_NONE;
                Yii::app()->admin->setId($this->_id);

                $usersData = $users->attributes;
                Yii::app()->admin->setState('user', $usersData);
            }
        }
        return !$this->errorCode;
    }

    /**
     * @return integer the ID of the user record
     */
    public function getId() {
        return $this->_id;
    }

}