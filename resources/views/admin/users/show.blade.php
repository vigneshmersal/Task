<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			{{ __('User Details') }}
		</h2>
	</x-slot>

	<div class="py-12">
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

				@php
					$data = [
						'ID'      => $user->id,
						'Name'    => $user->name,
						'Email'   => $user->email,
						'Mobile'  => $user->mobile,
						'DOB'     => $user->dob,
						'Country' => $user->country,
					];
				@endphp

				<x-table.table>
					<x-table.tbody>
						@foreach ($data as $key => $val)
							<x-table.tr>
								<x-table.th>{{ $key }}</x-table.th>
								<x-table.td>{{ $val }}</x-table.td>
							</x-table.tr>
						@endforeach
					</x-table.tbody>
				</x-table.table>

				<form method="POST"
					action="{{ route('admin.users.destroy', $user) }}"
					onsubmit="confirm('Are You Sure?');" >
						@csrf
						@method('DELETE')
						<x-jet-button>{{ __('Delete') }}</x-jet-button>
				</form>

			</div>
		</div>
	</div>
</x-app-layout>
