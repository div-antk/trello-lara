<?php

// Modelに紐づく2つのメソッド以外はコピペのような感覚で書いちゃって構わないです

namespace App\Repositories;
use App\Listing;

class ListingRepository implements ListingRepositoryInterface
{
  protected $listing;

    /**
    * @param object $listing
    */

  public function __construct(Listing $listing)
  {
    $this->listing = $listing;
  }

  // 名前に紐づくUserのデータを1件持ってくる
  public function getAll($user_id)
  {
    return $this->listing->where('user_id', $user_id)->get();
  }

  public function createList($user_id, $request)
  {
    $d = $this->listing->create([
      'user_id' => $user_id,
      'title' => $request['title']
    ]);
  }
}