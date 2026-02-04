@extends('frontend.layout-guest')

@section('content')
<div class="min-h-screen bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white shadow rounded-lg p-6">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold text-gray-900">User Dashboard</h1>
                <div class="flex space-x-4">
                    <span class="text-gray-600">Welcome, {{ auth()->user()->name }}</span>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-medium py-2 px-4 rounded-lg shadow">
                            🚪 Logout
                        </button>
                    </form>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                <!-- Welcome Card -->
                <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                    <h2 class="text-lg font-semibold text-blue-900 mb-2">Dashboard Overview</h2>
                    <p class="text-blue-700">Manage your account and view recent activities.</p>
                </div>

                <!-- Profile Card -->
                <div class="bg-green-50 border border-green-200 rounded-lg p-4">
                    <h2 class="text-lg font-semibold text-green-900 mb-2">Your Profile</h2>
                    <p class="text-green-700">Manage your account settings</p>
                    <a href="#" class="text-green-600 hover:text-green-800 text-sm mt-2 inline-block">Edit Profile</a>
                </div>

                <!-- Activity Card -->
                <div class="bg-purple-50 border border-purple-200 rounded-lg p-4">
                    <h2 class="text-lg font-semibold text-purple-900 mb-2">Recent Activity</h2>
                    <p class="text-purple-700">View your recent actions</p>
                    <a href="#" class="text-purple-600 hover:text-purple-800 text-sm mt-2 inline-block">View Activity</a>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="border-t pt-6">
                <h2 class="text-xl font-semibold text-gray-900 mb-4">Quick Actions</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <a href="/" class="bg-gray-600 hover:bg-gray-700 text-white font-medium py-2 px-4 rounded-lg text-center">
                        Back to Home
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection