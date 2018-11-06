<?php

namespace App\Http\Controllers\API;

use App\Infrastructure\TipRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TipController extends Controller
{

    private $tipRepository;

    function __construct(TipRepository $tipRepository)
    {
      $this->tipRepository = $tipRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TipRepository $tipModel)
    {
        $tips = $this->tipRepository->getAllTips();
        return response()->json($tips, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tip  $tip
     * @return \Illuminate\Http\Response
     */
    public function show(TipModel $tipModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tip  $tip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipModel $tipModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tip  $tip
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipModel $tipModel)
    {
        //
    }
}
