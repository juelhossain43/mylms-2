<?php

use Illuminate\Support\Facades\Auth;

function permisson_check($permission){
    if(!Auth::user()->hasPermissionTo($permission)){


    flash()->addWarning('You are not Authorized to access to this page');
    return redirect()->back();
}

}