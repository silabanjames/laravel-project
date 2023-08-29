{{-- alamat templates relative terhadap view --}}
@extends('layouts.main')
    
@section('container')
<h1>Halaman About</h1>
<h3> <?=$nama?> </h3>
<p> <?=$email?> </p>
<img src="images/{{ $image }}" alt="{{ $image }}" class="img-thumbnail rounded-circle" width="100">
@endsection