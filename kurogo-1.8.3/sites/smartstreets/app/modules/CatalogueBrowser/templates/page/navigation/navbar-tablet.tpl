{extends file="findExtends:common/templates/page/navigation/navbar.tpl"}

{capture name="kgoNavbarSearch" assign="kgoNavbarSearch"}
    {block name="kgoNavbarSearch"}
        <div class="search">
          <!-- Search Link -->
          <a href="search" title="Search Catalogues"><img src="/common/images/search.png" width="46" height="45" /></a>
        </div>
    {/block}
{/capture}

{block name="kgoNavbar"}
  <div id="navbar" class="searchon">
    <div class="breadcrumbs{if $isModuleHome} homepage{/if}">
      {$kgoNavbarHomelink}
      {$kgoNavbarBreadcrumbsHTML}
      {$kgoNavbarPagetitle}
    </div>
    {$kgoNavbarSearch}
    {$kgoNavbarHelp}
  </div>
{/block}

<!--
{block name="kgoNavbar"}
  <div id="navbar" class = "searchon" {if $hasHelp} class="searchon helpon"{/if}>
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
    {$kgoNavbarSearch}
    {$kgoNavbarHelp}
  </div>
{/block}
-->
