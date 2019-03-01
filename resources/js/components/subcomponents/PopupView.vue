<template>
	<div>
		<div 
			v-if="info.select_type=='dob'" 
			class="aspire_modal_content" 
			:style="`background-color:${info.bg_color};  ${info.styl}`"
		>
			<div class="aspire_modal_header">
				<h2 class="avc_modal_title">{{info.header}}</h2>
			</div>
			<div class="aspire_modal_body">
				<p class="aspire_modal_content_text">
					{{info.text}}
				</p>
				<div class="circle-loader avc_disabled">
					<div class="checkmark draw avc_disabled"></div>
				</div>
				<div class="aspire_modal_buttons">
					<p class="aspire_modal_content_text">
						<strong>{{info.hint}}</strong>
					</p>
					<input type="text" class="aspire_dateof" placeholder="MM">
					<input type="text" class="aspire_dateof" placeholder="DD">
					<input type="text" class="aspire_dateof" placeholder="YYYY">
					<br>
					<div v-if="info.terms_conditions!=='-'">
						<v-textarea 
							class="aspire_tc" 
							solo
							flat
							no-resize
							style="background-color:white; padding:20px 0; height:120px; margin:6px 0" 
							height="32"
							readonly  
							:value="info.terms_conditions"
						></v-textarea>				
						<label class="aspire_checkbox_container">
							<input type="checkbox">
							<span class="aspire_checkmark"></span>I have read and agree
						</label>
					</div>
					<button class="aspire_modal_button aspire_modal_cancel">
						{{info.cancel_btn_text}}
					</button>
					<button class="aspire_modal_button aspire_modal_confirm">
						{{info.enter_btn_text}}
					</button>
					<div id="aspire_open_modal" class="aspire_modal_dialog">
						<div>
							<a href="#aspire_close_modal" title="Close" class="aspire_close_modal">X</a>
							<textarea class="aspire_info_description" readonly>Description</textarea>
							<div><a href="https://google.com" target="_blank">Redirect URL</a></div>
							<div><a href="https://google.com" target="_blank">Reject URL</a></div>
						</div>
					</div>					
				</div>
			</div>
		</div>
		<div 
			v-if="info.select_type=='age'" 
			class="aspire_modal_content" 
			:style="`background-color:${info.bg_color};  ${info.styl}`"
		>
			<div class="aspire_modal_header">
				<h2 class="avc_modal_title">{{info.header}}</h2>
			</div>
			<div class="aspire_modal_body">
				<p class="aspire_modal_content_text">
					{{info.text}}
				</p>
				<div class="circle-loader avc_disabled">
					<div class="checkmark draw avc_disabled"></div>
				</div>
				<div class="aspire_modal_buttons">
					<p class="aspire_modal_content_text">
						<strong>{{info.hint}}</strong>
					</p>
					<div v-if="info.terms_conditions!=='-'">
						<v-textarea
							class="aspire_tc"					
							solo
							flat
							no-resize
							style="background-color:white; padding:20px 0; height:120px; margin:6px 0;" 
							height="32"
							readonly  		
							:value="info.terms_conditions"				
						></v-textarea>	
						<label class="aspire_checkbox_container">
							<input type="checkbox">
							<span class="aspire_checkmark"></span>I have read and agree
						</label>
					</div>
					<button class="aspire_modal_button aspire_modal_cancel">
						{{info.cancel_btn_text}}
					</button>
					<button class="aspire_modal_button aspire_modal_confirm">
						{{info.enter_btn_text}}
					</button>
					<div id="aspire_open_modal" class="aspire_modal_dialog">
						<div>
							<a href="#aspire_close_modal" title="Close" class="aspire_close_modal">X</a>
							<textarea class="aspire_info_description" readonly>Description</textarea>
							<div><a href="https://google.com" target="_blank">Redirect URL</a></div>
							<div><a href="https://google.com" target="_blank">Reject URL</a></div>
						</div>
					</div>	
				</div>
			</div>
		</div>
	</div>
</template>

<script>
  export default {
    data: () => ({      
    }),
    props: ['info'],
  }
</script>

<style>
@import "https://dev.aspirevapeco.com/templates/avc1/dob/default.css";

[v-cloak] {
  display: none;
}

.img-mode{
  cursor: pointer;
  margin: 4px 4px 50px 4px;
}
</style>
