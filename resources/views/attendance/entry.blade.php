@extends('layouts.app')

@section('content')
<form method="POST" action="/attendance/entry">
    @csrf

    <label for="code">Kode Absensi (Masuk):</label>
    <input type="text" id="code" name="code">

    <button type="submit">Kirim</button>
</form>
@endsection
