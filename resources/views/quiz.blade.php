@extends('layouts.main')

@section('container')
<ul> 
    @foreach($data as $d)
    <li>
        <div>
            <h2>{{$loop->index+1}}. {{ $d->title }}</h2>
            <p>Kategori: {{ $d->category->name }}</p>
            <p>Random: {{ $d->random ? 'Yes': 'No' }}</p>
            <p>Status: {{ $d->schedule ? 'UPCOMING': 'NOT SCHEDULED' }}</p>

        </div>
    </li>
    @endforeach
</ul>
{{ $data->links() }}
@endsection