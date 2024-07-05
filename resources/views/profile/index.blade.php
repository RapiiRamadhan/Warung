@extends('layouts.app')

@section('content')
    <section class="profile">
        <div class="card">
            <div class="card-heading">
                <h2>Profile</h2>
            </div>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
        
            <p>Nama: {{ $user->name }}</p>
            <p>Email: {{ $user->email }}</p>
            <p>Nomor Hp: {{ $user->phone }}</p>
            <p>Alamat: {{ $user->address }}</p>
            <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>
        </div>
    </section>
@endsection
