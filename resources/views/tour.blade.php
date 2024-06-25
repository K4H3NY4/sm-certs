<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Form</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        #payment-form {
            display: none;
        }
    </style>
</head>
<body>
    <section class="container mx-auto p-4">
        <div class="flex flex-wrap">
            <div id="left-tour" class="w-full md:w-1/2 p-4">
                <img src="https://dianibeachmombasa.com/wp-content/uploads/2022/11/DJI_0080-2-2.jpg" alt="Tour Image" class="mb-4">
                <div>
                    <h2 class="text-2xl font-bold mb-2">Title for tour</h2>
                    <div id="details-section" class="mb-4">
                        <div id="left-details-section" class="mb-4">
                            <ul class="list-disc list-inside">
                                <li>Item 1</li>
                                <li>Item 2</li>
                                <li>Item 3</li>
                            </ul>
                        </div>
                        <div id="right-details-section" class="mb-4">
                            <h1 class="text-xl font-bold">Amount</h1>
                            <p>Demo text</p>
                        </div>
                        <button class="bg-blue-500 text-white px-4 py-2 rounded" id="buy-button">BUY NOW</button>
                    </div>
                    <div id="payment-form">
                        <form action="{{ route('payment.submit') }}" method="post">
                            @csrf
                            <div class="mb-4">
                                <label for="name" class="block text-gray-700">Name</label>
                                <input type="text" name="name" id="name" class="w-full p-2 border border-gray-300 rounded">
                            </div>
                            <div class="mb-4">
                                <label for="phone" class="block text-gray-700">Phone</label>
                                <input type="tel" name="phone" id="phone" class="w-full p-2 border border-gray-300 rounded">
                            </div>
                            <div class="mb-4">
                                <label for="email" class="block text-gray-700">Email</label>
                                <input type="email" name="email" id="email" class="w-full p-2 border border-gray-300 rounded">
                            </div>
                            <input type="hidden" name="price_id" value="price_1PVL5SDJMaw1PsX7yWqvGuas">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">PAY NOW</button>
                        </form>
                    </div>
                </div>
            </div>
            <div id="right-tour" class="w-full md:w-1/2 p-4">
                <p>right section</p>
            </div>
        </div>
    </section>

    <script>
        $(document).ready(function(){
            $("#buy-button").click(function(){
                $("#payment-form").show();
                $("#details-section").hide();
            });
        });
    </script>
</body>
</html>
