<?php

namespace App\Http\Controllers\API;

use App\Infrastructure\TipRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ResponseStatusConst;


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
        $status = ResponseStatusConst::OK_RESPONSE;
        if(!$tips){
          $status = ResponseStatusConst::NO_CONTENT_RESPONSE;;
        }
        return response()->json($tips, $status);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $tip = $this->tipRepository->add($request->guid,
                            $request->title,
                            $request->description);
        $status = ResponseStatusConst::CREATED_RESPONSE;
        if(!$tip){
          $status = ResponseStatusConst::BAD_REQ_RESPONSE;;
        }
        return response()->json($tip, $status);
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
      $tip = $this->tipRepository->getAssoc($request->id);
      $status = ResponseStatusConst::OK_RESPONSE;
      if(!$tip){
        $status = ResponseStatusConst::NO_CONTENT_RESPONSE;;
      }
      return response()->json($tip, $status);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      $tip = $this->tipRepository->update($request->guid,
                          $request->title,
                          $request->description,
                          $request->id);
      $status = ResponseStatusConst::CREATED_RESPONSE;
      if(!$tip){
        $status = ResponseStatusConst::BAD_REQ_RESPONSE;;
      }
      return response()->json($tip, $status);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $this->tipRepository->delete($request->id);
        return response()->json('', ResponseStatusConst::OK_RESPONSE);

    }
}
