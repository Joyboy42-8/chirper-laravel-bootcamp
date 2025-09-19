<x-layout>
    <x-slot:title>Register</x-slot:title>

    <div class="hero min-h-[calc(100vh-16rem)]">
        <div class="hero-content flex-col">
            <div class="card-body bg-white">
                <h1 class="text-3xl font-bold text-center mb-6">Create Account</h1>

                <form action={{ route("registered") }} method="post">
                    @csrf

                    {{-- Name --}}
                    <label class="floating-label mb-6">
                        <input type="text" name="name" placeholder="John Doe" value="{{ old("name") }}" class="input input-bordered @error("name")
                            input-error
                        @enderror">
                        <span>Name</span>
                    </label>
                    @error("name")
                        <div class="label -mt-4 mb-2">
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        </div>
                    @enderror

                    {{-- Mail --}}
                    <label class="floating-label mb-6">
                        <input type="email" name="email" placeholder="mail@example.com" value="{{ old("email") }}" class="input input-bordered @error("email")
                            input-error
                        @enderror">
                        <span>Email</span>
                    </label>
                    @error("email")
                        <div class="label -mt-4 mb-2">
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        </div>
                    @enderror

                    {{-- Password --}}
                    <label class="floating-label mb-6">
                        <input type="password" name="password" placeholder="........" value="{{ old("password") }}" class="input input-bordered @error("password")
                            input-error
                        @enderror">
                        <span>Password</span>
                    </label>
                    @error("password")
                        <div class="label -mt-4 mb-2">
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        </div>
                    @enderror

                    {{-- Confirmation Password --}}
                    <label class="floating-label mb-6">
                        <input type="password" name="password_confirmation" placeholder="........" value="{{ old("password") }}" class="input input-bordered">
                        <span>Confirm Password</span>
                    </label>

                    <div class="form-control mt-8">
                        <button type="submit" class="btn btn-primary btn-sm w-full">Register</button>
                    </div>

                    <div class="divider">OR</div>
                    <p class="text-center text-sm">
                        Already have an account ? 
                        <a href="{{ route("login") }}" class="link link-primary">Sign in</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</x-layout>