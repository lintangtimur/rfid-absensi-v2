@extends('adminlte::page')

@section('title', 'Edit Siswa')

@section('content_header')
    <h1>Edit Siswa</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">

            {{-- With prepend slot --}}
            <form action="{{route("siswa.update")}}" method="post">
                @csrf
            <x-adminlte-input name="nama" label="Nama Siswa" value="{{$siswa->nama}}" placeholder="nama">
            </x-adminlte-input>

            {{-- With append slot, number type and sm size --}}
            <x-adminlte-input name="rfid" label="RFID" readonly placeholder="number" type="number"
                igroup-size="sm" value="{{$siswa->rfid}}">
                <x-slot name="appendSlot">
                    <div class="input-group-text bg-dark">
                        <i class="fas fa-hashtag"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>


            {{-- With extra information on the bottom slot --}}
            <x-adminlte-input name="nim" value="{{$siswa->nim}}" label="NIM" placeholder="nim">
                
            </x-adminlte-input>

            <x-adminlte-button type="submit" label="Edit" theme="primary" class="mb-4"/>
            
        </form>

        </div>
    </div>

    
    
@stop

@section('css')
    
@stop
@section('plugins.Datatables', true)
@section('js')

    
@stop