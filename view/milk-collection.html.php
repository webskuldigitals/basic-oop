<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
</head>

<body class="m-2">
    <div>
        <a href="#" class="btn btn-primary">Milk</a>
        <a href="#" class="btn btn-secondary">Farmer</a>
        <a href="#" class="btn btn-secondary">Payment</a>
    </div>
    <div class="mt-3 mb-4">
        <a href="#" class="btn btn-sm btn-primary">Milk</a>
        <a href="#" class="btn btn-sm btn-secondary">View collecton</a>
    </div>
    <form>
        <div>
            <select name="farmer" id="farmer">
                <option value="" selected>--Select Farmer--</option>
                <?php
                foreach ($farmers as $key => $farmer) {
                    echo '<option value="' . $farmer['id'] . '" selected>' . $farmer['name'] . '</option>';
                }
                ?>
            </select>
        </div>
        <div class="mt-2">
            <input id="milk" type="number">
        </div>

        <div>
            <h3></h3>
        </div>

        <div>
            <button type="button" id="save-milk" class="btn btn-lg btn-success">Add milk</button>
        </div>

    </form>

    <script>
        $(document).ready(function(){
            $('#save-milk').click(function(){
                $farmer = $('#farmer').val();
                $milk =  $('#milk').val();

                ////////////////////////////////////////////
                ////////////////////////////////////////////

                let dataToAct = {
                    task: 'save_milk',
                    farmer: $farmer,
                    milk: $milk
                };

                $.ajax({
                    url: 'index.php',
                    type: "POST",
                    data: dataToAct,
                    success: function (response) {
                        let returnedData = JSON.parse(response);
                    }
                })
                
                ////////////////////////////////////////////
                ////////////////////////////////////////////


            })
        })
    </script>
</body>

</html>