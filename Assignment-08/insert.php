<!DOCTYPE html>
  <html>
    <head>
      <meta charset="UTF-8">
      <title>Add New Book</title>
      <link rel="stylesheet" type="text/css" href="css.css"
    </head>
    <body>
      <div class="title">
		    <h1>Library Managment System</h1>
      </div>

      <div class="routeButton">
        <button> <a href="index.php"> Home </a></button>
        <button> <a href="view.php"> View Books </a></button>
      </div>

      <div class="table1">
         <form action="insertphp.php" onsubmit=" return validate()" method="post">
            <fieldset>
              <label>Enter Book Name:</label><input id ="name" type="text" name="name" placeholder="Book Name..." onfocusout="NameValidation()"><br />
              <p id="name-error"> </p><br />
              <label>Enter Book Author:</label><input id ="author" type="text" name="author" placeholder="Author Name..." onfocusout="AuthorValidation()"><br />
              <p id="author-error"> </p><br />
              <label>Enter Publication Year:</label><input id="year" type="text" name="year" placeholder="Published Year..." onfocusout="YearValidation()"><br />
              <p id="year-error"> </p><br />
              <input id = "add" type="submit" value="Add Book"  />

              <?php
                if(isset($_REQUEST['result'])){
                  if($_REQUEST['result'] == "success"){
                    echo "<p id = 'message' style='color : green'><strong>Product added successfully</strong></p>";
                  }
                  else if($_REQUEST['result'] == "fail"){
                    echo "<p id = 'message' style='color : red'><strong>Product not added successfully</strong></p> ";
                  }
                }
              ?>
            </fieldset>
        </form>
      </div>

      <script>
        function validate(){
          var result = true;
          if(!NameValidation())
            result = false;
          if(!AuthorValidation())
            result = false;
          if(!YearValidation())
            result = false;
          return result;
        }

        function NameValidation(){
          var name = document.getElementById("name").value;
          var name_error = document.getElementById("name-error");
          if(name==""){
            name_error.innerHTML = "Name field can't be blank";
            name_error.style.color = "red";
            return false;
          }

          if(name.length < 4){
            name_error.innerHTML = "Name can't be less than 4 Characters";
            name_error.style.color = "red";
            return false;
          }

          else{
            name_error.innerHTML="";
            return true;
          }
        }

        function AuthorValidation(){
          var author = document.getElementById("author").value;
          var author_error = document.getElementById("author-error");
          if(author==""){
            author_error.innerHTML = "Author field can't be blank";
            author_error.style.color = "red";
            return false;
          }

          else if(author.length < 5){
            author_error.innerHTML = "Author Name can't be less than 5 Characters";
            author_error.style.color = "red";
            return false;
          }

          else {
            author_error.innerHTML="";
            return true;
          }
        }

        function YearValidation(){
          var year = document.getElementById("year").value;
          var year_error = document.getElementById("year-error");
          if(year==""){
            year_error.innerHTML = "Year field can't be blank";
            year_error.style.color = "red";
            return false;
          }

          else if(year.length < 4){
            year_error.innerHTML = "Year can't be less than 4 Digits";
            year_error.style.color = "red";
            return false;
          }

          else {
            year_error.innerHTML="";
            return true;
          }
        }
    </script>
  </body>
</html>
