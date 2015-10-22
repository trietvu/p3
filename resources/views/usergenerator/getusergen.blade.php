@extends('layouts.master')

@section('title')
    Random User Generator
@stop

@section('head')
    <link href="/css/p3usergen.css" type='text/css' rel='stylesheet'>
@stop


@section('content')
    <div class="stage">
        <div class="pageContent">
            <div class="topLinks">
                <ul>
                  <li class="topLinks"><a href="/" class="topLinks">Home</a></li>
                  <li class="topLinks"> | </li>
                  <li class="topLinks"><a href="/lorem-ipsum" class="topLinks">Lorem Ipsum Generator</a></li>
                </ul>
            </div>
            <div class="bladePage">
              <h1 class="usergen">Random User Generator</h1>
              <form method='POST' action='/usergenerator'>
              <input type='hidden' name='_token' value='{{ csrf_token() }}'>
              <p>
                <h2>Please input the number of paragraphs you wish to generate.</h2>
              </p>
              @if(count($errors) > 0)
                  <div class="error">
                      @foreach ($errors->all() as $error)
                        Oops! {{ $error }}
                      @endforeach
                  </div>
              @endif
              <label for="users">How many users? </label>
              <input type='int' name='users' size='1'> (*Required. Max: 99 users.)<br><br>
              In addition to the user name, please select the other types of data you would like to generate:<br><br>
              <div class="types">
                  <input  name="title" type="checkbox" value="1"> <label for="title">Title (Mr., Ms., Dr., Etc.)</label><br>
                  <input  name="birthdate" type="checkbox" value="1"> <label for="birthdate">Birthdate</label><br>
                  <input name="address" type="checkbox" value="1"> <label for="address">Address</label><br>
              		<input name="phone" type="checkbox" value="1"> <label for="phone">Phone number</label><br>
              		<input name="profile" type="checkbox" value="1"> <label for="profile">Profile</label><br><br>
                  <input type='submit' value='Generate Users!'>
              </div>
              </form>
            </div>
        </div>
    </div>
@stop

@section('body')
    <script src="/js/lorem/lorem.js"></script>
@stop
