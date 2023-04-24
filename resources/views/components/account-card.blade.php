@props(['account', 'href' => null, 'hasAvatar' => false])

<div class="py-5 px-4 flex rounded-lg text-white bg-gradient-to-tr from-primary-400 to-primary-600 dark:from-slate-900 dark:to-slate-600 w-full">
    <div class="flex-1">
        <div class="flex items-center gap-2">
            @if ($hasAvatar)
                <img class="object-cover mx-0 border-4 border-primary-300 rounded-full w-10 h-10" src="{{$account->user->avatar}}" alt="User photo" width="40" height="40">
            @endif
            <div>
                <h4>{{ucfirst($account->type)}} Account</h4>
                <p class="font-mono text-sm">{{$account->number}}</p>
            </div>
        </div>
        <p class="font-medium font-mono text-3xl my-2 tracking-wider">@money($account->balance, $account->currency)</p>
        <p class="text-sm text-primary-200 font-semibold">{{$account->name}}</p>
    </div>
    @if ($href)
    <div class="text-right">
        <a class="bg-primary-200 flex items-center justify-center rounded-full p-1 text-primary-600" href="{{$href}}"><span class="iconify w-6 h-6 ml-auto" data-icon="lucide:arrow-up-right"></span></a>
    </div>
    @endif
</div>



