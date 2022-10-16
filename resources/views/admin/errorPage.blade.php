@extends('layouts.home')
@section('title', "MENSAJE ")
@section('cuerpo')
   <h1>{{$data['mensaje']}}</h1>
   <button type="button" onclick="window.location.href='{{route($data["ruta"])}}'">OK</button>
@endsection