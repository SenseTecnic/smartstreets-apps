<div class="lastUpdateLabel">
 {if isset($item['lastupdate'])}
      Last Updated: {$item['lastupdate']}
  {/if}
</div>

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

    {if $titleTruncate}
      {$item['title']|truncate:$titleTruncate}
    {else}
      {$item['title']}
    {/if}
    {if $item['subtitle']}
      <br><strong>Description: </strong> {if $subTitleNewline|default:true}<div{else}&nbsp;<span{/if} class="smallprint">
        {$item['subtitle']}
      {if $subTitleNewline|default:true}</div>{else}</span>{/if}
    {/if}

   {if $item['badge']!=""}
   <br><br><strong>Tags: </strong>
      {foreach $item['badge'] as $tag}
        <span class="badge">{$tag}</span>
      {/foreach}
   {/if}
  {if $item['url']}
    </a>
  {else}
    <a class = "details_link" onclick="viewItemDetails(this)" data-search = {$item['itemSearchURL']}>View Details</a>
    {if $item['resourceURL']}
      <a class = "resource_link" href="{$item['resourceURL']}">Download Resource</a>
    {/if}
    </span>
  {/if}
{/block}
