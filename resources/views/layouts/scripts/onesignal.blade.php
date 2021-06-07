<script>
    window.OneSignal = window.OneSignal || [];
    OneSignal.push(function() {
        OneSignal.init({
            appId: "49384874-4965-45c2-b281-3c8fd0fb9a56",
        });

        OneSignal.setDefaultNotificationUrl({{route('notifications')}});
    });
</script>
