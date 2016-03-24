<?php

namespace Targaryen\QiniuFilesystem;

use Illuminate\Support\ServiceProvider;

class QiniuFilesystemServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        \Storage::extend('qiniu', function ($app, $config) {
            return new QiniuFilesystemAdapter($config['accessKey'], $config['secretKey'], $config['bucket'], $config['domain']);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
