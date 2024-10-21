# CodeIgniter Swagger Generator Plugin

## Description

This third-party plugin for CodeIgniter 4 allows automatic generation of Swagger documentation for your API. Swagger is a powerful tool for documenting and testing REST APIs, making collaboration between developers and other stakeholders more efficient.

## Installation

1. **Clone the repository or download the plugin files**:

   Clone this repository or download it into the `app/ThirdParty` directory of your CodeIgniter project.

   ```bash
   git clone git@github.com:arbims/Swagger-ci.git app/ThirdParty/Swagger

2. **Open the app/Config/Autoload.php file and add the plugin path in the $psr4 section.**

```php

public $psr4 = [
    APP_NAMESPACE => APPPATH, 
    'Config'      => APPPATH . 'Config',
    'SwaggerGenerator' => APPPATH . 'ThirdParty/SwaggerGenerator',
];
```

3. **install zircote**

```php
composer require zircote/swagger-php
```
4. **Generate Assets**


```php
php spark swagger:assets

```

4. **Generate Swagger Doc**


```php
php spark swagger:generate

```

# now to run App

```php
php spark serve

```
5. **check your local server**

**http://localhost:8080/api/doc**


