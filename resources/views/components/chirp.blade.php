@props(["chirp"])

<div class="card bg-base-100 shadow mt-8">
    <div class="card-body">
        <div class="flex items-center justify-between">
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
                        @if ($chirp->updated_at->gt($chirp->created_at->addSeconds(5)))
                            <span class="text-base-content/60">.</span>
                            <span class="text-sm text-base-content/60 italic">edited</span>
                        @endif
                    </div>
                    <div>s
                        {{ $chirp->message }}
                    </div>
                </div>
            </div>
            
            <div class="flex gap-1">
                <a href="{{ route("chirps.edit", $chirp->id) }}" class="btn btn-ghost btn-xs">
                    Edit
                </a>
                <form action="{{ route("chirps.destroy", $chirp->id) }}" method="post">
                    @csrf
                    @method("DELETE")
                    <button type="submit" onclick="return confirm('Are you sure you want to delete this chirp?')" class="btn btn-ghost btn-xs text-error">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>