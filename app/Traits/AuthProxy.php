<?php
namespace App\Traits;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Validation\UnauthorizedException;

/**
 * Created by PhpStorm.
 * User: targaryen
 * Date: 2018/8/25
 * Time: 上午10:13
 */

trait AuthProxy
{
    public function authenticate()
    {
        $client = new Client();

        try {
            $url = request()->root() . '/api/oauth/token';

            $params = array_merge(config('passport.proxy'), [
                'username' => request('userName'),
                'password' => request('password'),
            ]);

            $respond = $client->request('POST', $url, ['form_params' => $params]);
        } catch (GuzzleException $e) {
            throw  new UnauthorizedException('请求失败，服务器错误');
        }

        if ($respond->getStatusCode() !== 401) {
            return json_decode($respond->getBody()->getContents(), true);
        }

        throw new UnauthorizedException('账号或密码错误');
    }
}