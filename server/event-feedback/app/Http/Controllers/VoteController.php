<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Vote;
class VoteController extends Controller
{
    public function vote(Request $request){
        $isValid = $this->validator($request->only('vote'));
        if($isValid->fails()) return response(["message" => "Erro ao Computar voto"] , 400);
        if(Vote::create($request->only('vote'))){
            return response(["message" => "Voto computado com sucesso"],200);
        }
        return response(['message' => "Erro desconhecido"],400);

    }
    private function validator(array $data)
    {
        return Validator::make($data, [
            'vote' => ['required', 'between:0,5','numeric']
        ]);
    }

    public function testeRedis(){
        Redis::set('teste' , 'teste');
        echo "ok";
    }
}
