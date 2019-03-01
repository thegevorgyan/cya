@extends('layouts.app')
@section('content')
  <stat url="{{ url('/') }}" stat="{{ $stat }}"></stat>
@endsection
