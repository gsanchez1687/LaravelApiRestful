<?php 

namespace App\Traits;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

trait ApiResponde{

    private function successResponde($data, $code){
            return response()->json([
                'success' => true,
                'data' => $data,
                'message' => 'Retrieved successfully'
            ], $code);
    }

    protected function failedResponde($data, $code){
        return response()->json([
            'success' => false,
            'data' => $data,
            'message' => 'Failed to retrieve'
        ], $code);
    }

    protected function showAll(Collection $collection, $code = 200){
        return $this->successResponde(['data'=>$collection],$code);
    }

    protected function showOne(Model $instance, $code = 200){
        return $this->successResponde(['data'=>$instance],$code);
    }
}