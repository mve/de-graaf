@extends('layouts.app')

@section('content')
    <div class="container" style="text-align: center;">
        <h1>Menu</h1>

        <div class="space space--50"></div>

        @foreach($mainCourses as $mainCourse)

            <h2>{{$mainCourse->name}}</h2>

            @foreach($subCourses as $subCourse)
                @if($subCourse->mainCourse->name === $mainCourse->name)

                    <h4>
                        {{ $subCourse->name }}
                    </h4>

                    @foreach ($products as $product)
                        @if($product->subCourse->name === $subCourse->name)

                            <div>
                                {{ $product->name }}
                                € {{ $product->price }} ,-
                            </div>

                        @endif

                    @endforeach

                    <div class="space space--10"></div>

                @endif
            @endforeach

            <div class="space space--40"></div>

        @endforeach


{{--        <h2>Hoofdgerechten</h2>--}}

{{--        @foreach($subCourses as $subCourse)--}}
{{--            @if($subCourse->mainCourse->name === 'Hoofdgerechten')--}}

{{--                <div>--}}
{{--                    {{ $subCourse->name }}--}}
{{--                </div>--}}

{{--            @endif--}}
{{--        @endforeach--}}

{{--        <h2>Nagerechten</h2>--}}

{{--        @foreach($subCourses as $subCourse)--}}
{{--            @if($subCourse->mainCourse->name === 'Nagerechten')--}}

{{--                <div>--}}
{{--                    {{ $subCourse->name }}--}}
{{--                </div>--}}

{{--            @endif--}}
{{--        @endforeach--}}

    </div>
@endsection
