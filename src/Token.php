<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/28
 * Time: 14:19
 */

namespace Token;
//token类
class Token
{
    // 随机字符串
    private $_randomStr;
    //有效期
    private $_expire;
    //加密方式
    private $_encrypt;
    //结果token
    private $_token;
    //Token对象
    private static $_instance = null;

    private function __construct()
    {
        $this->_randomStr=time().rand(1,10000).chr(mt_rand(33, 126));
        //env 读取的根目录 .env里的参数
        $this->_encrypt=env('TOKEN_ENCRYPT','sha256');
        $this->_expire=env('TOKEN_EXPIRE',7200);
        self::setToken();
    }
    private function __clone() {

    }

    /**得到Token 的单例对象
     * @return null|Token Token 对象
     */
    static public function getInstance() {
        if (is_null ( self::$_instance ) || !isset ( self::$_instance )) {

            self::$_instance = new self ();

        }

        return self::$_instance;
    }
    /**
     * 设置token
     * @param mixed $token
     */
    private function setToken()
    {
        $this->_token['_token'] = hash($this->_encrypt,$this->_randomStr);
        $this->_token['_expire']=$this->_expire;
    }

    /**
     * 得到token
     * @return mixed
     */
    public function getToken()
    {
        return $this->_token;
    }






}