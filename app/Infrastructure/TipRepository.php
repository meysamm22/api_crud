<?php

namespace App\Infrastructure;

use App\Core\TipRepositoryInterface;
use App\TipModel;
use App\Core\Tip;

class TipRepository implements TipRepositoryInterface
{

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

}
