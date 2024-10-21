<?php

namespace Swagger\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use OpenApi\Annotations\Server;
use OpenApi\Attributes as OA;

#[OA\Info(title: "Codeigniter Api", version: "1.0", description: "Example swagger openApi")]
#[OA\Server(url: "http://localhost:8080")]
#[OA\SecurityScheme(
    securityScheme: 'bearerAuth',
    type: 'http',
    scheme: 'bearer',
    bearerFormat: 'JWT',
    name: 'bearerAuth',
    in: 'header'
)]
class SwaggerDocController extends BaseController {

    use ResponseTrait;
    
    protected $view;

    public function __construct()
    {
        $this->view = \Config\Services::renderer(APPPATH . 'ThirdParty/Swagger/src/Views');
    }
    
    public function index()
    {
        // Render the view from the new path
        return $this->view->render('swagger/index');
    }

    public function swagger()
    {
        $swaggerFile = WRITEPATH . 'swagger.json';

        if (file_exists($swaggerFile)) {
            $swaggerContent = file_get_contents($swaggerFile);
            return $this->respond(json_decode($swaggerContent));
        }
    
        return $this->fail('Swagger file not found.');
    }

    #[OA\Get(
        path: '/api/demo',
        responses: [
            new OA\Response(
            response: 200,
            description: "List demo",
        ),
        new OA\Response(response: 401, description: 'Not allowed'),
    ],
    security: [['bearerAuth' => []]],
    )]
    public function demo()
    {
        $data = [
            'message' => 'welcome to codeigniter swagger api'
        ];
        return $this->respond($data, 200);
    }
}