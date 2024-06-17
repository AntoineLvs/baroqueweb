<div class="py-4">
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200">
        <div class="px-4 py-5 sm:px-6">
            <h3 class="card-title">Lizenz Status :
                @if($userStatus == 0)
                <span class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-600/10"> Keine aktive Lizenz </span>
                <p class="mt-2 max-w-2xl text-sm leading-6 text-red-700">Um den Code für die Integration des Freigabe-Formulars auf Ihrer Website zu erstellen, müssen Sie die folgende Lizenz beantragen:
                    <a class="text-sm underline font-medium leading-6 text-blue-700" href="{{route('license-legal-informations')}}#abo-modelle">Variante 2: Onsite + API Integration (199,00 € / Monat)</a>.
                </p>
                @elseif($userStatus != 0 && $userStatus != 100 && $userStatus != 99 )
                <span class="inline-flex items-center rounded-md bg-yellow-50 px-2 py-1 text-xs font-medium text-yellow-800 ring-1 ring-inset ring-yellow-600/20">Lizenz wartet auf Freischaltung</span>

                @elseif($userStatus == 100)
                <span class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">Lizenz aktiv</span>
                <span class="text-xs">
                    {{ $apiToken->created_at->format('d-m-Y') }} / {{ date('d-m-Y', strtotime($apiToken->expires_at)) }}
                </span>
                <p>Lizenz-Typ: {{ $apiToken->tokenType->name }}</p>
                <p>Lizenz-Info: {{ $apiToken->tokenType->description }}</p>
                <p>Lizenz-Gestaltung: {{ $apiToken->tokenType->marketing }}</p>

                <p>Api Token: <button onclick="copyTokenClipboard()" class="cursor-pointer inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20 hover:bg-green-100 focus:outline-none focus:ring" id="apiToken">{{ $apiToken->token }}</button>

                </p>

                @elseif($userStatus == 99)
                <span class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-600/10"> Request rejected </span>
                <span class="text-xs"> - Please contact support if you have any questions</span>

                @endif
            </h3>
        </div>
        @if($userStatus == 0 || $userStatus == 99)

        <div class="px-4 py-5 sm:p-6">
            <!-- Content goes here -->

            <div>
                <a href="{{ route('api.license-manager') }}" class="inline-flex items-center px-4 py-2 border border-transparent
              text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700
              focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Lizenz beantragen</a>
            </div>

        </div>
        @endif
    </div>

    @livewire('api.demo', [
    'userStatus'=> $userStatus,
    ])

    @if($hasToken)

    @livewire('api.code')

    @endif

    <script>
        function handleButtonClick(radioButton) {
            // Réalisez les opérations nécessaires en fonction de l'élément radio sélectionné
            console.log("Option sélectionnée :", radioButton.value);
        }

        function copyTokenClipboard() {
            //Select the element containing the Javascript code to copy
            var codeElement = document.getElementById('apiToken');

            // Verify if the element exists
            if (codeElement) {
                // Create a temporary textarea to copy the HTML code
                var textarea = document.createElement("textarea");
                textarea.value = codeElement.innerHTML; 
                document.body.appendChild(textarea);

                // Select the content in the textarea
                textarea.select();
                textarea.setSelectionRange(0, textarea.value.length); // Pour les navigateurs mobiles

                // Copy the content to the clipboard
                document.execCommand("copy");

                // Delete the temporary textarea
                document.body.removeChild(textarea);

                // Display a confirmation message or perform other actions if successful

                // console.log("The Javascript code has been copied to the clipboard.");
            } else {
                // console.log("No element found with id 'JavascriptCode'");
            }
        }
    </script>
</div>