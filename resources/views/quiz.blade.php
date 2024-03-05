@extends('layouts.main')

@section('container')
<form action="quiz" method="get">
    <input type="search" name="q" id="q" placeholder='Cari' value='{{ request('q','')}}'>
    <select name="sort" id="sort">
        <option value="latest">Terbaru</option>
        <option value="2">Terlama</option>
    </select>
</form>
@unless($data->count())
<h3>Kuis Tidak ditemukan</h3>
@endunless
<ul> 
    @foreach($data as $d)
    <li>
        <div>
            <h2><a href="/quiz/{{$d->id}}">{{$loop->index+1}}. {{ $d->title }}</a></h2>
            <p>Kategori: {{ $d->category->name }}</p>
            <p>Random: {{ $d->random ? 'Yes': 'No' }}</p>
            <p>Status: {{ $d->schedule ? 'UPCOMING': 'NOT SCHEDULED' }}</p>

        </div>
    </li>
    @endforeach
</ul>
{{ $data->links() }}
@endsection