<?php

namespace App\Http\Middleware;

use App\Cate;
use App\Config;
use Closure;

class RunAll
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $configModel = new Config();
        $config = $configModel->getConfig();
        config(['config.title' => $config->title, 'config.description' => $config->description,
            'config.url' => $config->url, 'config.keywords' => $config->keywords, 'config.canonical' => $config->canonical]);

        $cateModel = new Cate();
        $cates = $cateModel->getListCate();
        if (count($cates) > 0) {
            $cate = [];
            $cate_name = [];
            foreach ($cates as $item) {
                $cate[$item->id] = $item->slug;
                $cate_name[$item->id] = [$item->title, $item->description];
            }
            config(['config.cate' => $cate, 'config.cate_name' => $cate_name]);
        }

        return $next($request);
    }
}
