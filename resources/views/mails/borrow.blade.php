@extends('layouts.mail')

@section('content')

<p>Uživatel {{ Auth::user()->name }} má zájem o půjčení položky {{ $item->title }}.
Kontaktuje jej prosím pomocí mailu {{ Auth::user()->email }}</p>

@if ($content !== '')

<p>Zpráva zájemce je následující: </p>

<p>{{ $content }}</p>

@endif

<p>___</p>

<p>Tento email vám zaslal <em>rentit</em></p>

@endsection