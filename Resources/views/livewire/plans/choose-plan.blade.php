{{--<tr>--}}
{{--     <div wire:loading wire:target="packages" class="sp sp-circle"></div>--}}
{{--    <td colspan="1"></td>--}}
{{--    @foreach ($plans as $plan)--}}
{{--    <td wire:click="upgrade('{{$plan}}')">--}}
{{--        @if ($plan != $currentPackage)--}}
{{--            <a href="javascript:void(0);" title="" class="button outline-primary"> Choose Plan</a>--}}
{{--        @else--}}
{{--            <a href="javascript:void(0);" title="" class="button primary"> Your Plan</a>--}}
{{--        @endif--}}
{{--    </td>--}}
{{--    @endforeach--}}
{{--</tr>--}}

<div>
    <div wire:loading wire:target="packages" class="sp sp-circle"></div>
    <div  wire:click="upgrade('{{$plan->key}}')">
        @if ($plan->key != $currentPackage)
            <a href="javascript:void(0);" title="" class="button outline-primary"> Choose Plan</a>
        @else
            <a href="javascript:void(0);" title="" class="button primary"> Your Plan</a>
        @endif
    </div>
</div>
