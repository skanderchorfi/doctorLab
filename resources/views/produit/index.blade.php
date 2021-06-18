@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            @foreach($produits as $produit)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">{{$produit->nom}}<span class="badge badge-success float-right">{{ $produit->type }}</span></div>
                        <div class="card-body">
                            <img src="{{'/storage/produit/'. $produit->image }}" alt="" width="350px" height="300px">
                        </div>
                        <div class="card-footer" style="color: black">
                            {!! Str::limit($produit->description, 100, sprintf("<a href='%s'>...</a>", route('produit.show', ['produit' => $produit->id]))) !!}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
            </div>
        </div>
    </div>
@endsection
