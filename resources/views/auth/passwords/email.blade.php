@extends('layouts.app')
@section('content')
    <v-container fluid grid-list-lg>
        <v-layout justify-center row>
            <v-flex xs12 sm10 md8 lg6 xl4>    
                <v-card>
                    <v-card-title 
                        class="cya_head white--text headline" 
                        style="padding:12px"
                    >             
                        <v-icon medium class="cya_c" color="white">email</v-icon>
                        &nbsp;
                        {{ __('Reset Password') }}
                    </v-card-title>
                    <v-card-actions>
                        <v-layout justify-center row>
                            <v-flex xs8 md6>
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif    
                                <form method="POST" action="{{ route('password.email') }}">
                                    @csrf        
                                    <div>
                                        <label class="d-none form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"></label>
                                        <v-text-field
                                            id="email"
                                            type="email"
                                            label="{{ __('E-Mail Address') }}"
                                            name="email"
                                            value="{{ old('email') }}"
                                            placeholder="{{ __('E-Mail Address') }}"
                                            color="#1e6aad"
                                            required                                            
                                        ></v-text-field>                                      
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>       
                                    <div>
                                        <v-btn        
                                            block
                                            type="submit"
                                            color="#1e6aad"
                                            class="white--text"
                                            style=" margin:8px 0"                             
                                        >
                                        <v-icon left >email</v-icon>
                                            {{ __('Send Password Reset Link') }}          
                                        </v-btn>  
                                    </div>
                                </form>
                            </v-flex>
                        </v-layout>                               
                    </v-card-actions>
                </v-card>
            <v-flex>
        </v-layout>
    </v-container>
@endsection
