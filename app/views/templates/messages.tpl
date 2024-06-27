{if $msgs->isError()}
    <div class="messages error">
        {foreach from=$msgs->getMessages() item=msg}
            {if $msg->type == 'error'}
                <p>{$msg->text}</p>
            {/if}
        {/foreach}
    </div>
{/if}

{if $msgs->isWarning()}
    <div class="messages warning">
        {foreach from=$msgs->getMessages() item=msg}
            {if $msg->type == 'warning'}
                <p>{$msg->text}</p>
            {/if}
        {/foreach}
    </div>
{/if}

{if $msgs->isInfo()}
    <div class="messages info">
        {foreach from=$msgs->getMessages() item=msg}
            {if $msg->type == 'info'}
                <p>{$msg->text}</p>
            {/if}
        {/foreach}
    </div>
{/if}
