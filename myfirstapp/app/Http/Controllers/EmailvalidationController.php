<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Obs\Validpackage\Validpackage;

class EmailvalidationController extends Controller
{
    public function validateemail(Request $name) {
    	$oGreetr = new Validpackage();
        return $oGreetr->greet($sName);
});
    }
}
