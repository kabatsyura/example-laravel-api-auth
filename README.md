<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Example API authentication for user

A simple application which is demonstrate:

-   migration for User
-   factory for User
-   seeder for User
-   api routes
-   UserController
-   UserResource
-   enums types
-   test for User

If you want to test application, please do next operations in the terminal:

```
  make prepare-test
  make test
```

By the text bellow, you will find tests from postman:

-   Registration:
    ![registration-ok](readme/api-registration-postman.png)

-   Registration validation error:
    ![registration-error](readme/api-registration-errorValidation-postman.png)

-   Show profile:
    ![profile-ok](readme/api-profile-postman.png)

    ![profile-error](readme/api-profile-error-postman.png)

-   Log in:
    ![login-ok](readme/api-login-postman.png)

    ![login-error](readme/api-login-error-postman.png)

-   Log out:
    ![login-ok](readme/api-logout-postman.png)
