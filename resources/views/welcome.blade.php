<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>URL Shortner</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>



    <div class="container mt-3">
        <div class="mt-4 p-5 bg-primary text-white rounded">
            <h2>URL Shortner</h2>
            <p>
                URL Shortner is a simple web application that allows users to shorten the long URLs. It's a simple way to make your URLs shorter and more user-friendly.
                The application takes a long URL as input and generates a shorter unique URL. The generated URL is then stored in the database for later use.
                The user can then visit the shorter URL to be redirected to the original long URL.
            </p>
        </div>

        <div class="row mt-4">
            <div class="col-lg-12">
                @if(isset($shortCode))
                    <p>Short URL: <a href="{{ $shortCode->original_url }}" target="_blank"> Visit URL : {{ $shortCode->original_url }}</a></p>

                    <p id="redirectText">Redirecting in 3 seconds...</p>

                    <script>
                        let seconds = 3;
                        const redirectText = document.getElementById("redirectText");

                        const countdown = setInterval(() => {
                            seconds--;
                            if (seconds > 0) {
                                redirectText.textContent = `Redirecting in ${seconds} second${seconds > 1 ? 's' : ''}...`;
                            } else {
                                clearInterval(countdown);
                                redirectText.textContent = "Redirecting now...";
                            }
                        }, 1000);
                    </script>
                @endif
            </div>
        </div>
    </div>

    @isset($shortCode)
        <script>
            setTimeout(function(){
                window.open("{{ $shortCode->original_url }}", '_blank');
            }, 3000);
        </script>
    @endisset
</body>
</html>