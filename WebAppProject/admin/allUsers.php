<?php
    
    $output = "";
    $query = mysqli_query($conn, "SELECT Photo,handle,UserID FROM profile") or die ("Could not search");
    $count = mysqli_num_rows($query);

    if($count == 0){
        $output = "There was no search results!";

    }else{
        $i = 0;
        while ($row = mysqli_fetch_array($query)) {

          
            $Name = $row ['Photo'];
            $handle = $row ['handle'];
            $id = $row['UserID'];


            if(($i % 3) == 0){
                echo ' <br> ';
                echo ' <br> ';
            }


            $output .='<div> '.$Name.'</div>';
            print ("Name is    ");
            print ("$handle");

            print("    User id is    ");
            print ("$id");

            echo '  
            
              <tr>  
                   <td>   
                        <img src="data:image/jpeg;charset=utf-8;base64, '.base64_encode($row['Photo'] ).'"  border="4" height="200" width="200"  />  
                   </td>  
              </tr>  
             
         ';
            $i = $i + 1;
        }

    }