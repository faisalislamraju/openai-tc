<!DOCTYPE html>
<html>
<head>
    <title>ChatGPT</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style>
        /* Add your custom styles here */
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }
        .container {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .card {
            width: 80%;
            padding: 20px;
        }
        #response {
            margin-top: 20px;
            font-size: 18px;
            white-space: pre-wrap;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="card">
        <h2 class="center-align">ChatGPT - Tryout</h2>
        <form method="POST" action="/chatgpt">
            @csrf
            <div class="input-field">
                <i class="material-icons prefix">question_answer</i>
                <textarea id="prompt" name="prompt" class="materialize-textarea">
                        @if(isset($prompt)){{$prompt}}@endif
                    </textarea>
                <label for="prompt">Enter your prompt</label>
            </div>
            <div class="center-align">
                <button class="btn waves-effect waves-light" type="submit">Get Response</button>
            </div>
        </form>
        @if(isset($response))
        <div id="response">{{ $response }}</div>
        <div class="center-align">
            <button class="btn waves-effect waves-light" onclick="clearAll()">Clear</button>
        </div>
        @endif
    </div>
</div>
<script>
        function clearAll(){
            document.getElementById("prompt").value = "";
            document.getElementById("response").innerHTML = "";
        }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

</body>
</html>
