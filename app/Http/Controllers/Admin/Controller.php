<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller as BaseController;

class Controller extends BaseController
{

    public function __construct()
    {
        $this->middleware('auth:admin');

        config()->set('translatable.use_fallback', false);

        if (isset($this->willcard)) {
            view()->share('willcard', $this->willcard);
        }
    }

}
