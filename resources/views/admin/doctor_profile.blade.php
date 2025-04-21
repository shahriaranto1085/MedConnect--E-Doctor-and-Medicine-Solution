
@extends('admindash')

@section('content')
<div class="container">
    <h3>Doctor Profile: {{ $doctor->name }}</h3>
    
    <p><strong>Email:</strong> {{ $doctor->email }}</p>
    <p><strong>Degree:</strong> {{ $doctor->degree }}</p>
    <p><strong>Specialization:</strong> {{ $doctor->specialization }}</p>
    <p><strong>Workplace:</strong> {{ $doctor->worplc }}</p>
    
    <a href="{{ route('admin.doctors') }}" class="btn btn-primary">Back to Doctors</a>
</div>
@endsection
