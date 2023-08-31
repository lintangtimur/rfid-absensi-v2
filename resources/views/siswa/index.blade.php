@extends('adminlte::page')

@section('title', 'Siswa')

@section('content_header')
    <h1>Siswa</h1>
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
            <form action="{{route("siswa.add")}}" method="post">
                @csrf
            <x-adminlte-input name="nama" label="Nama Siswa" placeholder="nama">
            </x-adminlte-input>

            {{-- With append slot, number type and sm size --}}
            <x-adminlte-input name="rfid" label="RFID" placeholder="number" type="number"
                igroup-size="sm">
                <x-slot name="appendSlot">
                    <div class="input-group-text bg-dark">
                        <i class="fas fa-hashtag"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>


            {{-- With extra information on the bottom slot --}}
            <x-adminlte-input name="nim" label="NIM" placeholder="nim">
                
            </x-adminlte-input>

            <x-adminlte-button type="submit" label="Add" theme="primary" class="mb-4"/>
            
        </form>

{{-- Setup data for datatables --}}
@php
$heads = [
    'RFID',
    'Nama',
    ['label' => 'NIM', 'width' => 40],
    ['label' => 'Actions', 'no-export' => true, 'width' => 10],
];

@endphp

{{-- Minimal example / fill data using the component slot --}}
<x-adminlte-datatable id="table1" :heads="$heads">
    @foreach ($siswas as $item)
    <tr>
        <td>{{$item->rfid}}</td>
        <td>{{$item->nama}}</td>
        <td>{{$item->nim}}</td>
        <td><a href="{{URL::signedRoute("siswa.edit", $item->id)}}" class="btn btn-primary">Edit</a></td>
    </tr>
@endforeach
</x-adminlte-datatable>
    
        </div>
    </div>

    
    
@stop

@section('css')
    
@stop
@section('plugins.Datatables', true)
@section('js')

    
@stop