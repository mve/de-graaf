@extends('layouts.app')

@section('content')
    <div class="container" style="text-align: center; max-width: 600px;">
        <h1>Menu</h1>

        <div class="space space--50"></div>

        {{-- Loop door alle main courses.--}}
        @foreach($mainCourses as $mainCourse)
            <h2>
                {{$mainCourse->name}}
            </h2>
            {{-- Loop door alle sub courses--}}
            @foreach($subCourses as $subCourse)
                {{-- Toon alle subcourse die bij de huidige main course horen van de loop.--}}
                @if($subCourse->mainCourse->name === $mainCourse->name)
                    <h4>
                        {{ $subCourse->name }}
                    </h4>
                    {{-- Loop door alle products--}}
                    @foreach ($products as $product)
                        {{-- Toon alle products die bij de huidige sub course horen van de loop.--}}
                        @if($product->subCourse->name === $subCourse->name)
                            <div class="row" style="border-bottom: 1px solid #c9c9c9">
                                <div class="col-9">
                                    <span class="float-left">
                                    {{ $product->name }}
                                     </span>
                                </div>
                                <div class="col-3">
                                    <span class="float-right">
                                    € {{ $product->price }}
                                    </span>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    <div class="space space--10"></div>
                @endif
            @endforeach
            <div class="space space--40"></div>
        @endforeach

    </div>
@endsection
