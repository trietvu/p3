@extends('layouts.master')

@section('title')
    xkcd Password Generator
@stop

@section('head')
    <link href="/css/p3xkcdgen.css" type='text/css' rel='stylesheet'>
@stop


@section('content')
    <div class="stage">
        <div class="pageContent">
            <div class="topLinks">
                <ul>
                  <li class="topLinks"><a href="/" class="topLinks">Home</a></li>
                  <li class="topLinks"> | </li>
                  <li class="topLinks"><a href="/lorem-ipsum" class="topLinks">Lorem Ipsum Generator</a></li>
                  <li class="topLinks"> | </li>
                  <li class="topLinks"><a href="/usergenerator" class="topLinks">Random User Generator</a></li>
                </ul>
            </div>
            <div class="bladePage">
              <h1 class="xkcd">xkcd Password Generator</h1><br>
      				<div class="password">
                {!! $finalwords !!}
      				 </div>
      				 <div class='conditions'>
      					 <form method='POST' action='/xkcdgenerator'>
                   <input type='hidden' name='_token' value='{{ csrf_token() }}'>
      						 <p>
       					 		<h2>Please input a whole number below and select your parameters to generate your xkcd password. Or simply hit the "Submit" button again to generate another password with the default settings.</h2>
       						</p>
                  @section('content')
                  @if(count($errors) > 0)
                      <div class="error">
                          @foreach ($errors->all() as $error)
                            Oops! {{ $error }}
                          @endforeach
                      </div>
                  @endif
      						<p></p>
      						<p>
      					 		<label for='numberWords'>Number of words:</lable> <input type='int' name='numberWords' size='1'> (Max. of 9. Default is 4 words)<br><br>
      						</p>
      						<p>
      							<input type='checkbox' name='addNumber' id='addNumber' value='1'>
      							<label for='addNumber'>Add a number to the end of the password</label><br>
      						</p>
      						<p>
      							<input type='checkbox' name='addSymbol' id='addSymbol' value='1'>
      							<label for='addSymbol'>Add a symbol to the end of the password</label><br>
      						</p>
      						<p>
      							<input type='checkbox' name='addCapital' id='addCapital' value='1'>
      							<label for='addCapital'>Add a capital letter to the beginning of each word</label><br>
      						</p>
      						<p>
      							<input type='checkbox' name='allCaps' id='allCaps' value='1'>
      							<label for='allCaps'>Make all caps</label><br><br>
      						</p>
      						<p>
      							<label for='allCaps'>Please choose the type of spacing between each word:</label><br><br>
      							<input type='radio' name='spacing' id='spacing' value='hyphen' checked>
      							<label for='hyphen'>Hyphen (Default)</label> &nbsp;&nbsp;&nbsp;&nbsp;
      							<input type='radio' name='spacing' id='spacing' value='space'>
      							<label for='space'>Space</label> &nbsp;&nbsp;&nbsp;&nbsp;
      							<input type='radio' name='spacing' id='spacing' value='camelCase'>
      							<label for='camelCase'>Camel Case (No space, first letter capitalize)</label><br><br>
      						</p>
      					 	<div class='submit'><input type='submit' value='Submit' class='pill'></div>
      				 </form>
            </div>
        </div>
    </div>
@stop

@section('body')
    <script src="/js/lorem/lorem.js"></script>
@stop
