<template>
	<v-toolbar
    height="28"        
    color="blue-grey lighten-4"
  > 
    <v-tabs       
      slot="extension"        
      color="transparent"
      fixed-tabs
      height="56"
      style="margin: -28px 0 0;"
      slider-color="#cfd8dc"  
      v-model="active"     
      active-class="default-class tab-link-href"
    >
      <!-- <v-tab 
        :to="{ path:  `/${url}'/admin/stat'`}"
        @click.prevent="getInfo('stat')"        
      >
        Received data
      </v-tab>
      <v-tab
        :to="{ path:  'admin/stor'}"
        @click.stop="getInfo('stor')"
      >
        Stored data
      </v-tab> -->

      <v-tab>
        <a 
          :href= "`${url}/admin/stat`" 
          flat 
          class="link-btn"
          id="toolbar_stat"
        >
          Received data
        </a>
      </v-tab>
      <v-tab>
        <a 
         :href= "`${url}/admin/stor`" 
          flat 
          class="link-btn"
          id="toolbar_stor"
        >
          Stored data
        </a>       
      </v-tab>
      <v-tab>
        <a 
         :href= "`${url}/admin/cache`" 
          flat 
          class="link-btn"
          id="toolbar_cache"
        >
          Cache
        </a>       
      </v-tab>





    </v-tabs>  
    
  </v-toolbar>    
</template>
  
<script>
  export default {
    data: () => ({
    currentUrl: '',    
		active: 0    
    }),
    props: ['url'],
    mounted: function() {
      this.url = this._props.url;
      this.currentUrl = window.location.pathname.split("/").pop();
      switch(this.currentUrl){
        case 'stat':
          document.getElementById('toolbar_stat').classList.add("link-btn-active");
        break;
        case 'stor':
          document.getElementById('toolbar_stor').classList.add("link-btn-active");
        break;
        case 'cache':
          document.getElementById('toolbar_cache').classList.add("link-btn-active");
        break;
        default:
          console.log('Nothing selected');
        break;
      }
      
      //console.log(this.currentUrl);
    }   
  }
</script>

<style>
[v-cloak] {
  display: none;
}
</style>
