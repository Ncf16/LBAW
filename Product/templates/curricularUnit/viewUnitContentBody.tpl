{foreach from=$contents item=content}
<tr>
    <th scope="row">
        <a class="center-block requestItem">
            <a href="{$content.filepath}" target="_blank">Download:  {$content.filepresentationname}</a>
            <span class="hidden">{$content.filepath}</span>
        </a>

    </th>
    <td class="hue">
        <p>
            <a href="#" class="btn btn-danger btn-xs deleteContentBtn">
                <span class="glyphicon glyphicon-trash">
                <input type="hidden"  name="uploadid" value="{$content.uploadid}">
            </span>
            </a>


        </p>
    </td>
</tr>
{/foreach}