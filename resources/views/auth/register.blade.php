<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
                @csrf

            <!-- First Name -->
            <div>
                <x-label for="first_name" :value="__('First Name')" />

                <x-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" required autofocus />
            </div>
            <!-- Middle Name -->
            <div>
                <x-label for="middle_name" :value="__('Middle Name')" />

                <x-input id="middle_name" class="block mt-1 w-full" type="text" name="middle_name" :value="old('middle_name')" required autofocus />
            </div>
            <!-- Last Name -->
            <div>
                <x-label for="last_name" :value="__('Last Name')" />

                <x-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required autofocus />
            </div>
            <!-- Username -->
            <div>
                <x-label for="username" :value="__('Username')" />

                <x-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus />
            </div>

            <!-- Date of Birth -->
            <div>
                <x-label for="dob" :value="__('Date of Birth')" />

                <x-input id="dob" class="block mt-1 w-full" type="date" name="dob" :value="old('dob')" required autofocus />
            </div>
            <!-- Matric Number-->
            <div>
                <x-label for="matric_number" :value="__('Matric Number')" />

                <x-input id="matric_number" class="block mt-1 w-full" type="text" name="matric_number" :value="old('matric_number')" required autofocus />
            </div>

            <!-- Faculty -->
            <div>
                <x-label for="faculty" :value="__('Faculty')" />

                <div class="col-sm-6">                    
                <select class="form-control rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full " id="faculty" name="faculty" :value="old('faculty')" required focus>
                    <option selected value="">Select</option>
                    
                    @foreach($faculties as $faculty)
                     <option value={{$faculty->id}}>{{$faculty->name}}</option>   
                    @endforeach
                   
                </select>
                </div>

                {{-- <x-input id="faculty" class="block mt-1 w-full" type="text" name="faculty" :value="old('faculty')" required autofocus /> --}}
            </div>

            <!-- Department -->
            <div>
                <x-label for="department" :value="__('Department')" />
                <select class="form-control rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full " id="department" class="block mt-1 w-full" type="text" name="department" :value="old('department')" required focus>
                    <option selected value="">Select</option>
                    
                    @foreach($departments as $department)
                     <option value={{$department->id}}>{{$department->name}}</option>   
                    @endforeach
                   
                </select>

                {{-- <x-input id="department" class="block mt-1 w-full" type="text" name="department" :value="old('department')" required autofocus /> --}}
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
