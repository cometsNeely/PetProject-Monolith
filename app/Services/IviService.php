<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Models\Show;

class IviService {

    public function callIviParse($path) {

        $zeroPage = null;

            for($i = 1; $i <= 100; $i ++) {

                if ($i === 1) {
                    $response = Http::get('https://www.ivi.ru/movies'.$path);
                }
                else {
                    $response = Http::get('https://www.ivi.ru/movies'.$path.'/page'.$i);
                }

                if($response && $response->status() === 200) {

                    preg_match_all('/<span class="nbl-slimPosterBlock__titleText">(.*?)<\/span>/', $response, $match);

                    if($i === 1) {
                        $zeroPage = $match[1];
                    }

                    // Если пытаемся получить доступ к undefined странице
                    if ($i > 1 && $zeroPage == $match[1]) {
                        break;
                    }

                    foreach($match[1] as $result){        

                        Show::create(['name' => $result, 'category' => preg_replace('/[^A-Za-z0-9\-]/', '', $path)]);
                        //ShowsDoneEvent::dispatch(ShowResource::make($res), preg_replace('/[^A-Za-z0-9\-]/', '', $path));
                
                    }

                }

            }

    }

}