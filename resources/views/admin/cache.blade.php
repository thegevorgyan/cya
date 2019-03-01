@extends('layouts.app')
@section('content')
  <cache url="{{ url('/') }}" cache="{{ $cache }}"></cache>
@endsection
