@extends('layouts.app')

@section('title', 'Create Event - BDE-Events')

@section('content')
<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="mb-6">
        {{-- {{ route('admin.events.index') }} --}}
        <a href="/admin/dashboard" class="text-sm font-semibold text-blue-600 hover:text-blue-700 inline-flex items-center gap-1">
            <i class="bi bi-arrow-left"></i> Back to Events
        </a>
        <h2 class="text-2xl font-bold text-gray-900 tracking-tight mt-2">Create New Campus Event</h2>
        <p class="text-sm text-gray-500 mt-1">Fill in the event details to open registrations for students.</p>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 sm:p-8">
        {{-- {{ route('admin.events.store') }} --}}
        <form action="{{route('admin.events.store')}}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <div>
                <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">Event Title</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}"   placeholder="e.g., Annual Welcome Gala" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm py-2.5 px-4 @error('title') border-red-500 @enderror">
                @error('title')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">Description</label>
                <textarea id="description" name="description" rows="4"  placeholder="Write a short summary about the event..." class="w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm py-2.5 px-4 @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="date" class="block text-sm font-semibold text-gray-700 mb-2">Event Date</label>
                    <input type="date" id="date" name="date" value="{{ old('date') }}"  class="w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm py-2.5 px-4 @error('date') border-red-500 @enderror">
                    @error('date')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="time" class="block text-sm font-semibold text-gray-700 mb-2">Event Time</label>
                    <input type="time" id="time" name="time" value="{{ old('time') }}"  class="w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm py-2.5 px-4 @error('time') border-red-500 @enderror">
                    @error('time')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                <div>
                    <label for="location" class="block text-sm font-semibold text-gray-700 mb-2">Location</label>
                    <input type="text" id="location" name="location" value="{{ old('location') }}"  placeholder="Main Auditorium" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm py-2.5 px-4 @error('location') border-red-500 @enderror">
                    @error('location')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="price" class="block text-sm font-semibold text-gray-700 mb-2">Price (DH)</label>
                    <input type="number" step="0.01" id="price" name="price" value="{{ old('price', 0) }}"  class="w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm py-2.5 px-4 @error('price') border-red-500 @enderror">
                    @error('price')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="capacity" class="block text-sm font-semibold text-gray-700 mb-2">Total Capacity</label>
                    <input type="number" id="capacity" name="capacity" value="{{ old('capacity', 100) }}"  min="1" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm py-2.5 px-4 @error('capacity') border-red-500 @enderror">
                    @error('capacity')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div>
                <label for="image" class="block text-sm font-semibold text-gray-700 mb-2">Cover Image (Optional)</label>
                <input type="file" id="image" name="image" accept="image/*" class="w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition-all">
                @error('image')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex items-center justify-end gap-3 pt-4 border-t border-gray-100">
                {{-- {{ route('admin.events.index') }} --}}
                <a href="#" class="px-5 py-2.5 bg-white border border-gray-200 text-gray-700 hover:bg-gray-50 font-semibold text-sm rounded-xl transition-all">
                    Cancel
                </a>
                <button type="submit" class="px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm rounded-xl shadow-md transition-all">
                    Publish Event
                </button>
            </div>
        </form>
    </div>
</div>
@endsection