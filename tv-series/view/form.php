<!DOCTYPE html>
<html>
    <head>
        <title>Time from your next TV Serie</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
        <div class="container text-center">
            <h1>What will be the next TV programmation?</h1>

            <div class="alert alert-info" role="alert">
                Our next TV Show will be: <b><span id="tv-serie">...</span></b>
              </div>
            <hr />
            <p>Searching for a specific title or date? Insert below to search:</p>
                <div class="row justify-content-md-center">
                    <div class="col col-md-6 col-xs-12">
                        <form method="POST" action="#" id="searchForm">
                            <input type="text" id="title" placeholder="Insert the title here" class="form-control mb-3" />
                            <input type="datetime-local" id="dateTime" class="form-control mb-3" />
                            <input type="button" id="submitSearch" class="form-control btn btn-outline-dark" value="Search" />
                        </form>
                    </div>
                </div>
        </div>
    </body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        var apiURL = 'http://localhost:8880/';
        $(document).ready(() => {
            $.ajax({
                url: apiURL,
                dataType: 'json'
            })
            .done((data) => {
                $("#tv-serie").html(`${data.title}: ${data.week_day} at ${data.show_time}`);
            });
        });

        $("#submitSearch").click(() => {
            $.ajax({
                url: apiURL,
                dataType: 'json',
                method: 'POST',
                data: {
                    dateTime: $("#dateTime").val(),
                    title: $("#title").val()
                }
            })
            .done((data) => {
                $("#tv-serie").html(`${data.title}: ${data.week_day} at ${data.show_time}`);
            });
            return false;
        });
    </script>
</html>