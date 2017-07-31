<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/28
 * Time: 14:19
 */
namespace Token;

class Token
{
    private $_randomStr;
    private $_expire;
    private $_encrypt;
    private $_token;
    private static $_instance = null;

    private function __construct()
    {
        $this->_randomStr=time().rand(1,10000).chr(mt_rand(33, 126));
        $this->_encrypt=env('TOKEN_ENCRYPT','sha256');
        $this->_expire=env('TOKEN_EXPIRE',7200);
        self::setToken();
    }
    private function __clone() {

    }


    static public function getInstance() {
        if (is_null ( self::$_instance ) || !isset ( self::$_instance )) {

            self::$_instance = new self ();

        }

        return self::$_instance;
    }
    /**
     * @param mixed $token
     */
    private function setToken()
    {
        $this->_token['_token'] = hash($this->_encrypt,$this->_randomStr);
        $this->_token['_expire']=$this->_expire;
    }

    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->_token;
    }






}