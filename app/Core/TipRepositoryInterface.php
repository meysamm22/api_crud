<?php

namespace App\Core;

interface TipRepositoryInterface
{

  public function add($guid, $description, $title);
  public function update($guid, $description, $title, $id);
  public function delete($id);
  public function getTip($id);
  public function getTipsList();

}
