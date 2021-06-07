<script src="https://cdn.plyr.io/3.6.3/plyr.polyfilled.js"></script>
<link rel="stylesheet" href="https://cdn.plyr.io/3.6.3/plyr.css" />
<style>
    .plyr, .plyr__video-wrapper, .plyr__poster{
        border-radius: 8px !important;
    }
</style>
<script>
    const player = new Plyr('#player', {
        'controls': ['play-large', 'play', 'progress', 'current-time', 'mute', 'volume', 'captions', 'settings', 'pip', 'airplay', 'fullscreen'],
    });
</script>
