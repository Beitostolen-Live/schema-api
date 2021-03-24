<?php

namespace App\Http\Controllers;

use App\Models;
use Laravel\Lumen\Routing\Controller as BaseController;

class CodeSetCodeController extends BaseController
{
    public function showCodesFromCodeSet($codeset_id)
    {
        $codeset = CodeSet::find($codeset_id);
        $codes = $codeset->codes;
        return response()->json($codes, 200);
    }
}
?>