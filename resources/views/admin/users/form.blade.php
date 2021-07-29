<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			{{ __('User Details') }}
		</h2>
	</x-slot>

	<div class="py-12">
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			<div class="overflow-hidden shadow-xl sm:rounded-lg">

				@isset($user)
					<form method="POST" action="{{ route("admin.users.update", $user) }}">
						@method('PUT')
				@else
					<form method="POST" action="{{ route("admin.users.store") }}">
				@endisset
						@csrf

					<x-jet-form-section submit="updateProfileInformation">
						<x-slot name="title">
							{{ __('Profile Information') }}
						</x-slot>

						<x-slot name="description">
							{{ __('Update user profile information.') }}
						</x-slot>

						<x-slot name="form">

							<!-- Name -->
							<div class="col-span-6 sm:col-span-4">
								<x-jet-label class="required" for="name" value="{{ __('Name') }}" />
								<x-jet-input id="name" type="text" name="name"
									value="{{ old('name', $user->name ?? null) }}"
									class="mt-1 block w-full" autocomplete="name" required />
								<x-jet-input-error for="name" class="mt-2" />
							</div>

							<!-- Email -->
							<div class="col-span-6 sm:col-span-4">
								<x-jet-label class="required" for="email" value="{{ __('Email') }}" />
								<x-jet-input id="email" type="email"
									value="{{ old('email', $user->email ?? null) }}"
									class="mt-1 block w-full" name="email" required />
								<x-jet-input-error for="email" class="mt-2" />
							</div>

							<!-- Password -->
							<div class="col-span-6 sm:col-span-4">
								<x-jet-label for="password" value="{{ __('Password') }}" />
								<x-jet-input id="password" type="password"
									value="{{ old('password') }}"
									class="mt-1 block w-full" name="password" />
								<x-jet-input-error for="password" class="mt-2" />
							</div>

							<!-- Mobile -->
							<div class="col-span-6 sm:col-span-4">
								<x-jet-label class="required" for="mobile" value="{{ __('Mobile') }}" />
								<x-jet-input id="mobile" type="text"
									value="{{ old('mobile', $user->mobile ?? null) }}"
									class="mt-1 block w-full" name="mobile" required />
								<x-jet-input-error for="mobile" class="mt-2" />
							</div>

							<!-- Dob -->
							<div class="col-span-6 sm:col-span-4">
								<x-jet-label for="dob" value="{{ __('DOB') }}" />
								<x-jet-input id="dob" type="text"
									value="{{ old('dob', $user->dob ?? null) }}"
									class="mt-1 block w-full date" name="dob" />
								<x-jet-input-error for="dob" class="mt-2" />
							</div>

							<!-- Country -->
							<div class="col-span-6 sm:col-span-4">
								<x-jet-label for="country" value="{{ __('Country') }}" />
								<x-jet-input id="country" type="text"
									value="{{ old('country', $user->country ?? null) }}"
									class="mt-1 block w-full" name="country" />
								<x-jet-input-error for="country" class="mt-2" />
							</div>
						</x-slot>

						<x-slot name="actions">
							<x-jet-button>{{ __('Save') }}</x-jet-button>
						</x-slot>
					</x-jet-form-section>

				</form>

			</div>
		</div>
	</div>
</x-app-layout>
