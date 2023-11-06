
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>All Cars Avaliable</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Make</th>
                <th>Model</th>
                <th>Image</th>
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
                        No image
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection