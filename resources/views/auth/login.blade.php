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
                        <v-icon medium class="cya_c" color="white">input</v-icon>
                        &nbsp;                       
                        User {{ __('Login') }}                       
                    </v-card-title>
                    <v-card-actions>
                        <v-layout justify-center row>
                            <v-flex xs8 md6>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf                
                                    <div>
                                        <label  class="d-none form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"></label>
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
                                        <label class="d-none form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"></label>
                                        <v-text-field
                                            id="password"
                                            type="password"                                            
                                            label="{{ __('Password') }}"                                        
                                            name="password"                                                                                     
                                            placeholder="{{ __('Password') }}"
                                            color="#1e6aad"
                                            required
                                        ></v-text-field>
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>                                
                                    <div>    
                                        <v-checkbox                                        
                                            color="#1e6aad"
                                            label="{{ __('Remember Me') }}"                                            
                                        ></v-checkbox>
                                    </div>
                                    <div>                                      
                                        <v-btn
                                            block                              
                                            type="submit"
                                            color="#1e6aad"
                                            class="white--text"
                                            style=" margin:8px 0"
                                        >
                                            <v-icon left color="white">input</v-icon>
                                            {{ __('Login') }}
                                        </v-btn> 
                                        <v-btn
                                            block                                        
                                            flat                                           
                                            color="#1e6aad"   
                                            class="link-href"   
                                            style="margin:8px 0"                                            
                                            href="{{ route('password.request') }}"
                                        > 
                                        {{ __('Forgot Your Password?') }}
                                        </v-btn>
                                    </div>                                       
                                </form>
                            </v-flex>
                        </v-layout>
                    </v-card-actions>
                </v-card>    
            </v-flex>
        </v-layout>
    </v-container>
@endsection
