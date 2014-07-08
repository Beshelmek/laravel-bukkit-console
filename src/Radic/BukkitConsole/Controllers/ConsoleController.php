<?php namespace Radic\BukkitConsole\Controllers;

use Illuminate\Routing\Controller;
use Radic\BukkitSwiftApi\SwiftApi;
use View;
use Input;
use Response;
use Config;

class ConsoleController extends Controller
{

    protected $swiftApi;

    public function __construct(SwiftApi $swiftApi)
    {
        $this->swiftApi = $swiftApi;
    }

    public function index()
    {
        return View::make('radic/bukkit-console::console');
    }

    public function cmd()
    {
        $command = Input::get('command');

        $beforeTime = $this->getTime();


        $api = $this->swiftApi->connect();
        $api->runConsoleCommand($command);
        $messages = $api->getConsoleMessages($beforeTime);
        $api->disconnect();

        $response = [];
        foreach($messages as $msg)
        {
            $response[] = [
                'timestamp' => $msg->timestamp,
                'message' => $msg->message,
                'level' => $msg->level
            ];
        }

        $success = true;
        if($messages[count($messages) - 1]->message == 'Unknown command. Type "help" for help.')
        {
            $success = false;
        }

        return Response::json([
            'success' => $success,
            'messages' => $response
        ], 200);
    }

    protected function getTime()
    {
        return floatval(substr(str_replace('.', '', microtime(true)), 0, 13));
    }
}