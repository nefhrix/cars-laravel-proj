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
                {{ __('All Cars for Sale') }}
            </h2>
        </x-slot>
    
        <table class="table table-bordered table-hover">
            <tbody>
                <tr>
                    <td class="bg-light"><strong>Car Make</strong></td>
                    <td>{{ $cars->make }}</td>
                </tr>
                <tr>
                    <td class="bg-light"><strong>Car Model</strong></td>
                    <td>{{ $cars->model }}</td>
                </tr>
                <tr>
                    <td class="bg-light"><strong>Year of Production</strong></td>
                    <td>{{ $cars->year }}</td>
                </tr>
                <tr>
                    <td class="bg-light"><strong>Colour</strong></td>
                    <td>{{ $cars->color }}</td>
                </tr>
                <tr>
                    <td class="bg-light"><strong>Manufacturer</strong></td>
                    <td>{{ $cars->manufacturer->name }}</td>
                </tr>
                <tr>
                    <td colspan="2">
                        @if ($cars->car_image)
                            <img src="{{ asset($cars->car_image) }}" class="img-fluid" alt="Car Image">
                        @else
                            Image coming soon
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
        
        
        <x-primary-button><a href="{{ route('admin.cars.edit', $cars)}}">edit</a> </x-primary-button>
        <form action-"{{ route('admin.cars.destroy', $cars)}}" method="post">
            @method('delete')
            @csrf
            <x-primary-button onclick="return confirm('you sure u wanna delete')">Delete </x-primary-button>
        </form>
        </div>
    </x-app-layout>
