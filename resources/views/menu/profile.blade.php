@extends('main')
@section('title', 'Laman Profil')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Laman Profil</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Pengaturan Profil</li>
        </ol>

        {{-- Card Profil --}}
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-user me-1"></i>
                {{ __('Profile Information') }}
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('profile.update') }}" class="mt-4">
                    @csrf
                    @method('patch')

                    <div class="mb-3">
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" name="name" type="text" class="form-control" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>

                    <div class="mb-3">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" name="email" type="email" class="form-control" :value="old('email', $user->email)" required autocomplete="username" />
                        <x-input-error class="mt-2" :messages="$errors->get('email')" />

                        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                            <div class="mt-3">
                                <p class="text-sm text-muted">
                                    {{ __('Your email address is unverified.') }}

                                    <button form="send-verification" class="btn btn-link p-0">
                                        {{ __('Click here to re-send the verification email.') }}
                                    </button>
                                </p>

                                @if (session('status') === 'verification-link-sent')
                                    <p class="mt-2 text-success">
                                        {{ __('A new verification link has been sent to your email address.') }}
                                    </p>
                                @endif
                            </div>
                        @endif
                    </div>

                    <div class="d-flex justify-content-between">
                        <x-primary-button class="btn btn-success">{{ __('Save') }}</x-primary-button>

                        @if (session('status') === 'profile-updated')
                            <p class="text-success" style="display: inline;">
                                {{ __('Saved.') }}
                            </p>
                        @endif
                    </div>
                </form>
            </div>
        </div>

        {{-- Card Password Update --}}
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-key me-1"></i>
                {{ __('Update Password') }}
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('password.update') }}" class="mt-4">
                    @csrf
                    @method('put')

                    <div class="mb-3">
                        <x-input-label for="update_password_current_password" :value="__('Current Password')" />
                        <x-text-input id="update_password_current_password" name="current_password" type="password" class="form-control" autocomplete="current-password" />
                        <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                    </div>

                    <div class="mb-3">
                        <x-input-label for="update_password_password" :value="__('New Password')" />
                        <x-text-input id="update_password_password" name="password" type="password" class="form-control" autocomplete="new-password" />
                        <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                    </div>

                    <div class="mb-3">
                        <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" />
                        <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="form-control" autocomplete="new-password" />
                        <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="d-flex justify-content-between">
                        <x-primary-button class="btn btn-success">{{ __('Save') }}</x-primary-button>

                        @if (session('status') === 'password-updated')
                            <p class="text-success" style="display: inline;">
                                {{ __('Saved.') }}
                            </p>
                        @endif
                    </div>
                </form>
            </div>
        </div>

    </div>
</main>
@endsection
