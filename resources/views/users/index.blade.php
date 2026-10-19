@extends('layouts.app')
@section('title', 'Pengguna')
@section('content')
<h1>Manajemen Pengguna (Admin)</h1>
<form method="POST" action="{{ route('users.store') }}">@csrf
<label>Username</label><input name="username" required>
<label>Password (minimal 5 karakter)</label><input type="password" name="password" required>
<label>Role</label><select name="role"><option value="staff">Staff</option><option value="admin">Admin</option></select>
<p><button>Tambah pengguna</button></p>
</form>
<table><thead><tr><th>Username</th><th>Role</th><th>Dibuat</th></tr></thead><tbody>
@foreach($users as $user)<tr><td>{{ $user->username }}</td><td>{{ strtoupper($user->role) }}</td><td>{{ $user->created_at }}</td></tr>@endforeach
</tbody></table>{{ $users->links() }}
@endsection
