@extends('layouts.main')

@section('container')
<h2>{{ $data->currentPage() }}. {{ $data[0]->title }}</h2>
<form action='{{request()->getRequestUri()}}' method='post'>
    @csrf
    <input type="hidden" name="question_id" value='{{ $data[0]->id}}'>
    <p>
        <label >
            <input type="radio" name="answer" value='1' @if( $answer == '1') checked @endif required onchange='this.form.submit()'>
            A. {{ $data[0]->choice_1 }}
        </label>
    </p>
    <p>
        <label >
            <input type="radio" name="answer" value='2' @if( $answer == '2') checked @endif required onchange='this.form.submit()'>
            B. {{ $data[0]->choice_2 }}
        </label>
    </p>
    <p>
        <label >
            <input type="radio" name="answer" value='3' @if( $answer == '3') checked @endif required onchange='this.form.submit()'>
            C. {{ $data[0]->choice_3 }}
        </label>
    </p>
    <p>
        <label >
            <input type="radio" name="answer" value='4' @if( $answer == '4') checked @endif required onchange='this.form.submit()'>
            D. {{ $data[0]->choice_4 }}
        </label>
    </p>
    <p>
        <label >
            <input type="radio" name="answer" value='5' @if( $answer == '5') checked @endif required onchange='this.form.submit()'>
            E. {{ $data[0]->choice_5 }}
        </label>
    </p>
</form>
{{$data->links()}}
@endsection