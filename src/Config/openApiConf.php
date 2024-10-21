<?php

namespace Swagger\Config;

class openApiConf
{
    public static function config(): array
    {
        $appPath = [];
        
        array_push($appPath, APPPATH . 'Controllers');
        
        if (is_dir(APPPATH . 'Models')) {
            array_push($appPath, APPPATH . 'Models');
        }

        if (is_dir(APPPATH . 'Entities')) {
            array_push($appPath, APPPATH . 'Entities');
        }

        array_push($appPath, APPPATH . 'ThirdParty/Swagger/src/Controllers');

        return [
            'openapi' => '3.0.0',
            'info' => [
                'title' => 'Open Api CodeIgniter',
                'description' => 'Your API Description',
                'version' => '1.0.0',
            ],
            'servers' => [
                'url' => 'https://api.example.com/v1'
            ],
            'paths' => $appPath,
        ];
    }
}
