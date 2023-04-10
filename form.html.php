
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
</head>
<body>
    <form>
        <select name="type" id="">
            <option value="car">Car</option>
            <option value="driver">Driver</option>
            <option value="route">Route</option>
        </select>
    </form>
    <div id="div1"></div>
    <div id="div2"></div>
    <script>
        $('[name="type"]').change(function(){
            var data = $(this).val()
            $.post({url: "index.php?data="+data, success: function(result){
                $("#div1").html(result.data);
                var html = $("<table>").css('border', '1px solid red');
                $.each(result.array, function(index, item){
                    var tr = $("<tr>");
                    tr.append($("<td>")).html(item);
                    html.append(tr);
                })

                $("#div2").html(html);

            }});
        });
    </script>
</body>
</html>
