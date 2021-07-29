<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			{{ __('Users') }}
		</h2>

		<x-jet-nav-link
			href="{{ route('admin.users.create') }}"
			class="btn text-indigo-500">
				{{ __('Create User') }}
		</x-jet-nav-link>
	</x-slot>

	<div class="py-12">
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

				<form method="GET" action="{{ route("admin.users.index") }}">
					<div class="col-span-6 sm:col-span-4 gap-1 inline-flex">
						<x-jet-input type="text" name="search" class="mt-1 block"
							value="{{ request('search') }}" />
						<x-jet-button>{{ __('Search') }}</x-jet-button>
					</div>
				</form>

				<x-table.table>
					<x-table.thead :headers="$headers"></x-table.thead>

					<x-table.tbody>
						@foreach($users as $user)
							<x-table.tr>
								<x-table.td>{{ $user->id }}</x-table.td>
								<x-table.td align="center">{{ $user->name }}</x-table.td>
								<x-table.td align="center">{{ $user->email }}</x-table.td>
								<x-table.td align="center">{{ $user->mobile }}</x-table.td>
								<x-table.td align="right">
									<x-jet-nav-link
										href="{{ route('admin.users.show', $user) }}"
										class="text-indigo-500">
											{{ __('View') }}
									</x-jet-nav-link>

									<x-jet-nav-link
										href="{{ route('admin.users.edit', $user) }}"
										class="text-green-500">
											{{ __('Edit') }}
									</x-jet-nav-link>
								</x-table.td>
							</x-table.tr>
						@endforeach
					</x-table.tbody>
				</x-table.table>

				{!! $users->links() !!}

			</div>
		</div>
	</div>
</x-app-layout>
