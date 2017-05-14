<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link   href="css/bootstrap.min.css" rel="stylesheet">
  <script src="js/bootstrap.min.js"></script>


  <style>
    body {
      margin: 0;
      min-width: 250px;
    }

    /* Include the padding and border in an element's total width and height */
    * {
      box-sizing: border-box;
    }

    /* Remove margins and padding from the list */
    ul {
      margin: 0;
      padding: 0;
    }

    /* Style the list items */
    ul li {
      cursor: pointer;
      position: relative;
      padding: 12px 8px 12px 40px;
      background: #eee;
      font-size: 18px;
      transition: 0.2s;

      /* make the list items unselectable */
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    /* Set all odd list items to a different color (zebra-stripes) */
    ul li:nth-child(odd) {
      background: #f9f9f9;
    }

    /* Darker background-color on hover */
    ul li:hover {
      background: #ddd;
    }

    /* When clicked on, add a background color and strike out text */
    ul li.checked {
      background: #888;
      color: #fff;
      text-decoration: line-through;
    }

    /* Add a "checked" mark when clicked on */
    ul li.checked::before {
      content: '';
      position: absolute;
      border-color: #fff;
      border-style: solid;
      border-width: 0 2px 2px 0;
      top: 10px;
      left: 16px;
      transform: rotate(45deg);
      height: 15px;
      width: 7px;
    }

    /* Style the close button */
    .close {
      position: absolute;
      right: 0;
      top: 0;
      padding: 12px 16px 12px 16px
    }

    .close:hover {
      background-color: #f44336;
      color: white;
    }

    /* Style the header */
    .header {
      background-color:  	#A9A9A9;
      padding: 30px 120px;
      color: white;
      text-align: center;
    }

    /* Clear floats after the header */
    .header:after {
      content: "";
      display: table;
      clear: both;
    }

    /* Style the input */
    input {
      border: none;
      width: 75%;
      padding: 10px;
      float: left;
      font-size: 16px;
    }

    /* Style the "Add" button */
    .addBtn {
      width: 25%;
      background: #d9d9d9;
      color: #555;
      float: left;
      text-align: center;
      font-size: 16px;
      cursor: pointer;
      transition: 0.3s;
    }

    .addBtn:hover {
      background-color: #bbb;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="well">
      <div class="row">
        <h2 style="font-family:AR BLANCA">ALL STOCKS</h2>
      </div>
      <div class="row">
        <p>
          <a href="graph.php" class="btn btn-info">Show Grouph</a>
        </p>


        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Product Name</th>
              <th>count number of product</th>
              <th>Date in</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include 'database.php';
            $pdo = Database::connect();
            $con = mysqli_connect('localhost','root','','shop');
                       #$sql1 = 'SELECT p.name FROM product p join stork s on(p.id = s.id)';
                       #$sql1 .= 'SELECT p.name FROM product p left join stork s on(p.id = s.id)';
                       #mysqli_multi_query($pdo,$sq11);
            $sql = 'SELECT * FROM product ORDER BY id DESC';
            foreach ($pdo->query($sql) as $row) {
              echo '<tr>';
              echo '<td>'. $row['name'] . '</td>';
              echo '<td>'.count($row['name']). '</td>';
              echo '<td>'. $row['date']. '</td>';
              echo '<td width=250>';
              echo '<a class="btn btn-success" href="read.php?id='.$row['id'].'">Read</a>';
              echo ' ';
              echo '</td>';
              echo '</tr>';
              $category = $row['type']; $prod_name = $row['name'];
              $query = mysqli_query($con,"SELECT * FROM stork WHERE category = '$category' AND productName = '$prod_name'");
              $count = mysqli_num_rows($query);
              if($count < 1){
               $insert_stock = "INSERT INTO stork(category,productName,quantityOnHand)
               VALUES('{$category}','{$prod_name}','')";
               if(mysqli_query($con,$insert_stock))
               {

               }
               else{
                 echo mysqli_error($con);
               }
             }
           }
           Database::disconnect();
           ?>
         </tbody>
       </table>
     </div>


   </div>

   <div class="well col col-lg-4  pull-right">
     <div id="myDIV" class="header">
       <h2 style="margin:5px">My To Do List</h2>
       <input type="text" id="myInput" placeholder="Title...">
       <span onclick="newElement()" class="addBtn">Add</span>
     </div>

     <ul id="myUL">
       <li>call an supplier</li>
       <li class="checked">check out bills</li>
       <li>look out for stock</li>
     </ul>

     <script>
         // Create a "close" button and append it to each list item
         var myNodelist = document.getElementsByTagName("LI");
         var i;
         for (i = 0; i < myNodelist.length; i++) {
           var span = document.createElement("SPAN");
           var txt = document.createTextNode("\u00D7");
           span.className = "close";
           span.appendChild(txt);
           myNodelist[i].appendChild(span);
         }

         // Click on a close button to hide the current list item
         var close = document.getElementsByClassName("close");
         var i;
         for (i = 0; i < close.length; i++) {
           close[i].onclick = function() {
             var div = this.parentElement;
             div.style.display = "none";
           }
         }

         // Add a "checked" symbol when clicking on a list item
         var list = document.querySelector('ul');
         list.addEventListener('click', function(ev) {
           if (ev.target.tagName === 'LI') {
             ev.target.classList.toggle('checked');
           }
         }, false);

         // Create a new list item when clicking on the "Add" button
         function newElement() {
           var li = document.createElement("li");
           var inputValue = document.getElementById("myInput").value;
           var t = document.createTextNode(inputValue);
           li.appendChild(t);
           if (inputValue === '') {
             alert("You must write something!");
           } else {
             document.getElementById("myUL").appendChild(li);
           }
           document.getElementById("myInput").value = "";

           var span = document.createElement("SPAN");
           var txt = document.createTextNode("\u00D7");
           span.className = "close";
           span.appendChild(txt);
           li.appendChild(span);

           for (i = 0; i < close.length; i++) {
             close[i].onclick = function() {
               var div = this.parentElement;
               div.style.display = "none";
             }
           }
         }
       </script>
     </div>
   </div>

   <!-- /container -->



 </body>
 </html>
