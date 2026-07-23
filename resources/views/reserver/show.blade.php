@auth
    <!-- Formulaire de réservation directe pour l'utilisateur connecté -->
    <form action="{{ route('registrations.store') }}" method="POST">
        @csrf
        <input type="hidden" name="event_id" value="{{ $event->id }}">
        
        @if($event->available_seats > 0)
            <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-xl text-sm transition-colors">
                Réserver
            </button>
        @else
            <button type="button" disabled class="px-4 py-2 bg-gray-300 text-gray-500 font-medium rounded-xl text-sm cursor-not-allowed">
                Complet
            </button>
        @endif
    </form>
@endauth

@guest
    <!-- Redirection vers le login si non connecté -->
    <a href="{{ route('login') }}" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-xl text-sm transition-colors">
        Réserver
    </a>
@endguest