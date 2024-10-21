<?php

namespace Swagger\Commands;

use CodeIgniter\CLI\BaseCommand;
use OpenApi\Generator;
use Swagger\Config\openApiConf;

class SwaggerCommand extends BaseCommand
{
    /**
     * The Command's Group
     *
     * @var string
     */
    protected $group = 'App';

    /**
     * The Command's Name
     *
     * @var string
     */
    protected $name = 'swagger:generate';

    /**
     * The Command's Description
     *
     * @var string
     */
    protected $description = 'Generate Swagger documentatio';

    /**
     * The Command's Usage
     *
     * @var string
     */
    protected $usage = 'swagger:generate [arguments] [options]';

    /**
     * The Command's Arguments
     *
     * @var array
     */
    protected $arguments = [];

    /**
     * The Command's Options
     *
     * @var array
     */
    protected $options = [];

    /**
     * Actually execute a command.
     *
     * @param array $params
     */
    public function run(array $params)
    {
        $config = openApiConf::config();

        $swagger = Generator::scan($config['paths'], $config['options'] ?? []);

        file_put_contents(WRITEPATH . 'swagger.json', json_encode($swagger, JSON_PRETTY_PRINT));
    }
}
