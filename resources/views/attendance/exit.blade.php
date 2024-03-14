@extends('layouts.app')

@section('content')
<form method="POST" action="/attendance/exit">
    @csrf

    <label for="code">Kode Absensi (Keluar):</label>
    <input type="text" id="code" name="code">

    <button type="submit">Kirim</button>
</form>
@endsection
