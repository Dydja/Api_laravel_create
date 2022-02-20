<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />


 <form method="POST" class="row" action="{{ route('register') }}">
            @csrf

            <!-- lastName -->
         <div class="col-md-8" >
                <x-label for="voyage" :value="__('voyage')" />
                <select id="voyage" class="block mt-1 w-full" name="voyage" :value="old('voyage')" required autofocus >
                  <option value="">Choose</option>
                  <option value="Economy">Aller-simple</option>
                  <option value="Economy">Aller-retour</option>
                </select>

         </div>

          <!-- firstName -->
          <div class="col-md-8" >
            <x-label for="cabine" :value="__('cabine')" />
                <select id="cabine" class="block mt-1 w-full" name="cabine" :value="old('cabine')" required autofocus >
                    <option value="">Choose</option>
                    <option value="Economy">Economy-Tarif le moins cher</option>
                    <option value="Economy">Economy-tarif flexible</option>
                    <option value="Premium">Premium Economy</option>
                    <option value="Business">Business</option>
                </select>
         </div>

            <!-- Email Address -->
            <div >
                <x-label for="passagers" :value="__('passagers')" />
                <x-input id="passagers" class="block mt-1 w-full" type="text" name="passagers" :value="old('passagers')"  placeholder="ex:1 adulte" required />
            </div>

            <!-- Password -->
            <div >
                <x-label for="departDe" :value="__('Depart de')" />
                <x-input id="departDe" class="block mt-1 w-full" type="text" name="departDe" required  />
            </div>

            <div >
                <x-label for="arriveA" :value="__('Destination')" />
                <x-input id="arriveA" class="block mt-1 w-full" type="text" name="arriveA" required  />
            </div>

            <!-- Confirm Password -->
            <div >
                <x-label for="dateVoyage" :value="__('Date du voyage')" />
                <x-input id="dateVoyage" class="block mt-1 w-full" type="date" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4" type="submit" value="submit" name='submit'>
                    {{ __('Register') }}
                </x-button>
            </div>

        </form>
    </x-auth-card>
</x-guest-layout>

