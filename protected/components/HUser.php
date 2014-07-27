<?php

/**
 * HUser class file. 
 * HPO User
 */

class HUser extends CWebUser
{
  private $email;

	private $role_labels = array(
    0 => 'Member',
    1 => 'Admin',
    2 => 'Super Admin',
  );

  public function getProfile()
  {
   $user_id = Yii::app()->user->id;
   $user_model = User::model()->findByPk($user_id);
   return $user_model;
  }

  public function getEmail() {
    return $this->getState('email');
  }

  public function setEmail($email) {
    $this->setState('email', $email);
  }

  public $loginUrl = array('site/index');

  public function getRole()
  {
    return $this->getState('role');
  }

  /**
   * @param integer $value the role code.
   */
  public function setRole($value)
  {
    $this->setState('role', $value);
  }

  public function isAdmin()
  {
    return $this->getRole() >= 1;
  }
  /**
   * Returns a value indicating the role label of the user.
   * @return string the role label.
   */
  public function getRoleLabel()
  {
    return $this->role_labels[$this->getState('role')];
  }
}