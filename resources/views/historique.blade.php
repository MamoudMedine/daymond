@extends('layouts.app')

@section('content')
    <x-produits.section :title="'Historique'">
        @forelse ($historiques as $historique)
            <x-produits.card :produit="$historique->produit" :key="$historique->id.time()"/>
        @empty
            <x-empty />
        @endforelse
    </x-produits.section>
    <div class="my-96"></div>
@endsection
