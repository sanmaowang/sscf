<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	private $_id;

  public $username;

  public function __construct($username,$password)
  {
    $this->username = $username;
    $this->password = $password;
  }

  private function is_email($email) {
    return strlen($email) > 6 && preg_match("/^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/", $email);
	}

	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		if($this->is_email($this->username)){
			$record = User::model()->findByAttributes(array('email'=>$this->username));
		}else{
			$record = User::model()->findByAttributes(array('username'=>$this->username));
		}
    if ($record === null) {
      $this->errorCode=self::ERROR_USERNAME_INVALID;
    } elseif ($record->password!==$this->password) {
      $this->errorCode=self::ERROR_PASSWORD_INVALID;
    } else {
      $this->_id = $record->id;
      Yii::app()->user->setRole($record->role);
      $this->errorCode=self::ERROR_NONE;
    }
    return !$this->errorCode;
	}

	public function getId() {
    return $this->_id;
  }
}