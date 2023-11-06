<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('All Cars for Sale') }}
            </h2>
        </x-slot>
    
        <table class="table-fixed">
            <thead>
                <tr>
                    <th>Make</th>
                    <th>Model</th>
                    <th>Year</th>
                    <th>Color</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cars as $car)
                <tr>
                    <td>{{ $car->make}}</td>
                    <td>{{ $car->model}}</td>
                    <td>{{ $car->year}}</td>
                    <td>{{ $car->color}}</td>
                    <td>
                        @if ($car->car_image)
                            <img src="{{ $car->car_image}}" alt="{{ $car->title}}" width="100px" height="100px">
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