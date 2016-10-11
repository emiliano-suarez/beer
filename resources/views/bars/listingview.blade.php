<tr id="bar-{{ $bar->id }}">
    <td class="list-elem-thumb">  
        <a href="/bar/{{ $bar->slug }}">
            <img src="{{ $bar->photo_url }}" />
        </a>
    </td>
    <td class="list-elem-text">
        <a href="/bar/{{ $bar->slug }}">{{ $bar->name }}</a>
    </td>
    <td class="list-elem-ico">
        <div class="ui-icon ui-icon-arrow-r ui-icon-shadow">&nbsp;</div>
    </td>
</tr>
