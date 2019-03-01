<template>
  <v-app>
    <v-data-table
      v-model="selected"
      :headers="headers"
      :items="obj_websites"
      :pagination.sync="pagination"
      select-all
      item-key="website_addr"
      class="elevation-4"
    >
      <template slot="headers" slot-scope="props">
        <tr>
          <th class="cya_hed white--text subheading"
            v-for="header in props.headers"
            :key="header.text"
            :class="['column sortable', pagination.descending ? 'desc' : 'asc', header.value === pagination.sortBy ? 'active' : '']"
            @click="changeSort(header.value)"          
          >        
            <v-icon v-if="header.value!=undefined" class="cya_c white--text">arrow_upward</v-icon>
            {{ header.text}}            
          </th>
        </tr>        
        <tr>
          <td colspan="5"></td>
          <td>
            <v-btn flat fab large title="Add" @click="addWebsite">
              <v-icon color="success">note_add</v-icon>
            </v-btn>
          </td> 
        </tr>
      </template>    
      <template slot="items" slot-scope="props">
        <tr>
          <td>{{ props.item.website_addr }}</td>
          <td>{{ props.item.age }}</td>
          <td>{{ props.item.session_timeout }}</td>
          <td v-if="props.item.type=='dob'">Date of Birth</td>
          <td v-else-if="props.item.type=='age'">Legal Age</td>
          <td>
            <v-img
              d-flex
              :src="`cache/${props.item.filename}`"
              :lazy-src="`cache/${props.item.filename}`"              
              class="m-1"
            ></v-img>
          </td>
          <td>
            <v-btn 
              flat 
              fab 
              large 
              title="Edit"
              class="link-href"
              @click.prevent="editWebsite(props.item.id)"
              href = "#"
            >
              <v-icon color="warning">edit</v-icon>
            </v-btn>
          </td>
          <td>
            <v-btn
              flat
              fab
              large
              title="Delete"
              class="link-href"
              @click.prevent="openDeleteWebsite(props.item.id)"
              href = "#"
            >
              <v-icon color="error">delete_forever</v-icon>
            </v-btn>
          </td>
          <td>       
            <v-btn 
              flat
              fab
              large
              title="Get Code"
              class="link-href"
              @click.prevent="getcodeWebsite(props.item.key)"
              href = "#"
            >
              <v-icon color="info">code</v-icon>
            </v-btn>           
          </td>
        </tr>
      </template> 
    </v-data-table>
    <v-dialog
      v-model="dialog_getcode"
      width="580"
    >  
      <v-card>
        <v-card-title
          class="cya_hed white--text headline"
        >
          <v-icon medium class="cya_c" color="white">code</v-icon>
          &nbsp;
          Get Code
        </v-card-title>
        <v-card-text class="subheading">
            Please copy and place this code on every page of your webite right after opening the &#60;body&#62; tag.
        <br>    
            To do so, you would usually place this code in header.html or header.php file.
        </v-card-text>
        <v-textarea         
          outline
          :value="key"            
          max-height="120" 
          no-resize     
          style="color:#435b71"               
        ></v-textarea>
        <v-divider></v-divider>  
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn           
            color="primary"
            flat
            @click="dialog_getcode = false"
          >
           <v-icon>cancel</v-icon>
            Close
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
    <v-dialog v-model="dialog_delete" persistent max-width="290">
      <!--v-btn slot="activator" color="primary" dark>Open Dialog</v-btn-->
      <v-card>
        <v-card-title        
          class="headline blue-grey lighten-4"
        >          
          Delete
        </v-card-title>
        <v-card-text>Are you sure you want to delete this entry?</v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>          
          <v-btn color="error" flat @click="deleteWebsite(id)">
            <v-icon>delete_forever</v-icon>
            Delete
          </v-btn>
          <v-btn flat @click="dialog_delete = false">
            <v-icon>cancel</v-icon>
            Cancel
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>   
  </v-app>   
</template>

<script>  
  export default {   
    data: () => ({
      dialog_delete: false,
      dialog_getcode: false,
      pagination: {
        sortBy: 'name'
      },
      selected: [],
      id: '',
      key: '',
      headers: [
        { text: 'Website', align: 'left', value: 'website_addr'},
        { text: 'Age', value: 'age' },
        { text: 'Session Timeout', value: 'session_timeout' },
        { text: 'Type', value: 'type' },
        { text: 'Picture', value: 'filename' },
        { text: 'Add/Edit'},
        { text: 'Delete'},
        { text: 'Get Code'},
      ],
      obj_websites: []
    }),
    props: ['url', 'username', 'websites'],
    mounted: function() {
      this.url = this._props.url;
      this.username = this._props.username;
      this.obj_websites = JSON.parse(this.websites);
    },
    methods: {
      addWebsite: function(){
        window.location.href = this.url + '/home/add';
      },
      editWebsite: function(val){
        window.location.href = this.url + '/home/edit/' + val;
      },
      openDeleteWebsite: function(val){
        this.dialog_delete = true;
        this.id = val        
      },
      deleteWebsite: function(val){
        axios({ 
          method: "POST",
          url: (this.url+"/destroy"),
          data: {
            'id': val,
          }
        })
        .then(result => {
          this.dialog_delete = false;
          location.reload();
        }, error => {
          console.error(error);
        }); 
      },
      getcodeWebsite: function(key){
        this.dialog_getcode = true;
        this.key = '<script src="' + this.url + '/cache/' + key +  '.js" type="text/javascript"><\/script>';
        
     //   this.key = '<script src="https://dev.aspirevapeco.com/cache/' + key +  '.js" type="text/javascript"><\/script>';
      },
      toggleAll () {
      if (this.selected.length) this.selected = []
      else this.selected = this.desserts.slice()
      },
      changeSort (column) {
        if (this.pagination.sortBy === column) {
          this.pagination.descending = !this.pagination.descending
        } else {
          this.pagination.sortBy = column
          this.pagination.descending = false
        }
      }
    }
  }
</script>

<style>
[v-cloak] {
  display: none;
}

.cya_bg{
  background-color: #0b2c5d;  
  color: #0b2c5d;
}

.cya_c{
  background-color: #049bf6;  
  color: #049bf6;
}

.cya_avc{
  background-color: #f37021;
  color:white;
}
.cya_hed{
  background-color:#1e6aad;
 /*background-color:#007ff2;*/
}



info--text {
    color: red !important;
    caret-color: #2196f3 !important;
}

</style>
