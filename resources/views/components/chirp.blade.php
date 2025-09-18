@props(["chirp"])

<div class="card bg-base-100 shadow mt-8">
    <div class="card-body">
        <div class="flex items-center space-x-3">
            @if ($chirp->user)
                <div class="avatar">
                    <div class="size-10 rounded-full">
                        <img src="https://avatars.laravel.cloud/{{ urlencode($chirp->user->email) }}?vibe=ocean"
                            alt="{{ $chirp->user->name }}'s avatar" class="rounded-full" />
                    </div>
                </div>
            @else
                <div class="avatar placeholder">
                    <div class="size-10 rounded-full">
                        <img src="https://avatars.laravel.cloud/f61123d5-0b27-434c-a4ae-c653c7fc9ed6?vibe=stealth"
                            alt="Anonymous User" class="rounded-full" />
                    </div>
                </div>
            @endif

            <div class="flex flex-col gap-2">
                <div class="font-semibold">
                    {{ $chirp->user ? $chirp->user->name : "Anonymous" }} 
                    <span class="text-gray-500 text-sm">. {{ $chirp->created_at->diffForHumans() }}</span>
                </div>
                <div>
                    {{ $chirp->message }}
                </div>
            </div>
        </div>
    </div>
</div>