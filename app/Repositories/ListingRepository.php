<?php

// Modelに紐づく2つのメソッド以外はコピペのような感覚で書いちゃって構わないです

namespace App\Repositories;

// Modelにアクセスする旨を書く
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
  public function getUser($name)
  {
    return $this->user->where('name', $name)->first();
  }

  // 後述のコントローラから $request を受け取って、中に入った名前とメールアドレスでユーザーを作る
  public function createUser($request)
  {
    return $this->user->create([
      'name' => $request['name'],
      'email' => $request['email'],
    ]);
  }
}