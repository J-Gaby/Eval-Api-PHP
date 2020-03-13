<?php
declare(strict_types=1);

use App\Application\Actions\jobdating\ListjobdatingAction;
use App\Application\Actions\jobdating\ViewjobdatingAction;
use App\Application\Actions\jobdating\UpdatejobdatingAction;
use App\Application\Actions\User\ListUsersAction;
use App\Application\Actions\User\ViewUserAction;
use App\Application\Actions\User\UpdateUserAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $app->get('/', function (Request $request, Response $response) {
        $response->getBody()->write('Hello world!');
        return $response;
    });

    $app->group('/jobdatings', function (Group $group){
        $group->get('', ListjobdatingAction::class);
        $group->post('', function(){});
        $group->get('/{id}', ViewjobdatingAction::class);
        $group->put('/{id}', UpdatejobdatingAction::class);
        $group->delete('/{id}', function(){});

        $group->post('/{id}/{ListName}', function(){});

        $group->get('/{id}/{ListName}/{Listid}', function(){});
        $group->put('/{id}/{ListName}/{Listid}', function(){});
        $group->delete('/{id}/{ListName}/{Listid}', function(){});
    });

    $app->group('/users', function (Group $group) {
        $group->get('', ListUsersAction::class);
        $group->get('/{id}', ViewUserAction::class);
        $group->put('/{id}', UpdateUserAction::class);
    });
};
