<?php

namespace App\Http\Controllers;

use App\Models\CodeSet;
use App\Models\Code;
use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class CodeController extends Controller
{
    public function show($codeset_id, $code_id)
    {
        try
        {
            $codes = Code::where([
                ['codesetid', '=', $codeset_id],
                ['codeid', '=', $code_id],
            ])->get();
            return response()->json(['code' => $codes], 200);
        }
        catch(\Exception $e)
        {
            return response()->json(['message' => 'Not able to get the codeset.'], 400);
        }
    }

    public function create(Request $request, $codeset_id, $code_id)
    {
        $code = new Code;
        $code->codesetid = $codeset_id;
        $code->codeid = $code_id;
        $code->description = $request->description;
        $code->valid_from = $request->valid_from;
        $code->valid_to = $request->valid_to;
        $code->save();
        return response()->json($code, 201);
    }
}
?>