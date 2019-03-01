<template>   
  <v-content>            
    <v-container fluid class="mpz">                        
      <v-layout 
        justify-center
        align-center
      >
        <v-flex text-xs-center xs12>
          <v-img 
              src="img/bg/main.png"
              lazy-src="img/bg/main.png"
          ></v-img>
          <v-img
            src="img/ani/logo.gif"
            lazy-src="img/ani/logo.gif"
            class="logo_ani"                           
          ></v-img>
        </v-flex>
      </v-layout>
      <v-layout 
        row
        justify-center
        align-center                        
      >
        <v-flex text-xs-center pa-5 xs12 sm10 md6 lg5
          justify-center
          align-center
        >  
          <v-img                           
            :src="`img/templates/template${carousel_picture}.jpg`"
            :lazy-src="`img/templates/template${carousel_picture}.jpg`"
            class="popup_view"                           
          ></v-img>
          <v-btn
            flat
            fab                                        
            class="link-href"
            @click.prevent="CarouselPictureBack"
            href = "#"
          >
            <v-icon color="#049bf6">arrow_back_ios</v-icon>
          </v-btn>
          <v-btn
            flat
            fab                                        
            class="link-href"
            @click.prevent="CarouselPictureForward"
            href = "#"
          >
            <v-icon color="#049bf6">arrow_forward_ios</v-icon>
          </v-btn>                            
        </v-flex>              
        <v-flex text-xs-center pa-5 xs12 sm10 md6 lg5>  
          <div>
            <span class="subheading">An age verification system, also known as an age gate, is a technical protection measure used to restrict access to digital content to those that are not appropriately-aged. These systems are used primarily to restrict access to content classified (either voluntarily or by local laws) as being inappropriate for users under a specific age, such as alcohol and tobacco advertising, internet pornography or other forms of adult-oriented content, video games with objectionable content, or to remain in compliance with online privacy laws that regulate the collection of personal information from children.</span>    
          </div>  
        </v-flex>  
      </v-layout>         
    </v-container> 
                <!-- <v-flex class="social_media_icons" text-xs-center xs12>                          
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
                    </v-flex>  -->
  </v-content>
</template>

<script>  
  export default {   
    data: () => ({
      carousel_picture: 1     
    }),
    props: ['url'],
    mounted: function() {
      this.url = this._props.url;      
    },
    methods: {
      CarouselPictureBack: function(){
        this.carousel_picture == 1 ? this.carousel_picture = 3 : this.carousel_picture -= 1;
      },
      CarouselPictureForward: function(){
        this.carousel_picture == 3 ? this.carousel_picture = 1 : this.carousel_picture += 1;
      }
    }
  }
</script>

<style>
[v-cloak] {
  display: none;
}

.popup_view{
  border-radius:15px;
  -webkit-box-shadow: 10px 10px 5px -5px rgba(0,0,0,0.5);
  -moz-box-shadow: 10px 10px 5px -5px rgba(0,0,0,0.5);
  box-shadow: 10px 10px 5px -5px rgba(0,0,0,0.5);
}




</style>
