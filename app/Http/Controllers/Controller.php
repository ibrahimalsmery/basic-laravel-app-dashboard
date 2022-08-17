<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public array $res = [];

    public function page_title($page_title = '')
    {
        $this->res['page_title'] = $page_title;
        return $this;
    }

    public function breadcrumb_link($item, $link = '')
    {
        $this->res['breadcrumb_links'][] = compact('item', 'link');
        return $this;
    }

    public function view($view, $data = [])
    {
        return view($view, array_merge($this->res, $data));
    }

    public function setData($key, $value)
    {
        $this->res[$key] = $value;
        return $this;
    }
}
