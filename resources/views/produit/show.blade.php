@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        {{ $produit->nom }}
                        <div class="float-right">{{ $produit->type }}</div>
                    </div>
                    <div class="card-body" style="color: black">
                        {{ $produit->description }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
