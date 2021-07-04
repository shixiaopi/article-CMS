# 皮皮虾文章cms

<p>
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## 安装
- 生成密钥
```shell
php artisan key:generate
```

- 迁移文件
```shell
php artisan migrate
```
- 填充默认后台账户
```shell
php artisan db:seed --class=AdminSeeder
```
> 默认账户：admin 密码：admin
