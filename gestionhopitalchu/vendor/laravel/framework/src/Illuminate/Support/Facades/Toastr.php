<?php

namespace Illuminate\Support\Facades;



class Toastr extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'toastr';
    }
}
