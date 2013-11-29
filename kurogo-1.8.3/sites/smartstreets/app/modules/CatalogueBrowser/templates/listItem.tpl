<div class="lastUpdateLabel">
 {if isset($item['lastupdate'])}
      Last Updated: {$item['lastupdate']}
  {/if}
</div>
<span class="type-badge">{$item['type']}</span>
{capture name="listItemLabel" assign="listItemLabel"}

  {if isset($item['label'])}
    {if $boldLabels}
      <strong>
    {/if}
      <strong>Name: </strong> {$item['label']}{if $labelColon|default:false}: {/if}
    {if $boldLabels}
      </strong>
    {/if}
  {/if}
{/capture}
{block name="itemLink"}
  {if $item['url']}
    <a href="{$item['url']}" class="{$item['class']|default:''}"{if $linkTarget || $item['linkTarget']} target="{if $item['linkTarget']}{$item['linkTarget']}{else}{$linkTarget}{/if}"{/if}{if $item['onclick']}onclick="{$item['onclick']}"{/if}>
  {else}
    <span class="nolink">
  {/if}
    {if $item['img']}
      <img src="{$item['img']}" alt="{if $item['imgAlt']}{$item['imgAlt']}{/if}"
        {if $item['imgWidth']} width="{$item['imgWidth']}"{/if}
        {if $item['imgHeight']} height="{$item['imgHeight']}"{/if} />
    {/if}
    {$listItemLabel}

    {if isset($item['maintainer'])}
      <br><strong>Maintainer: </strong>{$item['maintainer']}
    {/if}
    {if $item['subtitle']}
      <br><strong>Description: </strong> {if $subTitleNewline|default:true}<div{else}&nbsp;<span{/if} class="smallprint">
        {$item['subtitle']}
      {if $subTitleNewline|default:true}</div>{else}</span>{/if}
    {/if}

  {if $item['url']}
    </a>
  {else}
    {if isset($item['itemSearchURL'])}
      <a class = "details_link" onclick="viewItemDetails(this)" data-search = {$item['itemSearchURL']} data-header = {$item['header']} data-key = {$item['key']}>View Details</a>
    {/if}
    {if $item['resourceURL']}
      <a class = "resource_link" onclick="viewItemResource(this)" data-search = {$item['resourceURL']} data-header = {$item['header']} data-key = {$item['key']} data-content = {$item['contentType']}>Download Resource</a>
    {/if}

    </span>
  {/if}
      {if isset($item['badge'])}
     <br><br><strong>Tags: </strong>
        {foreach $item['badge'] as $tag}
          <span class="badge" onclick="searchTag(this)" >{$tag}</span>
        {/foreach}
    {/if}
{/block}
