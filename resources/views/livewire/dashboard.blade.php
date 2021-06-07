
<div class="my-10">
    <section id="admin-nav" class="width py-5 px-3 md:px-0 grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-4 2xl:grid-cols-6 gap-5 ">
        <x-admin.tile :title="'Creer une vente'" :url="route('admin.vente.create')" />
        <x-admin.tile :title="'Notification'" :url="route('admin.notifications')" :fa="'comment-dots'" />
        <x-admin.tile :title="'Messages'" :url="route('admin.contact-messages')" :fa="'comments'" :count="$messages_count" />
        <x-admin.tile :title="'Diffusions'" :fa="'envelope-open-text'" :url="route('admin.diffusions')" />
        <x-admin.tile :title="'Commandes'" :fa="'envelope-open-text'" :url="route('admin.orders')" :count="$orders_count" />
        <x-admin.tile :title="'Paiements'" :fa="'money-bill-wave'" :url="route('admin.payments')" :count="$payments_count" />
        <x-admin.tile :title="'Vendu'" :fa="'check-circle'" :url="route('admin.products', ['etat' => 'vendu'])" />
        <x-admin.tile :title="'Indisponible'" :fa="'times-circle'" :url="route('admin.products', ['etat' => 'indisponible'])" />
        <x-admin.tile :title="'Invisiblité'" :fa="'eye-slash'" :url="route('admin.products', ['etat' => 'invisible'])" />
        <x-admin.tile :title="'Carousel'" :fa="'images'" :url="route('admin.slideshow')" />
        <x-admin.tile :title="'Statistiques'" :fa="'signal'" :url="route('admin.statistique')" />
        <x-admin.tile :title="'Utilisateurs'" :fa="'users'" :url="route('admin.utilisateurs')" />
    </section>
</div>
