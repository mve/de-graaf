@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>Nieuw gerecht</h1>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row">
            <form class="col-md-12" method="post">
                @csrf


                <div class="form-group">
                    <h3>Subgang</h3>
                    <select  id="subcourse" name="subcourse" class="w-100">
                        @foreach($subCourses as $subCourse)
                            <option value="{{$subCourse->id}}">{{$subCourse->name}}</option>
                        @endforeach

                    </select>
                </div>
                <div class="form-group">
                    <h3>Naam</h3>
                    <input class="form-control" id="name" name="name" type="text" >
                </div>
                <div class="form-group">
                    <h3>Prijs</h3>
                    <input class="form-control" id="price" name="price" type="text" >
                </div>



                <button type="submit" class="btn btn-primary">Opslaan</button>
            </form>
        </div>

    </div>
@endsection
