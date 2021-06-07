<div class="pb-96">
    <div class="py-10">
        <x-section :title="'Diffusions'">
            @forelse ($diffusions as $diffusion)
                <div x-data="{isDown:false}" class="w-full mb-3 p-3 rounded-lg bg-white hover:bg-gray-50">
                    <div x-on:click="isDown = !isDown" class="flex mb-3 p-3 rounded-lg hover:bg-gray-50">
                        <img src="/images/logo.png" alt="" class="border-2 border-primary w-24 h-24 object-cover rounded-full shadow">
                        <div class="pl-2 py-2 w-full flex flex-col justify-between">
                            <div class="flex-between-center">
                                <span class="text-lg font-semibold">
                                    @if ($diffusion->admin)
                                        {{$diffusion->admin->name}}
                                    @else
                                        {{$diffusion->type_diffusion->nom}}
                                    @endif
                                </span>
                                <div>
                                    <span class="ml-auto text-sm">
                                        {{$diffusion->created_at->diffForHumans()}}
                                    </span>
                                    <div class="mx-auto flex justify-center p-3 rounded-full hover:bg-gray-100">
                                        <div x-show="isDown == false">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                        </div>
                                        <div x-show="isDown == true">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="my-1">
                                @if ($diffusion->admin)
                                    {{$diffusion->texte}}
                                @else
                                    {{$diffusion->texte}}
                                @endif
                            </div>
                        </div>
                    </div>
                    <div x-show="isDown == true" class="w-full">
                        @if ($diffusion->media)
                            @if ($diffusion->media->type == 'video')
                                <video id="player" playsinline controls data-poster="/images/logo.png" class="rounded-sm w-full">
                                    <source src="{{$diffusion->media->src}}" type="video/mp4" />
                                </video>
                            @endif
                            @if ($diffusion->media->type == 'image')
                                <div class="flex justify-center">
                                    {{-- <img src="{{$diffusion->media->src}}" class="w-full h-auto block" alt=""> --}}
                                    <img src="/images/logo.png" class="w-full h-auto block" alt="">
                                </div>
                            @endif
                            @if ($diffusion->media->type == 'audio')
                                <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
                                <div class="player mx-auto">
                                    <div class="titles">
                                    </div>
                                    <ul>
                                        <div class="bubble-arrow alt"></div>
                                        <li class="cover">
                                            <img src="images/logo.png"/>
                                        </li>
                                        <li class="button-items">
                                            <audio id="music" preload="auto" loop="false">
                                                <source src="{{$diffusion->media->src}}" type="audio/mp3">
                                            </audio>
                                            <div class="audio-group">
                                                <div class="controls">
                                                    <span id="play">
                                                        <i class="material-icons">play_arrow</i>
                                                    </span>
                                                    <span id="pause">
                                                        <i class="material-icons">pause</i>
                                                    </span>
                                                </div>
                                                <div id="slider-timer">
                                                    @if ($diffusion->type_diffusion)
                                                        <h1>
                                                            <!-- Homage <small>-  Dioula</small> -->
                                                            {{$diffusion->type_diffusion->nom}}
                                                        </h1>
                                                    @endif
                                                    <div id="slider">
                                                        <div id="elapsed">
                                                        <span></span>
                                                    </div>
                                                    <div class="times">
                                                        <p id="timer">0:00</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <script>
                                    var music = document.getElementById("music");
                                    var playButton = document.getElementById("play");
                                    var pauseButton = document.getElementById("pause");
                                    var playhead = document.getElementById("elapsed");
                                    var timeline = document.getElementById("slider");
                                    var timer = document.getElementById("timer");
                                    var duration;
                                    pauseButton.style.visibility = "hidden";

                                    var timelineWidth = timeline.offsetWidth - playhead.offsetWidth;
                                    music.addEventListener("timeupdate", timeUpdate, false);

                                    function timeUpdate() {
                                        var playPercent = timelineWidth * (music.currentTime / duration);
                                        playhead.style.width = playPercent + "px";

                                        var secondsIn = Math.floor(((music.currentTime / duration) / 3.5) * 100);
                                        if (secondsIn <= 9) {
                                            timer.innerHTML = "0:0" + secondsIn;
                                        } else {
                                            timer.innerHTML = "0:" + secondsIn;
                                        }
                                    }

                                    playButton.onclick = function() {
                                        music.play();
                                        playButton.style.visibility = "hidden";
                                        pause.style.visibility = "visible";
                                        pause.style.background = "white";
                                    }

                                    pauseButton.onclick = function() {
                                        music.pause();
                                        playButton.style.visibility = "visible";
                                        pause.style.visibility = "hidden";
                                    }

                                    music.addEventListener("canplaythrough", function () {
                                        duration = music.duration;
                                    }, false);
                                </script>
                            @endif
                        @endif
                    </div>
                    <div class="h-0.5 mx-10 w-full rounded bg-gray-200"></div>
                </div>
            @empty
                <div class="text-center w-full border-collapse p-6 bg-white">
                    <span class="text-lg">Aucune diffusion</span>
                </div>
            @endforelse
        </x-section>
        <div class="mt-4 ">
            {{ $diffusions->links() }}
        </div>
    </div>

</div>
