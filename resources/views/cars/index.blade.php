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
                {{ __('All Cars for Sale') }}
            </h2>
        </x-slot>
    
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Make</th>
                    <th>Model</th>
                    <th>Year</th>
                    <th>Color</th>
                    <th>Image</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cars as $car)
                <tr>
                    <td><a href="{{ route('cars.show', $car) }}">{{ $car->make }}</a></td>
                    <td><a href="{{ route('cars.show', $car) }}">{{ $car->model }}</a></td>
                    <td>{{ $car->year }}</td>
                    <td>{{ $car->color }}</td>
                    <td>
                        @if ($car->car_image)
                            <img src="{{ $car->car_image }}" width="100px" height="100px" alt="Car Image">
                        @else
                            Image coming soon
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        </div>
    </x-app-layout>