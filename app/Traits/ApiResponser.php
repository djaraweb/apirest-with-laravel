<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;

trait ApiResponser
{
	protected function messageCustom($arrayMsg){
		return response()->json($arrayMsg, 200);
	}

    protected function successResponse($data, $code=200){
		return response()->json(['body'=>$data,
								 'code'=>$code],
								$code);
    }

	protected function responseToError($message, $code=501){
		return response()->json(['message'=>$message,
								 'code'=>$code],
								$code);
    }

    protected function responseToList($data, $code=200){
		return response()->json(['body'=>$data,
								 'code'=>$code],
								$code);
    }

}
