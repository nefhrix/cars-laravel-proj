<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>Document</title>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('All manufacturers') }}
            </h2>
        </x-slot>
    
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Make</th>
                    <th>Model</th>
                    <th>Year</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($manufacturers as $manufacturer)
                <tr>
                    <td><a href="{{ route('admin.manufacturers.show', $manufacturer) }}">{{ $manufacturer->name }}</a></td>
                    <td><a href="{{ route('admin.manufacturers.show', $manufacturer) }}">{{ $manufacturer->phone_no }}</a></td>
                    <td>{{ $manufacturer->address }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        </div>
    </x-app-layout>