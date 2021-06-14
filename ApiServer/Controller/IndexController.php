<?php
namespace ImiApp\ApiServer\Controller;

use Imi\Controller\HttpController;
use Imi\Redis\RedisManager;
use Imi\Server\View\Annotation\View;
use Imi\Server\Route\Annotation\Route;
use Imi\Server\Route\Annotation\Action;
use Imi\Server\Route\Annotation\Controller;

/**
 * @Controller("/")
 * @View(baseDir="index/")
 */
class IndexController extends HttpController
{
    /**
     * @Action
     * @Route("/")
     * @View(renderType="html")
     *
     * @return array
     */
    public function index(): array
    {
        return [
            'hello' =>  'imi',
            'time'  =>  date('Y-m-d H:i:s', time()),
        ];
    }

    /**
     * @Action
     * @return array
     */
    public function api($time): array
    {
        return [
            'hello' =>  'imi',
            'time'  =>  date('Y-m-d H:i:s', time()),
        ];
    }


    /**
     * @Action
     * @return array
     */
    public function test(): array
    {
        $redis = RedisManager::getInstance();
        $redis->set('test',test);
        $result['data'] = $redis->get('test');
        RedisManager::release($redis);
        return  $result;
    }

}
