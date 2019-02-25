<!DOCTYPE html>
<html>
<head>
    <title>PHP Mysql REST API CRUD</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <br />

    <h3 align="center">PHP Mysql REST API CRUD</h3>
    <br />
    <div align="right" style="margin-bottom:5px;">
        <button type="button" name="add_button" id="add_button" class="btn btn-success btn-xs">Add</button>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>
</body>
</html>


<script type="text/javascript">
    $(document).ready(function(){

        fetch_data();

        function fetch_data()
        {
            $.ajax({
                url:"fetch.php",
                success:function(data)
                {
                    $('tbody').html(data);
                }
            })
        }


        $(document).on('click', '.delete', function(){
            var id = $(this).attr("id");
            var action = 'delete';
            if(confirm("Are you sure you want to remove this data using PHP API?"))
            {
                $.ajax({
                    url:"action.php",
                    method:"POST",
                    data:{id:id, action:action},
                    success:function(data)
                    {
                        fetch_data();
                        alert("Data Deleted using PHP API");
                    }
                });
            }
        });

    });
</script>
