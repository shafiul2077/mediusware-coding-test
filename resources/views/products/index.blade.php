@extends('layouts.app')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Products</h1>
    </div>


    <div class="card">
        <form action="" method="get" class="card-header">
            <div class="form-row justify-content-between">
                <div class="col-md-2">
                    <input type="text" name="title" placeholder="Product Title" class="form-control">
                </div>
                <div class="col-md-2">
                    <select name="variant" id="" class="form-control">

                    </select>
                </div>

                <div class="col-md-3">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Price Range</span>
                        </div>
                        <input type="text" name="price_from" aria-label="First name" placeholder="From" class="form-control">
                        <input type="text" name="price_to" aria-label="Last name" placeholder="To" class="form-control">
                    </div>
                </div>
                <div class="col-md-2">
                    <input type="date" name="date" placeholder="Date" class="form-control">
                </div>
                <div class="col-md-1">
                    <button type="submit" class="btn btn-primary float-right"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </form>

        <div class="card-body">
            <div class="table-response">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Variant</th>
                        <th width="150px">Action</th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach ($productShow as $key=>$data)

                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$data->title}}<br> Created at : {{$data->created_at}}</td>
                        <td>{{$data->description}}</td>

                        <td>
                            <dl class="row mb-0" style="height: 80px; overflow: hidden" id="variant">

                                <dt class="col-sm-3 pb-0">



                                    <table style="margin-right: 50px;">
                                    <thead>
                                        @foreach ($variantShow as $dataTwo)
                                        <tr>

                                             @if ($data->id == $dataTwo->product_id && ($dataTwo->variant_id == 1 || $dataTwo->variant_id == 2 || $dataTwo->variant_id == 3))
                                             <td >{{$dataTwo->variant}}/</td>

                                             @endif

                                        </tr>
                                        @endforeach

                                    </thead>
                                    </table>


                                </dt>
                                <dd class="col-sm-9">

                                  <dl class="row mb-0">
                                    @foreach ($productShowVariant as $dataOne)
                                    @if ($data->id == $dataOne->product_id )

                                      <small>  <table style="margin-left: 150px;">
                                            <thead>
                                                <tr>
                                                  <th class="col-sm-4 pb-0">Price : {{ $dataOne->price}}</th>
                                                  <th class="col-sm-8 pb-0">InStock : {{ number_format($dataOne->stock,2) }}</th>
                                                </tr>
                                            </thead>
                                            </table></small>
                                    @endif
                                    @endforeach
                                    </dl>

                                </dd>
                            </dl>
                            <button onclick="$('#variant').toggleClass('h-auto')" class="btn btn-sm btn-link">Show more</button>
                        </td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href=" {{--  {{ route('product.edit', 1) }} --}}" class="btn btn-success">Edit</a>

                            </div>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>


        </div>


        <div class="card-footer">
            <div class="row justify-content-between">
                <div class="col-md-6">
                    <p>Showing 1 to {{ $productShow->count() }} out of {{ $productShow->total() }}</p>
                </div>
                <div class="col-md-2">
                    {{ $productShow->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection
