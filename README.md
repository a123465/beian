<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. You can also check out [Laravel Learn](https://laravel.com/learn), where you will be guided through building a modern Laravel application.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## 邮件集成（Mailgun / SMTP）



```
MAIL_MAILER=smtp
MAIL_HOST=smtp.example.com
MAIL_PORT=587
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=hello@example.com
MAIL_FROM_NAME="Your Company"
```


```
MAIL_MAILER=mailgun
MAILGUN_DOMAIN=mg.example.com
MAILGUN_SECRET=key-xxxxxxxxxxxxxxxxxxxx
MAILGUN_ENDPOINT=api.mailgun.net   # 可按需设置 region endpoint
MAIL_FROM_ADDRESS=hello@example.com
MAIL_FROM_NAME="Your Company"
```

 - 我已实现并注册 `mail:test` Artisan 命令（`php artisan mail:test`），用于按序测试 `mailgun,smtp,failover,log`。参见下面使用示例。
	- 我已实现并注册 `mail:test` Artisan 命令（`php artisan mail:test`），用于按序测试 `mailgun,smtp,failover,log`。参见下面使用示例。

使用示例：

```powershell
# 发送测试到默认收件人（portal.contact.email_support 或 mail.from.address）
php artisan mail:test

# 指定收件人
php artisan mail:test --to=dev@example.test

# 指定只测试特定 mailers（逗号分隔），例如只测试 mailgun 和 smtp
php artisan mail:test --mailers=mailgun,smtp
```
	- 在 `config/services.php` 新增了 `mailgun` 配置读取（`MAILGUN_DOMAIN` / `MAILGUN_SECRET` / `MAILGUN_ENDPOINT`）。
	- 在 `config/mail.php` 中添加了 `mailgun` mailer 节点，保留其它 mailer 配置（`smtp`, `log`, `sendmail` 等）。


	- 本地开发推荐先使用 `MAIL_MAILER=log` 或 `array` 来避免实际发送。使用 `MAIL_MAILER=smtp` 时，可配合 MailHog、Mailtrap 等测试工具（将 `MAIL_HOST` 指向测试工具），示例如使用 MailHog：

```powershell
# 在 Windows 上启动 MailHog（如果已安装）并运行你的应用，或使用 Docker:
docker run -p 1025:1025 -p 8025:8025 mailhog/mailhog

# 然后在 .env 设置：
MAIL_MAILER=smtp
MAIL_HOST=127.0.0.1
MAIL_PORT=1025
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_ENCRYPTION=
```


### 回退（Failover）策略


```
MAIL_MAILER=failover
```



```php
Mail::mailer('failover')->to('ops@example.com')->send(new \App\Mail\ContactMessage($data));
```


如需我把 `.env.example` 中加入示例变量或添加一个小脚本测试邮件发送，我可以继续更新。请告诉我你偏好 Mailgun 还是 SMTP（或同时支持两者）。
