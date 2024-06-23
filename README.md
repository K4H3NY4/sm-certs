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
POST: /api/register
SECURITY: NONE
FIELDS: 
name:JK Kahenya
email:test@gmail.com
role:customer
phone_number:+1254700419377
password:test
password_confirmation:test


#### LOGIN
POST: /api/login
SECURITY: NONE
FIELDS:
email:test@gmail.com
password:test1234


#### GENERATE CERT 
POST: /api/certificates/
SECURITY: Protection {Bearer Token}
name,email,order_id,stripe_code .

#### CHECK CERT IF IS VALID
GET: /api/certificates/{uuid}
SECURITY: Protected {Bearer Token}
FIELDS:
status:redeemed
