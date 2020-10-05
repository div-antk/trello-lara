@if ($errors->has('title'))
  @foreach($errors->get('title') as $error)
    <ul>
        <li>
            {{ $error }}
        </li>
    </ul>
  @endforeach
@endif