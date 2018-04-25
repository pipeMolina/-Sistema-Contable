<?php

class EWebUser extends CWebUser{

    protected $_model;

    function Administrador(){ //Administrador

        $user = $this->loadUser();

        if ($user)

           return $user->ID_TIPOUSUARIO==LevelLookUp::Administrador;

        return false;

    }
    function Contador(){ //Contador

        $user = $this->loadUser();

        if ($user)

           return $user->ID_TIPOUSUARIO==LevelLookUp::Contador;

        return false;

    }
    function Secretario(){ //Secretario

        $user = $this->loadUser();

        if ($user)

           return $user->ID_TIPOUSUARIO==LevelLookUp::Secretario;

        return false;

    }

    // Load user model.

    protected function loadUser()

    {

        $sql = "SELECT ID_TIPOUSUARIO FROM usuario Where LOGIN_USUARIO=:value";

        if ( $this->_model === null ) {

                $this->_model = Usuario::model()->find('LOGIN_USUARIO="'.Yii::app()->user->id.'"');
        }

        return $this->_model;

    }

}