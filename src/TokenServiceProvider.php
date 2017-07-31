<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/28
 * Time: 11:28
 */
namespace Token;

use Illuminate\Support\ServiceProvider;

class TokenServiceProvider extends ServiceProvider
{

    public function boot(){

    }

    public function register(){
        $this->app->bind("token",function (){
            return Token::getInstance();

        });
    }

}