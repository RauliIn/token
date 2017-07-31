<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/28
 * Time: 11:28
 */

namespace Token;

use Illuminate\Support\ServiceProvider;
//Token服务提供者 继承基础服务提供者
class TokenServiceProvider extends ServiceProvider
{

    public function boot(){

    }
    //绑定token 对象到app('token'),控制器中直接调用 app('token')获取token对象
    public function register(){
        $this->app->bind("token",function (){
            return Token::getInstance();

        });
    }

}