<x-layout>
    <x-slot:title>Edit Chirp</x-slot:title>

    <div class="max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold mt-8">Edit Chirp</h1>

        <div class="card bg-base-100 shadow mt-8">
            <div class="card-body">
                <form action={{ route("chirps.update", $chirp->id) }} method="post">
                    @csrf
                    @method("PUT")

                    <div class="form-control w-full">
                        <textarea name="message" rows="4" class="@error("message") textarea-error @enderror textarea textarea-bordered w-full" placeholder="What's on your mind ?">
                            {{ old("message", $chirp->message) }}
                        </textarea>
                        @error('message')
                            <div class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>
                    <div class="card-actions justify-between mt-4">
                        <a href={{ route("chirps.index") }} class="btn btn-ghost btn-sm">Cancel</a>
                        <button type="sumbit" class="btn btn-primary btn-sm">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>