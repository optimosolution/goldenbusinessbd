<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class LoginFormAdmin extends CFormModel {

    public $username;
    public $password;
    public $rememberMe;
    private $_identity;

    /**
     * Declares the validation rules.
     * The rules state that username and password are required,
     * and password needs to be authenticated.
     */
    public function rules() {
        return array(
            // username and password are required
            array('username, password', 'required'),
            // rememberMe needs to be a boolean
            array('rememberMe', 'boolean'),
            // password needs to be authenticated
            array('password', 'authenticate'),
        );
    }

    /**
     * Declares attribute labels.
     */
    public function attributeLabels() {
        return array(
            'rememberMe' => 'Remember me next time',
        );
    }

    /**
     * Authenticates the password.
     * This is the 'authenticate' validator as declared in rules().
     */
    public function authenticate($attribute, $params) {
        if (!$this->hasErrors()) {  // we only want to authenticate when no input errors
            $identity = new AdminIdentity($this->username, $this->password);
            $identity->authenticate();
            switch ($identity->errorCode) {
                case UserIdentity::ERROR_NONE:
                    $duration = $this->rememberMe ? 3600 * 24 * 30 : 0; // 30 days
                    Yii::app()->user->login($identity, $duration);
                    break;
                case UserIdentity::ERROR_EMAIL_INVALID:
                    $this->addError("username", "Inputs are not matching with database info. Please re-type the info.");
                    break;
                case UserIdentity::ERROR_USERNAME_INVALID:
                    $this->addError("username", "Inputs are not matching with database info. Please re-type the info.");
                    break;
                case UserIdentity::ERROR_PASSWORD_INVALID:
                    $this->addError("username", "Inputs are not matching with database info. Please re-type the info.");
                    break;
                case UserIdentity::ERROR_STATUS_NOTACTIV:
                    $this->addError("status", "You account is not activated.");
                    break;
                case UserIdentity::ERROR_STATUS_BAN:
                    $this->addError("status", "You account is blocked.");
                    break;
                case UserIdentity::ERROR_STATUS_EXPIRE:
                    $this->addError("status", "You account is expired.");
                    break;
                case UserIdentity::ERROR_PASSWORD_INVALID:
                    $this->addError("password", "Inputs are not matching with database info. Please re-type the info.");
                    break;
            }
        }
    }

    /**
     * Logs in the user using the given username and password in the model.
     * @return boolean whether login is successful
     */
    public function login() {
        if ($this->_identity === null) {
            $this->_identity = new AdminIdentity($this->username, $this->password);
            $this->_identity->authenticate();
        }
        if ($this->_identity->errorCode === AdminIdentity::ERROR_NONE) {
            $duration = $this->rememberMe ? 3600 * 24 * 30 : 0; // 30 days
            Yii::app()->user->login($this->_identity, $duration);
            return true;
        }
        else
            return false;
    }

}
