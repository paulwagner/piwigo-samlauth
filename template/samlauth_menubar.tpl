{if $id == "mbIdentification" and isset($U_LOGIN)}
  {html_style}
  dl#mbIdentification dd:first-of-type { padding-bottom:0 !important; }
  #mbIdentification .oauth { margin:0 1px; }
  {/html_style}
  
  <dd>
    <form id="quickconnect">
    <fieldset style="text-align:center;">
      <legend>{'Or use single sign login'|@translate}</legend>
      {if $auth.connected}
        <a href="{$auth.login_link}">{'Single-Sign-Login'|@translate}</a>
      {else}
        <p>{'Please check SAMLAuth configuration.'|@translate}</p>
      {/if}
    
    </fieldset>
    </form>
  </dd>
{/if}