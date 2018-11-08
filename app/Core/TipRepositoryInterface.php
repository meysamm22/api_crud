<?php

namespace App\Core;

interface TipRepositoryInterface
{

  public function getAllTips();
  public function add($guid, $description, $title);
  public function update($guid, $description, $title, $id);
  public function getAssoc($id);
  public function delete($id);



}
