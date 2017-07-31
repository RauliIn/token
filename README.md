# token
simple api token
适用于lumen的简单token服务提供
安装方式：
composer raulin/token:master-dev
使用方式：
lumen直接在 bootstrap/app.php中加添加  $app->register(Token\TokenServiceProvider::class);
使用：
在.env 中配置
TOKEN_EXPIRE=86400 配置过期时间
TOKEN_ENCRYPT=sha256 配置加密方式

app('token')获取token对象
app('token')->getToken()获取token

