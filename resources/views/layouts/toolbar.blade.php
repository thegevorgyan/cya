<v-card v-cloak>     
    <v-toolbar color="#0b2c5d" height="40">
        <v-toolbar-title>            
            <v-btn flat class="link-href" color="#f37021" href="{{ url('/') }}">
                <img 
                    src="{{asset('/img/icons/main_icon.png')}}" 
                    height="30"
                >                            
                &nbsp;
                <span class="hidden-xs-only font-weight-bold">{{config('path.aspireName')}}</span>
            </v-btn>
        </v-toolbar-title>
        <v-spacer></v-spacer>
        <v-toolbar-items>
            @guest               
                <v-btn flat color="white" class="link-href" href="{{ route('login') }}">
                    <v-icon color="#049bf6" dark>input</v-icon>
                    &nbsp;
                    <span class="hidden-xs-only">{{ __('Login') }}</span>
                </v-btn>
                @if (Route::has('register'))                    
                    <v-btn flat color="white" class="link-href" href="{{ route('register') }}">
                        <v-icon color="#049bf6" dark>how_to_reg</v-icon>
                        &nbsp;
                        <span class="hidden-xs-only">{{ __('Register') }}</span>
                    </v-btn>
                @endif
            @else
                <v-btn disabled dark flat>
                    <v-icon >account_circle</v-icon>
                    &nbsp;
                    <span class="hidden-xs-only white--text">{{ Auth::user()->name }}</span>     
                </v-btn>
                @if (Request::is('admin') || Request::is('admin/*'))
                    <v-btn 
                        flat 
                        color="white" 
                        class="link-href"
                        href="{{ url('admin') }}"
                    >
                        <v-icon color="#049bf6">home</v-icon>
                        &nbsp;
                        <span class="hidden-xs-only">Main</span>     
                    </v-btn>                    
                @else
                    <v-btn 
                        flat 
                        color="white" 
                        class="link-href"
                        href="{{ route('home') }}"
                    >
                        <v-icon color="#049bf6">home</v-icon>
                        &nbsp;
                        <span class="hidden-xs-only">Home</span>     
                    </v-btn>
                @endif                  
                <v-btn 
                    flat 
                    color="white" 
                    class="link-href" 
                    href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"                   
                >
                    <v-icon color="#049bf6">exit_to_app</v-icon>                 
                    &nbsp;
                    <span class="hidden-xs-only">{{ __('Logout') }}</span>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </v-btn>
            @endguest
        </v-toolbar-items>
    </v-toolbar>
    @if (Request::is('admin') || Request::is('admin/*'))
    <toolbar url="{{ url('/') }}"></toolbar>
@endif
</v-card>
