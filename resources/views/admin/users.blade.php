@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <h1 class="text-3xl font-extrabold text-gray-900">Manage Users</h1>

    <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($users as $user)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            <span class="block">{{ $user->name }}</span>
                            <a href="{{ route('profile.show', ['username' => $user->username]) }}" class="text-xs font-semibold text-red-700 hover:underline">{{ '@'.$user->username }}</a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->email }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            <span class="px-2.5 py-1 text-xs font-semibold rounded-full {{ $user->role === 'admin' ? 'bg-red-100 text-red-800' : ($user->role === 'author' ? 'bg-rose-100 text-rose-800' : ($user->role === 'subscriber' ? 'bg-amber-100 text-amber-800' : 'bg-gray-100 text-gray-800')) }}">
                                {{ ucfirst($user->role) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <form action="{{ route('admin.users.role', $user) }}" method="POST" class="inline-flex items-center space-x-2">
                                @csrf
                                @method('PATCH')
                                <select name="role" class="text-xs border border-gray-300 rounded px-2 py-1">
                                    <option value="reader" {{ $user->role === 'reader' ? 'selected' : '' }}>Reader</option>
                                    <option value="subscriber" {{ $user->role === 'subscriber' ? 'selected' : '' }}>Subscriber</option>
                                    <option value="author" {{ $user->role === 'author' ? 'selected' : '' }}>Author</option>
                                    <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                </select>
                                <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded text-xs hover:bg-red-700">Update</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $users->links() }}
    </div>
</div>
@endsection
