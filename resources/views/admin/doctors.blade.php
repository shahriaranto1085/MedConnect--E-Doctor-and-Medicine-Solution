

@if(!session('admin'))
    <script>
        alert('Unauthorized access. Redirecting...');
        window.location.href = "{{ route('admin') }}";
    </script>
@endif

@extends('admindash')

@section('content')
<div class="container">
    <h2 class="mb-4">Unverified Doctors</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Degree</th>
                <th>Specialization</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($doctors as $doc)
            <tr>
                <td>{{ $doc->name }}</td>
                <td>{{ $doc->email }}</td>
                <td>{{ $doc->degree }}</td>
                <td>{{ $doc->specialization }}</td>
                <td>
                    <a href="{{ route('admin.accept', $doc->email) }}" class="btn btn-success btn-sm">Accept</a>
                    <a href="{{ route('admin.delete', $doc->email) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                    <a href="{{ route('admin.profile', $doc->email) }}" class="btn btn-info btn-sm">Profile</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
