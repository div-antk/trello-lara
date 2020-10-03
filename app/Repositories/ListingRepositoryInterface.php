<?php

namespace App\Repositories;

interface ListingRepositoryInterface
{
  public function getAll($user_id);
  public function createList($user_id, $request);
}