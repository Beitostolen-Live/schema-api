<?php

namespace App\Http\Controllers;

use App\Models\CodeSet;
use App\Models\Code;
use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class CodeSetController extends Controller
{
    public function show($codeset_id)
    {
        try
        {
            $codeset = CodeSet::find($codeset_id);
            return response()->json(['codeset' => $codeset], 200);
        }
        catch(\Exception $e)
        {
            return response()->json(['message' => 'Not able to get the codeset.'], 400);
        }
    }

    public function showCodeSetCodes($codeset_id)
    {
        try
        {
            $codeset = CodeSet::find($codeset_id);
            if($codeset) {
                $codeset->codes = Code::where('codesetid', $codeset_id)->get();
                return response()->json(['codeset' => $codeset], 200);
            } else {
                return response()->json(['message' => 'Codeset not defined'], 204);
            }
        }
        catch(\Exception $e)
        {
            return response()->json(['message' => 'Not able to get the codeset.'], 400);
        }
    }

    public function create(Request $request, $codeset_id)
    {
        $codeset = new CodeSet;
        $codeset->id = $codeset_id;
        $codeset->typeCodeSetId = $request->typeCodeSetId;
        $codeset->typeCodeId = $request->typeCodeId;
        $codeset->name = $request->name;
        $codeset->description = $request->description;
        $codeset->save();
        return response()->json($codeset, 201);
    }
}
?>