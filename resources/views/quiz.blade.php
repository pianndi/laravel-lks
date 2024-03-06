@extends('layouts.main')

@section('container')
@include('partials.logout')
<form action="quiz" method="get">
    <input type="search" name="search" id="search" placeholder='Cari' value='{{ request('search','')}}'>
    <select name="sort" id="sort">
        <option value="latest">Terbaru</option>
        <option value="oldest">Terlama</option>
    </select>
</form>
@unless($data->count())
<h3>Kuis Tidak ditemukan</h3>
@endunless
<ul> 
    @foreach($data as $d)
    <li>
        <div>
            <h2><a href="/quiz/{{$d->id}}">{{$loop->index+$data->firstItem()}}. {{ $d->title }}</a></h2>
            <p>Kategori: {{ $d->category->name }}</p>
            <p>Random: {{ $d->random ? 'Yes': 'No' }}</p>
            <p>Status: {{ ($d->schedule ? 'UPCOMING': $d->answer->firstWhere('user_id',auth()->user()->id))? 'DONE' : 'NOT SCHEDULED' }}</p>
            @if($d->answer->firstWhere('user_id',auth()->user()->id))
            <p>Score: {{ $d->answer->firstWhere('user_id',auth()->user()->id)->score}}</p>
            @endif
        </div>
    </li>
    @endforeach
</ul>
{{ $data->links() }}
@endsection