<x-layout>
    <x-slot:title>Welcome</x-slot:title>
    <div class="max-w-2xl mx-auto">
        <div class="card bg-base-100 shadow">
            <div class="card-body">
                <form action={{ route("chirps.store") }} method="POST">
                    @csrf
                    <div class="form-control w-full">
                        <textarea name="message" rows="4" class="@error("message") textarea-error @enderror textarea textarea-bordered w-full" placeholder="What's on your mind ?"></textarea>
                        @error('message')
                            <div class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>
                    <div class="mt-4 flex items-center justify-end">
                        <button type="sumbit" class="btn btn-primary btn-sm">Chirp</button>
                    </div>
                </form>
            </div>
        </div>

        <h1 class="font-bold text-4xl mt-8 mb-2">Latest Chirps</h1>

        @forelse ($chirps as $chirp)
            <x-chirp :chirp="$chirp" />
        @empty
            <p class="text-gray-500">No Chirps yet. Be the first to chirp !</p>
        @endforelse
    </div>
</x-layout>