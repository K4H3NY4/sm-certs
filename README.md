<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Source Code

The system automatically generates a certificate number and receipt number upon completion of the process. A confirmation email is then sent to the user, containing the certificate number, receipt number, and a disclaimer regarding the ability to change travel dates. Subsequently, the travel certificate itself is emailed to the user for their records and use.




## API Routes

#### REGISTER USER
POST: /api/register<br>
SECURITY: NONE<br>
FIELDS: <br>
name:JK Kahenya<br>
email:test@gmail.com<br>
role:customer<br>
phone_number:+1254700419377<br>
password:test<br>
password_confirmation:test<br>


#### LOGIN
POST: /api/login<br>
SECURITY: NONE<br>
FIELDS:<br>
email:test@gmail.com<br>
password:test1234<br>


#### GENERATE CERT 
POST: /api/certificates/<br>
SECURITY: Protection {Bearer Token}<br>
name, email, order_id, stripe_code .<br>

#### CHECK CERT IF IS VALID
GET: /api/certificates/{uuid}<br>
SECURITY: Protected {Bearer Token}<br>
FIELDS:<br>
status:redeemed<br>
