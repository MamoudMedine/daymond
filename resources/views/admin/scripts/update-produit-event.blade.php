<script>
    window.livewire.on('imageDeleted', ()=>{
         setTimeout(()=>{
             window.location.reload(true);
         }, 2000);
    });
    window.livewire.on('imageUpdated', ()=>{
        setTimeout(()=>{
            window.location.reload(true);
        }, 2000);
    });
</script>
