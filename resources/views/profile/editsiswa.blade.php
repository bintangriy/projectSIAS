    @extends('layouts.siswamain')
    @section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div> -->
        </div>
    </div>
    </div>

    <style>
        /* Container Utama */
        .py-12 {
            padding-top: 3rem;
            padding-bottom: 3rem;
        }

        .max-w-7xl {
            max-width: 80%;
            margin: 0 auto;
        }

        .space-y-6>*+* {
            margin-top: 1.5rem;
        }

        /* Style untuk Kartu */
        .p-4 {
            padding: 1rem;
        }

        .sm\:p-8 {
            padding: 2rem;
        }

        .bg-white {
            background-color: #ffffff;
        }

        .dark\:bg-gray-800 {
            background-color: #2d3748;
        }

        .shadow {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .sm\:rounded-lg {
            border-radius: 0.5rem;
        }

        /* Teks Judul */
        h2 {
            font-size: 1.5rem;
            font-weight: 600;
            color: #333;
        }

        .dark\:text-gray-200 {
            color: #e2e8f0;
        }

        /* Style Form Profil */
        .max-w-xl {
            max-width: 36rem;
            margin: 0 auto;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        button {
            width: 100%;
            padding: 0.75rem;
            border-radius: 0.375rem;
            border: 1px solid #cbd5e0;
            margin-bottom: 1rem;
            font-size: 1rem;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-color: #3182ce;
            box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.5);
        }

        /* Tombol Simpan */
        button {
            background-color: #4CAF50;
            color: white;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #3b8e40;
        }

        /* Responsif */
        @media (max-width: 640px) {
            .max-w-7xl {
                max-width: 100%;
            }

            .max-w-xl {
                max-width: 100%;
            }
        }
    </style>