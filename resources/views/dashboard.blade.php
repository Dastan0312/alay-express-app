<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm  rtl:text-right text-gray-600 ">
                        <thead class="text-s  py-6 uppercase bg-gray-300 ">
                            <tr class="py-6 ">
                                <th scope="col" class="px-6 py-4">
                                    #
                                </th>
                                <th scope="col" class="px-6 py-4">
                                    title
                                </th>
                                <th scope="col" class="px-6 py-4">
                                    message
                                </th>
                                <th scope="col" class="px-6 py-4">
                                    sender name
                                </th>
                                <th scope="col" class="px-6 py-4">
                                    sender email
                                </th>
                                <th scope="col" class="px-6 py-4">
                                    status
                                </th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @if (isset($feedbacks))
                                @foreach ($feedbacks as $feedback)
                                    <tr class="bg-white border-b spece-y-6  hover:bg-gray-50 " x-data="{ checked: {{ $feedback->status ? 'true' : 'false' }} }">

                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            {{ $feedback->id }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $feedback->title }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $feedback->body }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $feedback->user_name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $feedback->email }}
                                        </td>
                                        <td class="w-4 p-4">
                                            <div class="flex items-center justify-center">
                                                <input type="checkbox"
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 cursor-pointer  border-gray-300 rounded focus:ring-blue-500"
                                                    x-id=['checkbox-input'] x-model="checked"
                                                    @change="updateStatus('{{ $feedback->id }}', checked ? 1 : 0 )">
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6" class="text-center py-4 ">No feedback available.</td>
                                </tr>

                            @endif

                        </tbody>
                        @if (session('success'))
                            <div class="flex justify-between text-red-200 shadow-inner rounded-lg p-4 bg-red-500">
                                <p class="self-center">{{session('message')}}</p>
                                <button type="button"
                                    class="text-xl align-center cursor-pointer alert-del">&times;</button>
                            </div>
                        @endif
                    </table>
                    {{-- Pagination --}}
                    <div class="items-start md:items-center space-y-3 md:space-y-0 p-4">
                        {!! $feedbacks->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
<script>
    function updateStatus(feedbackId, isChecked) {
        let status = isChecked ? 1 : 0;

        axios.put('/set-read/' + feedbackId, {
                status: status
            })
            .then(response => {
                console.log(response.data);
            })
            .catch(error => {
                console.error(error);
            });
    }
</script>
