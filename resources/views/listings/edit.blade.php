@extends('app')
@section('content')
<div class="panel-body">
  <!-- バリデーションエラーの場合に表示 --> 
  @include('common.errors')
  <form action="{{ route('listings.update', ['listing' => $listing]) }}" method="POST" class="form-horizontal">
    {{csrf_field()}} 
      <div class="form-group"> 
        <label for="listing" class="col-sm-3 control-label">リスト名</label> 
        <div class="col-sm-6"> 
          <!-- リスト名 --> 
          <input type="text" name="title" value="{{ old('title', $listing->title) }}" class="form-control"> 
        </div>
        <input type="hidden" name="id" value="{{ old('id', $listing->id) }}">
        <input type="hidden" name="id" value="{{ old('id', $listing->id) }}">
      </div>
      <div class="form-group"> 
        <div class="col-sm-offset-3 col-sm-6"> 
          @method('PATCH')
          <button type="submit" class="btn btn-default">
            <i class="glyphicon glyphicon-saved"></i>更新
          </button> 
        </div>
      </div>
    </form>
</div>
@endsection