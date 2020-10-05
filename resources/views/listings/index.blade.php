@extends('app')
@section('content')

<div class="topPage">
  <div class="listWrapper">
    @foreach ($listings as $listing) 
      <div class="list">
        <div class="list_header">
          <h2 class="list_header_title">{{ $listing->title }}</h2>
          <div class="list_header_action">
            <form method="POST" action="{{ route('listings.destroy', ['listing' => $listing]) }}">
              @csrf
              @method('DELETE')
              <a onclick="return confirm('{{ $listing->title }}を削除して大丈夫ですか？')"><i class="fas fa-trash"></i></a>
              <button type="submit" class="fas fa-trash">削除する</button>
            </form>
            <a href="{{ route('listings.edit', ['listing' => $listing->id]) }}"><i class="fas fa-pen"></i></a>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>
@endsection