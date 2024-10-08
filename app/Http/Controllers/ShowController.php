<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreShowRequest;
use App\Http\Requests\UpdateShowRequest;
use Illuminate\Http\Request;
use App\Facades\IviJobFacade;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use App\Models\Show;

use Illuminate\Queue\Middleware\Skip;

class ShowController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        DB::table('jobs')->delete();

        $shows = Show::where('category', preg_replace('/[^A-Za-z0-9\-]/', '', $request->path))->get();
    

        if (count($shows) > 0) {

            return response()->json(['shows' => Show::where('category', preg_replace('/[^A-Za-z0-9\-]/', '', $request->path))->get()]);

        }
        else {

            IviJobFacade::dispatch($request->path);

        }

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
