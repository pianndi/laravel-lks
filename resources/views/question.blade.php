@extends('layouts.main')

@section('container')
<script>
    const data = {{json_encode($data)}};
</script>
<form action='{{request()->getRequestUri()}}' method='post'>
    @csrf
@foreach($data as $d)
    <h2>{{ $loop->index +1}}. {{ $d->title }}</h2>
    <input type="hidden" name="answer[{{$loop->index}}][id]" value="{{$d->id}}">
    <p>
        <label >
            <input type="radio" name="answer[{{$loop->index}}][answer]" value='1' required >
            A. {{ $d->choice_1 }}
        </label>
    </p>
    <p>
        <label >
            <input type="radio" name="answer[{{$loop->index}}][answer]" value='2' required >
            B. {{ $d->choice_2 }}
        </label>
    </p>
    <p>
        <label >
            <input type="radio" name="answer[{{$loop->index}}][answer]" value='3' required >
            C. {{ $d->choice_3 }}
        </label>
    </p>
    <p>
        <label >
            <input type="radio" name="answer[{{$loop->index}}][answer]" value='4' required >
            D. {{ $d->choice_4 }}
        </label>
    </p>
    <p>
        <label >
            <input type="radio" name="answer[{{$loop->index}}][answer]" value='5' required >
            E. {{ $d->choice_5 }}
        </label>
    </p>
    @endforeach
    <button type="submit">Simpan</button>
</form>
@endsection