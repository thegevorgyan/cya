<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('path.aspireName', 'Confirm Your Age') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <link rel="shortcut icon" href="{{ asset('../favicon.ico') }}" >
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">   
</head>
<body>
    <div id="app" v-cloak>   
        <v-app>
            @include('layouts.toolbar')
            <v-content>            
                <v-container fluid class="mpz">                        
                    <v-layout 
                        justify-center
                        align-center
                    >
                        <v-flex text-xs-center xs12>
                            <v-img src="img/bg/main.png" ></v-img>
                        </v-flex>
                    </v-layout>
                    <v-layout 
                    row
                    justify-center
                        align-center
                        
                    >
                        {{-- <v-flex popup_view text-xs-center pa-4  xs12 sm10 md6 lg5 xl5)>
                            <v-img                            
                                src="img/templates/template1.jpg"
                                lazy-src="img/templates/template1.jpg"
                                class="popup_view"
                            ></v-img>
                        </v-flex>                
                        <v-flex text-xs-center pa-4  xs12 sm10 md6 lg5 xl5>
                            <v-img
                                src="img/templates/template2.jpg"
                                lazy-src="img/templates/template2.jpg"
                                class="popup_view"
                            ></v-img>
                        </v-flex> --}}
                         
                        <v-flex text-xs-center pa-5 xs12 md10 lg8 xl3
                        justify-center
                        align-center
                        >  
                         
                            <v-carousel hide-controls 
                            
                            justify-center
                            align-center
                          
                            class="popup_view">
                                <v-carousel-item                             
                                    v-for="n in 3"
                                    :key="n"   
                                    :src="`img/templates/template${n}.jpg`"
                                    reverse-transition="fade"
                                    transition="fade"   
                                                                    
                                ></v-carousel-item>                   
                            </v-carousel>    
                            
                        </v-flex>
                           
                        <v-flex text-xs-center pa-5 xs12 md10 lg8 xl4>  
                            <div>
                                <span>An age verification system, also known as an age gate, is a technical protection measure used to restrict access to digital content to those that are not appropriately-aged. These systems are used primarily to restrict access to content classified (either voluntarily or by local laws) as being inappropriate for users under a specific age, such as alcohol and tobacco advertising, internet pornography or other forms of adult-oriented content, video games with objectionable content, or to remain in compliance with online privacy laws that regulate the collection of personal information from children (such as COPPA in the United States).</span>    
                            </div>  
                        </v-flex>  
                    </v-layout>         
                </v-container> 
                {{-- <v-flex class="social_media_icons" text-xs-center xs12>                          
                        <span class="social_fb" >
                            <a href="https://www.fb.com" target="_blank" title="Facebook"></a>
                        </span>                           
                        <span class="social_ig">
                            <a href="https://www.instagram.com" target="_blank" title="Instagram"></a>
                        </span>
                        <span class="social_mt">
                            <a href="https://twitter.com" target="_blank" title="Twitter"></a>
                        </span>
                        <span class="social_yt">
                            <a href="https://www.youtube.com" target="_blank" title="YouTube"></a>
                        </span>
                    </v-flex> --}}
            </v-content>
        </v-app>
    </div>
</body>
</html>
