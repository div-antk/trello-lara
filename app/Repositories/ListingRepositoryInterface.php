<?php

namespace App\Repositories;

interface ListingRepositoryInterface
{
  public function getAll($user_id);
}