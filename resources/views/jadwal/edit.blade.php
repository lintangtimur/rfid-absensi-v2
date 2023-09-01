@extends('adminlte::page')

@section('title', 'Jadwal Edit')

@section('content_header')
    <h1>Edit Jadwal</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            @if (session('msg'))
            <x-adminlte-alert theme="success" title="Success">
                {{session("msg")}}
            </x-adminlte-alert>
            @endif
            @if (session('error'))
            <x-adminlte-alert theme="danger" title="Success">
                {{session("error")}}
            </x-adminlte-alert>
            @endif

            {{-- With prepend slot --}}
            <form action="{{route("jadwal.update")}}" method="post">
                @csrf
                <input type="hidden" name="jadwal_id" value="{{$jadwal->id}}">
            <x-adminlte-input name="makul" label="Nama Mata Kuliah" value="{{old('makul',$jadwal->makul)}}" placeholder="makul">
            </x-adminlte-input>

            <x-adminlte-input name="jam_mulai" label="Jam Mulai" value="{{old('jam_mulai', $jadwal->jam_mulai)}}" id="jam_mulai">
            </x-adminlte-input>

            <x-adminlte-input name="jam_akhir" label="Jam Berakhir" value="{{old('jam_akhir',$jadwal->jam_akhir)}}" id="jam_akhir">
            </x-adminlte-input>

            <div class="form-group">
                <label for="makul" >Hari</label>
                <div class="input-group">
                    <select class="js-example-basic-single form-control" name="hari">
                        @foreach ($hari as $item)
                            @if ($jadwal->hari == $item)
                            <option selected value="{{$item}}">{{$item}}</option>    
                            @else
                            <option value="{{$item}}">{{$item}}</option>    
                            @endif
                            
                        @endforeach
                    </select>
                </div>    
            </div>



            <x-adminlte-button type="submit" label="Edit Jadwal" theme="primary" class="mb-4"/>
            
        </form>
        </div>

       
    </div>

    
    
@stop

@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@eonasdan/tempus-dominus@6.7.13/dist/css/tempus-dominus.min.css" crossorigin="anonymous">
@stop

@section('plugins.Datatables', true)
@section('js')
@vite('resources/js/siswa.js')

<script>
    // In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('.js-example-basic-single').select2();

});
</script>
    
@stop