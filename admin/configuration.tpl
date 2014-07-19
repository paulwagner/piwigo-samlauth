<h2>{'SAMLAuth Plugin Configuration'|@translate}</h2>

<p>
  {'Status of SimpleSAML connection'|@translate}:
  <br /><br />    
  {if (!{$AUTH_CONNECTED})}
  	<span style="color:red;">{'Not connected. Please check settings.'|@translate}</span>
  	<br />
  {else}
  	<span style="color:green;">{'Connected successfully.'|@translate}</span>
  	<br />  
  {/if}
</p>
  
<form method="post" action="{$PLUGIN_ACTION}" class="properties">

	<fieldset>
    <legend>{'SAML connection settings'|@translate}</legend>
    <ul>
    	<li>
    		<label>
          {'SimpleSAML base url'|@translate}:&nbsp;
    			<input size="50" type="text" id="base_path" name="BASE_PATH" value="{$BASE_PATH}" />
        </label>
        <br/><small>{'The path to the SimpleSAML SP directory. Can be absolute or relative. Default: /var/simplesaml/'|@translate}</small>      
        <br/><small style="color:red;">{'Add a trailing path seperator!'|@translate}</small>      
    	</li>
    	<li>
    		<label>
          {'SimpleSAML service point id'|@translate}:&nbsp;
    			<input size="20" type="text" id="sp_id" name="SP_ID" value="{$SP_ID}" />
        </label>
        <br/><small>{'Id of used service point. Default: default-sp'|@translate}</small>      
    	</li>
    </ul>
  </fieldset>
    
  <fieldset>
	 <legend>{'Metadata settings'|@translate}</legend>
    <ul>
    	<li>
    		<label>
          {'Attriute to be used as username'|@translate}
      		<input type="text" id="s_uid" name="S_UID" value="{$S_UID}" />
        </label>
        <br/><small>{'Attribute key of username (uid) in IDP metadata. Default: uid'|@translate}</small>      
    	</li>
    	<li>
    		<label>
          {'Attriute to be used as mail address'|@translate}
      		<input type="text" id="s_mail" name="S_MAIL" value="{$S_MAIL}" />
        </label>
        <br/><small>{'Attribute key of mail address in IDP metadata. Default: mail'|@translate}</small>      
    	</li>
  </fieldset>
    
  <fieldset>
    <legend>{'SAMLAuth configuration'|@translate}</legend>
    <ul>
  		<li>
  			<label>
    			<input type="checkbox" id="create_user" name="CREATE_USER" value="{$CREATE_USER}" {if $CREATE_USER }checked{/if} />			
    			{'Automatically create new piwigo users'|@translate}
        </label>
        <br/><small>{'Automatically create piwigo user with random password if authenticated username is not existing. Default: enabled'|@translate}</small>      
  		</li>
  		<li>
  			<label>
  			 <input type="checkbox" id="enable_debug" name="ENABLE_DEBUG" value="{$ENABLE_DEBUG}" {if $ENABLE_DEBUG }checked{/if} />			
  			 {'Enable verbose debug mode'|@translate}
        </label>
        <br/><small>{'Log debug messages. Logfile is stored at logs/logfile.txt. Default: disabled'|@translate}</small>      
  		</li>
    </ul>
  </fieldset>
 
  <p>
    <input type="submit" value="{'Save'|@translate}" name="save" />
  </p>
  
</form>

