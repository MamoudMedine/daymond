@extends('layouts.app')
@section('title', 'Aide')

@section('content')
    <div class="my-3"></div>
    <x-produits.section :title="'Aide DAYMOND'">
    </x-produits.section>
    <main class="width">
        <div>
            @forelse ($faqs as $faq)
                <div x-data="{isDown : false}" :class="{ 'bg-white': isDown == true }"  class=" cursor-pointer mb-3 p-3 rounded hover:bg-gray-50">
                    <div x-on:click="isDown = !isDown" class="flex-between-center">
                        <span>
                            {{$faq->question}}
                        </span>
                        <a x-show="isDown == false">
                            <i class="fas fa-chevron-down"></i>
                        </a>
                        <a x-show="isDown == true">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </div>
                    <div class="p-5" x-show="isDown == true">
                        {{$faq->reponse}}
                    </div>
                </div>
                <div class="h-0.5 w-full rounded bg-gray-200"></div>
            @empty
                <x-empty />
            @endforelse
        </div>
        <div class="my-96"></div>
</main>
@endsection
