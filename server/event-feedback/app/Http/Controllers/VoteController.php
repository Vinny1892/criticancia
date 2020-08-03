<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Vote;
use Illuminate\Support\Facades\Redis;
use Prometheus\CollectorRegistry;


class VoteController extends Controller
{
    public function vote(Request $request, CollectorRegistry $registry){
        $counterRequests = $registry->registerCounter('vote','api_use','its increases_api_requests', ['requestEndpoint']);
        $counterRequests->incBy(1,['requestEndpoint']);

        $isValid = $this->validator($request->only('vote'));
        if($isValid->fails()) return response(["message" => "Erro ao Computar voto"] , 400);
        if(Vote::create($request->only('vote'))){
            $counterVotes =  $registry->registerCounter('vote', 'counter', 'it increases_vote', ['qtdVote']);
            $counterVotes->incBy(1,['qtdVote']);
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

    public function testeRedis(CollectorRegistry $registry){

        $counter = $registry->getOrRegisterCounter('test', 'some_counter', 'it increases', ['type']);
        $counter->incBy(3, ['blue']);

        $gauge = $registry->getOrRegisterGauge('test', 'some_gauge', 'it sets', ['type']);
        $gauge->set(2.5, ['blue']);

        $histogram = $registry->getOrRegisterHistogram('test', 'some_histogram', 'it observes', ['type'], [0.1, 1, 2, 3.5, 4, 5, 6, 7, 8, 9]);
        $histogram->observe(3.5, ['blue']);
        echo "ok";
    }
}
