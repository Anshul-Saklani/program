<!DOCTYPE html>
<html lang="en">
<head>
<body>
  <table id="main" border="0" cellspacing="0">
    <tr>
      <td id="header">
        <h1>php with ajax</h1>
         </td>
		  </tr>
		   <tr>
       
      <td id="table-load">
        <input type = "button" id = "load-button" value = "Load Data">
		</td>
		</tr>
		<tr>
     <td id="table-data">
	 
  </td>
  </tr>
  </table>


<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="crossorigin="anonymous"></script>
<script>
  $(document).ready(function(){
    
	$("#load-button").on("click",function(e){
	   $.ajax({
          url: "assignment6-1.php",
          type : "POST",
          success : function(data){
		$("#table-data").html(data); 
		  }
		  
 });
	}); 
  });
  </script>
</body>
</html>