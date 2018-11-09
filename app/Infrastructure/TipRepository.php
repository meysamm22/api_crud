<?php

namespace App\Infrastructure;

use App\Core\TipRepositoryInterface;
use App\TipModel;
use App\Core\Tip;

class TipRepository implements TipRepositoryInterface
{

  public $tipFactory;

  function __construct()
  {
    $this->tipFactory = new TipFactory();
  }

  private function getAllTips()
  {
    return TipModel::all();
  }

  private function getAssoc($id)
  {
    return TipModel::find($id);
  }

  public function getTipsList()
  {
     $tips =  array();
     $tipsModel = $this->getAllTips();
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

  public function getTip($id)
  {
    $tipModel = $this->getAssoc($id);
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

  public function delete($id)
  {
    TipModel::destroy($id);

    return true;
  }
}
