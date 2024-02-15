<x-admin-layout class="flex items-center justify-center dark:bg-gray-700">
    <form action="/subscribe" method="post" class="m-auto max-w-sm" id="subscribeForm">
        @csrf
        <div class="flex items-center border-b border-teal-500 py-2">
            <div class="inputBox">
                <input type="email" id="sub_email" name="email" />
                <span for="email">Email</span>
            </div>
            <button
                class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-2 px-2 rounded"
                type="submit" id="subscribeBtn">
                Subscribe
            </button>
        </div>
    </form>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#subscribeForm').submit(function(event) {
                event.preventDefault();

                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    success: function(response) {
                        swal("Success", response.message, "success");
                    },
                    error: function(xhr, status, error) {
                        // Parse the JSON response to access the error message
                        var response = JSON.parse(xhr.responseText);
                        var errorMessage = response.message || "An error occurred while processing your request.";
                        swal("Error", errorMessage, "error");
                    }
                });
            });
        });
    </script>
</x-admin-layout>
