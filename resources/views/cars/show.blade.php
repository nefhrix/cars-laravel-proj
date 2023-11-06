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
    
        <table class="table table-hover">
            <tbody>
                <tr>
                    <td><strong>Car Make</strong></td>
                    <td>{{ $cars->make}}</td>
                </tr>
                <tr>
                    <td><strong>Car Model</strong></td>
                    <td>{{ $cars->model}}</td>
                </tr>                 <tr>
                    <td><strong>Year of Production</strong></td>
                    <td>{{ $cars->year}}</td>
                </tr>                 <tr>
                    <td><strong>Colour</strong></td>
                    <td>{{ $cars->color}}</td>
                </tr> 
                        @if ($cars->car_image)
                            <img src="{{ $cars->car_image}}" alt="{{ $cars->title}}" width="100px" height="100px">
                        @else
                            Image coming soon
                        @endif
                    </td>
                </tr>
         
            </tbody>
        </table>
        <x-primary-button><a href="{{ route('cars.edit', $cars)}}">edit</a> </x-primary-button>
        <form action-"{{ route('cars.destroy', $cars)}}" method="post">
            @method('delete')
            @csrf
            <x-primary-button onclick="return confirm('you sure u wanna delete')">Delete </x-primary-button>
        </form>
        </div>
    </x-app-layout>
