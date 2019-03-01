@extends('layouts.app')
@section('content')
  <v-layout justify-center row mx-2 my-4>
    <v-flex xs12 md10 xl8>
      <home url="{{ url('/') }}" username="{{ $username }}" websites=" {{ $websites }} "></home>
    </v-flex>
  </v-layout>
@endsection
