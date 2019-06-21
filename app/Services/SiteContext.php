<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Arr;

class SiteContext
{
    public $name = "";
    public $url = "";
    public $siteName = "";
    public $copyright = "";

    public function __construct()
    {
        $url = url()->current();
        $url = explode('://', $url);
        $scheme = $url[0];
        $domain = explode('/', Arr::get($url, 1, $url[0]))[0];

        $this->url = $scheme . '://' . $domain;

        $this->name = 'sample-media-gws';
        $this->siteName = 'Hunteat';
        $this->copyright = 'Shuhei Yoshida';
    }
}