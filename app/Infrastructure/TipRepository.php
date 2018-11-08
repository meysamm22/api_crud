<?php

namespace App\Infrastructure;

use App\Core\TipRepositoryInterface;
use App\TipModel;
use App\Core\Tip;
//use App\Infrastructure\TipFactory;


class TipRepository implements TipRepositoryInterface
{

  private $tipFactory;

  function __construct()
  {
    $this->tipFactory = new TipFactory();
  }

  public function getAllTips()
  {
     $tips =  array();
     $tipsModel = TipModel::all();
     if ($tipsModel) {
       foreach ($tipsModel as $tipModel) {
         $tip = new Tip();
         $tip->setId($tipModel->id);
         $tip->setGuid($tipModel->guid);
         $tip->setTitle($tipModel->title);
         $tip->setDescription($tipModel->description);

         $tips[] = $tip;
       }
     }

     return $tips;
  }

  public function add($guid, $description, $title)
  {
    $tip = $this->tipFactory->make($guid, $description, $title);
    if($tip){
      $tipModel = new TipModel();
      $tipModel->guid = $tip->guid;
      $tipModel->title = $tip->title;
      $tipModel->description = $tip->description;
      $tipModel->save();

      return $tip;
    }

    return false;
  }

  public function update($guid, $description, $title, $id)
  {
    $tip = $this->tipFactory->make($guid, $description, $title);
    if($tip){
      $tipModel = TipModel::find($id);
      if($tipModel){
        $tipModel->guid = $tip->guid;
        $tipModel->title = $tip->title;
        $tipModel->description = $tip->description;
        $tipModel->save();

        return $tip;
      }
      return false;
    }

    return false;
  }

  public function getAssoc($id)
  {
    $tipModel = TipModel::find($id);
    if ($tipModel) {
      $tip = new Tip();
      $tip->setId($tipModel->id);
      $tip->setGuid($tipModel->guid);
      $tip->setTitle($tipModel->title);
      $tip->setDescription($tipModel->description);

      return $tip;
    }
    return false;
  }
}
