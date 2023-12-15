<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('All manufacturers') }}
            </h2>
        </x-slot>
    
        <table class="table table-bordered table-hover">
            <tbody>
                <tr>
                    <td class="bg-light"><strong>Name</strong></td>
                    <td>{{ $manufacturer->name }}</td>
                </tr>
                <tr>
                    <td class="bg-light"><strong>phone_no</strong></td>
                    <td>{{ $manufacturer->phone_no }}</td>
                </tr>
                <tr>
                    <td class="bg-light"><strong>address</strong></td>
                    <td>{{ $manufacturer->address }}</td>
                </tr>
            </tbody>
        </table>
        
        
        <x-primary-button><a href="{{ route('admin.manufacturers.edit', $manufacturer)}}">edit</a> </x-primary-button>
        <form action-"{{ route('admin.manufacturers.destroy', $manufacturer)}}" method="post">
            @method('delete')
            @csrf
            <x-primary-button onclick="return confirm('you sure u wanna delete')">Delete </x-primary-button>
        </form>
        </div>
    </x-app-layout>
