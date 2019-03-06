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
                        <v-icon medium class="cya_c" color="white">save</v-icon>
                        &nbsp;
                        {{ __('Reset Password') }}
                    </v-card-title>
                    <v-card-actions>
                        <v-layout justify-center row>
                            <v-flex xs8 md6>
                                <form method="POST" action="{{ route('password.update') }}">
                                    @csrf
                                    <input type="hidden" name="token" value="{{ $token }}">                     
                                    <v-text-field
                                        id="email"
                                        type="email"
                                        label="{{ __('E-Mail Address') }}"
                                        name="email"
                                        value="{{ $email ?? old('email') }}"
                                        placeholder="{{ __('E-Mail Address') }}"
                                        color="#1e6aad"     
                                        class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" 
                                        style="border:0; padding:12px 0"
                                        required                                                                                
                                    ></v-text-field>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" style="padding:16px 0 0" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                    <v-text-field
                                        id="password"
                                        type="password"
                                        label="{{ __('New Password') }}"
                                        name="password"                            
                                        placeholder="{{ __('New Password') }}"
                                        color="#1e6aad"    
                                        class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"  
                                        style="border:0; padding:30px 0"                      
                                        required                                                                        
                                    ></v-text-field>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                    <v-text-field
                                        id="password-confirm"
                                        type="password"
                                        label="{{ __('Confirm New Password') }}"
                                        name="password_confirmation"
                                        color="#1e6aad"
                                        style="border:0; padding:22px 0 0"                                         
                                        required                        
                                    ></v-text-field>
                                    <div>
                                        <v-btn        
                                            block
                                            type="submit"
                                            color="#1e6aad"
                                            class="white--text"
                                            style="margin:8px 0"                             
                                        >
                                        <v-icon left >save</v-icon>
                                            {{ __('Reset Password') }}          
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
