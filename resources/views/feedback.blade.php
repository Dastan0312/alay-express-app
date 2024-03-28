<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl  mx-auto sm:px-6 lg:px-8">
            <form method="POST" action="{{ route('feedback.store') }} " enctype="multipart/form-data"
                class=" space-y-2">
                @csrf
                <div class=" bg-white overflow-hidden shadow-sm sm:rounded-lg max-w-7xl">
                    <div class="p-6 text-gray-900 space-y-6 bg-white">
                        <div>
                            <x-input-label :required="true" :value="__('Title')" class="py-1" />
                            <x-text-input id="title" placeholder="title" name="title" type="text"
                                class="mt-1 text-gray-800 block w-full" />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label :value="__('Message')" class="py-1" />
                            <x-text-input placeholder="Message" name="body" type="text"
                                class="mt-1 text-gray-800 block w-full" />
                            <x-input-error :messages="$errors->get('body')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label :value="__('File')" class="py-1" />
                            <div class="w-full">
                                <div class="flex items-center gap-2 relative">
                                    <input class="block w-full my-1 bg-white text-gray-900 border rounded-lg "
                                        type="file" name="file">
                                </div>
                            </div>
                        </div>
                        <div>
                            <x-primary-button>Send</x-primary-button>
                        </div>
                        @if (session('error'))
                            <div class="flex justify-between text-red-200 shadow-inner rounded-lg p-4 bg-red-500">
                                <p class="self-center">You can only submit feedback once a day.</p>
                                <button type="button"
                                    class="text-xl align-center cursor-pointer alert-del">&times;</button>
                            </div>
                        @elseIf(session('success'))
                            <div class="flex justify-between text-red-200 shadow-inner rounded-lg p-4 bg-lime-600">
                                <p class="self-center">Sent Succesfully</p>
                                <button type="button"
                                    class="text-xl align-center cursor-pointer alert-del">&times;</button>
                            </div>
                        @endif
                    </div>
                </div>

            </form>
        </div>
    </div>

</x-app-layout>
<script>
    var alert_del = document.querySelectorAll('.alert-del');
    alert_del.forEach((x) =>
        x.addEventListener('click', function() {
            x.parentElement.classList.add('hidden');
        })
    );
</script>
