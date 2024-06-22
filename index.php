<html>  
    <head>
        <title>Search and filter data with ajax</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="author" content="adhir2099" />
        <meta name="description" content="Search and filter data with ajax and PHP" />
        <link href="assets/css/styles.css" rel="stylesheet" />
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        <script src="assets/js/fontawesome.js"></script>  
    </head>  

    <body class="d-flex flex-column min-vh-100">  
        <span id="forkongithub"><a href="https://github.com/adhir2099/cawfy-template">Fork me on GitHub</a></span> 
        
        <div class="container mb-5">  
            
            <div class="mb-5"></div>
            <div id="action_alert" class="text-center"></div>
            <div class="mb-5"></div>
            
            <div class="d-flex align-items-center mb-5">
                <input class="form-control" type="text" id="keywords" placeholder="Search" onkeyup="fetchEmployee()"/>&nbsp;
                <select class="form-control" id="sortBy" onChange="fetchEmployee()">
                    <option value="">Sort By</option>
                    <option value="asc">Ascending</option>
                    <option value="desc">Descending</option>
                    <option value="age">Age</option>
                </select>
            </div>

            <div class="loading-overlay text-center mb-5">
                <div class="overlay-content alert alert-secondary">Loading.....</div>
            </div>
            
            <div class="table-responsive mb-0" data-pattern="priority-columns" id ="result"></div>    
        </div>
        
        <footer class="footer text-center mt-auto">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <p class="lead mb-0">Search and filter data with Ajax <a href="https://github.com/adhir2099?tab=repositories"><i class="fab fa-github-alt"></i></a></p>
                    </div>
                </div>
            </div>
        </footer>

        <div class="copyright py-4 text-center text-white">
            <div class="container"><small>Search and filter data with Ajax © 2022</small></div>
        </div>
    
    </body>  
</html> 

<script>
    fetchEmployee(); 

    function fetchEmployee(){

        let action = "Load";
        let keywords = $('#keywords').val();
        let sortBy = $('#sortBy').val();

        $.ajax({
            url : "employeeController.php", 
            method:"POST", 
            data:{action:action, keywords:keywords, sortBy:sortBy}, 
            beforeSend: function () {
                $('.loading-overlay').show();
            },
            success:function(data){
                $('#result').html(data);
                $('.loading-overlay').fadeOut("slow");
            }
        });
    }
</script>