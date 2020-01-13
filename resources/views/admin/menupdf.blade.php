<html>
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <title>Faktuur</title>
    <style>
        * {
            padding: 0;
            margin: 0;
        }

        body {
            background-color: #f4efeb;
            font-family: 'Cardo', serif;
        }

        #bg {
            background-image: url('https://drive.google.com/uc?export=view&id=0B5eNVqX2nZE_ZTQwZTQ1WUZhNEk');
            background-repeat: no-repeat;
            background-position: 50% 0;
            -ms-background-size: cover;
            background-size: cover;
            height: 250px;
            max-width: 1152px;
        }

        .row {
            margin: 0 auto;
            max-width: 1152px;
        }

        #logo {
            max-width: 100%;
        }

        .secTitle {
            font-family: 'Alex Brush', cursive;
            font-size: 3em;
            font-weight: 500;
            color: #321602;
        }
        .subTitle {
            font-family: 'Alex Brush', cursive;
            font-size: 1.5em;
            font-weight: 500;
            color: #321602;
        }

        .dishName {
            font-weight: 600;
            font-variant: small-caps;
            font-size: 1.1em;
        }

        .dishDesc {
            font-size: .9em;
        }

        .price {
            text-align: left;
        }

        .add {
            text-align: right;
        }

        table {
            width: 100%;
        }


    </style>
</head>
<body>
<style>


</style>
<div class="container">
    <div class="row" id="bg">

    </div>
    <!--begin menu-->
    <div class="row margin-top">
        <div class="col-md-6">
            <!--left-hand column-->
            <div class="table-flexible"  style="padding-top: 300px">
                <table class="table borderless">
                    <tbody>
                    @foreach($mainCourses as $mainCourse)
                        <tr>

                            <td colspan="3" class="text-center" style="padding-left: 100px">
                                <span class="secTitle"> {{$mainCourse->name}}</span>
                            </td>
                        </tr>
                        @foreach($subCourses as $subCourse)
                            @if($subCourse->mainCourse->name === $mainCourse->name)
                                <tr>


                                    <td colspan="3" class="text-center"  style="padding-left: 100px">
                                        <span class="subTitle">{{$subCourse->name}}</span>
                                    </td>
                                </tr>
                                @foreach ($products as $product)
                                    @if($product->subCourse->name === $subCourse->name)
                                        <tr>


                                            <td  style="padding-left: 100px">
                                                <span class="dishName">{{ $product->name }}</span><br/>

                                            <td class="price"> € {{ \Illuminate\Support\Str::limit($product->price, 4, $end='.-') }}</td>
                                            </td>
                                        </tr>
                                    @endif

                                @endforeach
                            @endif
                        @endforeach

                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>


    </div>
</div>
