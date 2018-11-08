<?php

namespace App\Infrastructure;

use App\Core\Tip;

class TipFactory
{

  private $tip;

  private function validateTitle()
  {
    if(isset($this->tip->title)){
      return true;
    }

    return false;
  }

  private function validateDescription()
  {
    if(isset($this->tip->description)){
      return true;
    }

    return false;
  }

  private function validateGuid()
  {
    if(isset($this->tip->guid)){
      return true;
    }

    return false;
  }

  private function validate()
  {
    if($this->validateTitle()
    && $this->validateDescription()
    && $this->validateGuid()){
      return true;
    }

    return false;
  }

  public function make($guid, $description, $title)
  {
    $this->tip = new Tip();
    $this->tip->guid = $guid;
    $this->tip->title = $title;
    $this->tip->description = $description;
    if($this->validate()){
      return $this->tip;
    }

    return false;
  }
}
