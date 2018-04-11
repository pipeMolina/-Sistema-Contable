<?php /** * UserIdentity represents the data needed to identity a user. * It contains the authentication method that checks if the provided * data can identity the user. */
class UserIdentity extends CUserIdentity 
{

	private $_id;

	public function authenticate()
	{
		$username=strtolower($this->username);
		$user=Usuario::model()->find('LOWER(LOGIN_USUARIO)=?',array($username));
		if($user===null)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		else if(!$user->validatePassword($this->password))
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
		{
			$this->_id=$user->ID_TIPOUSUARIO;
			$this->username=$user->LOGIN_USUARIO;
			$this->errorCode=self::ERROR_NONE;
			 
			/*Consultamos los datos del usuario por el username ($user->username) */
			$info_usuario = Usuario::model()->find('LOWER(LOGIN_USUARIO)=?', array($user->LOGIN_USUARIO));
		 
		}
		return $this->errorCode==self::ERROR_NONE;
	}
	 
	public function getId()
	{
		return $this->_id;
	}
	 
}
