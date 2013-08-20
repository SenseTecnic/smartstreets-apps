{extends file="findExtends:common/templates/page/navigation/navbar.tpl"}

{block name="kgoNavbar"}

    {block name="kgoNavbarSearch"}
        <div class="search">
          <!-- Search Link -->
          <a href="search" title="Search Catalogues"><img src="/common/images/search.png" width="46" height="45" /></a>
        </div>
    {/block}
  <div id="navbar"{if $hasHelp} class="helpon"{/if}>
    {if isset($customNavmenuButton)}
      {$customNavmenuButton}
    {else}
      {include file="findInclude:common/templates/page/navigation/navmenuButton.tpl"}
    {/if}
    <div class="breadcrumbs{if $isModuleHome} homepage{/if}">
      {$kgoNavbarHomelink}
      {$kgoNavbarBreadcrumbsHTML}
      {$kgoNavbarPagetitle}
    </div>
    {include file="findInclude:common/templates/page/login.tpl"}
    {$kgoNavbarHelp}
  </div>
{/block}
