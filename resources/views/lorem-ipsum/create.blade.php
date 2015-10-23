@extends('layouts.master')


@section('title')
    Lorem-Ipsum Generator
@stop

@section('head')
    <link href="/css/p3lorem.css" type='text/css' rel='stylesheet'>
@stop

@section('content')
    <div class="stage">
        <div class="pageContent">
          <div class="topLinks">
              <ul>
                <li class="topLinks"><a href="/" class="topLinks">Home</a></li>
                <li class="topLinks"> | </li>
                <li class="topLinks"><a href="/usergenerator" class="topLinks">Random User Generator</a></li>
                <li class="topLinks"> | </li>
                <li class="topLinks"><a href="/xkcdgenerator" class="topLinks">xkcd Password Generator</a></li>
              </ul>
          </div>
            <div class="bladePage">
              <h1 class="lorem">Lorem Ipsum Generator</h1>
              <form method='POST' action='/lorem-ipsum'>
              <input type='hidden' name='_token' value='{{ csrf_token() }}'>

              <p>
                <h2>Please input the number of paragraphs you wish to generate.</h2>
                (The number of paragraphs must be between 1 - 99.)
              </p>
              @section('content')
              @if(count($errors) > 0)
                  <div class="error">
                      @foreach ($errors->all() as $error)
                        Oops! {{ $error }}
                      @endforeach
                  </div>
              @endif
              <input type='int' name='usernum' size='1'>
              <input type='submit' value='Generate text!'>

              </form>
              <p>{!! $finalgen !!}</p>
            </div>
        </div>
    </div>

@stop

@section('body')
    <script src="/js/lorem/lorem.js"></script>
@stop
