<?php

class UserIdentity extends CUserIdentity {


    private $_id;

    public function authenticate() {

        $record = Users::model()->findByAttributes(array('nickname' => $this->username));  
        if ($record === null) {
            $this->_id = 'user Null';
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        } else if ($record->password !== $this->password) {           
            $this->_id = $this->username;
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        } else {
            $this->_id = $record['nickname'];
            $this->setState('title', $record['nickname']);
            $this->errorCode = self::ERROR_NONE;
        }
        return !$this->errorCode;

    }

    public function getId() {       //  override Id
        return $this->_id;
    }

}
