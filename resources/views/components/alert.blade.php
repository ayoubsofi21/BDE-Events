<!-- Success / Error Alert Component -->
@if (session('success'))
    <div class="mb-4 p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-800 flex items-center justify-between shadow-md">
        <div class="flex items-center gap-3">
            <svg class="w-5 h-5 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            <span class="text-sm font-medium">{{ session('success') }}</span>
        </div>
    </div>
@endif

@if (session('error'))
    <div class="mb-4 p-4 rounded-2xl bg-red-50 border border-red-200 text-red-800 flex items-center justify-between shadow-md">
        <div class="flex items-center gap-3">
            <svg class="w-5 h-5 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
            <span class="text-sm font-medium">{{ session('error') }}</span>
        </div>
    </div>
@endif