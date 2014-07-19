{html_style}
#samlauth_wrap .samlauth { margin:0 2px; }
{/html_style}
  
<fieldset style="text-align:center;" id="samlauth_wrap">
  <legend>{'Or use single sign login'|@translate}</legend>
  {if $auth.connected}
    <a href="{$auth.login_link}">{'Single-Sign-Login'|@translate}</a>
  {else}
    <p>{'Please check SAMLAuth configuration.'|@translate}</p>
  {/if}
</fieldset>