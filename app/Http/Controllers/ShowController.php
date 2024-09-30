<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreShowRequest;
use App\Http\Requests\UpdateShowRequest;
use App\Models\Show;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;

class ShowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $response = Http::get('https://www.ivi.ru/movies'.$request->path, [
            //'_' => '_',
        ]);
        
        preg_match_all('/<span class="nbl-slimPosterBlock__titleText">(.*?)<\/span>/', $response, $match);

        $resultArray = [$match[1]];

            for($i = 2; $i <= 100; $i ++) {

                $response = Http::get('https://www.ivi.ru/movies'.$request->path.'/page'.$i, [
                    //'_' => '_',
                ]);

                if($response && $response->status() === 200) {

                    preg_match_all('/<span class="nbl-slimPosterBlock__titleText">(.*?)<\/span>/', $response, $match1);

                    // Если пытаемся получить доступ к undefined странице
                    if ($resultArray[0] == $match1[1]) {
                        break;
                    }

                    array_push($resultArray, $match1[1]);
                    
                }

            }

        return response()->json(['shows' => $resultArray]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreShowRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Show $show)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Show $show)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateShowRequest $request, Show $show)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Show $show)
    {
        //
    }
}
