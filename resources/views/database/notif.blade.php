@foreach ($notifications as $notification)
    @php
        $data = $notification->data;
    @endphp
    
    <h5>{{ $data['name'] }}</h5>
    <p>{{ $data['email'] }}</p>
@endforeach

<a href="{{ route('notify.readAll', ['id' => $user->id]) }}">Marks all as read</a>