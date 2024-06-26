{if $msgs->isMessage()}
    <div class="messages">
        {if $msgs->isInfo()}
            <ul class="info">
                {foreach $msgs->getMessages() as $msg}
                    {if $msg->type == 'info'}
                        <b>{$msg->text}</b>
                    {/if}
                {/foreach}
            </ul>
        {/if}
        {if $msgs->isWarning()}
            <ul class="warning">
                {foreach $msgs->getMessages() as $msg}
                    {if $msg->type == 'warning'}
                        <li>{$msg->text}</li>
                    {/if}
                {/foreach}
            </ul>
        {/if}
        {if $msgs->isError()}
            <ul class="error">
                {foreach $msgs->getMessages() as $msg}
                    {if $msg->type == 'error'}
                        <li>{$msg->text}</li>
                    {/if}
                {/foreach}
            </ul>
        {/if}
    </div>
{/if}
