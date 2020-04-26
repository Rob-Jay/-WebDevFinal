<?php


$conn = new mysqli('hive.csis.ul.ie', 'group03', 'Wy=!)U5J6BS(hd/T', 'dbgroup03');
$output = '';

if(isset($_POST['search'])) {
    $search = $_POST['search'];


    $query = mysqli_query($conn, "SELECT Photo, UserID FROM profile WHERE society = '$test'") or die ("Could not search");
    $count = mysqli_num_rows($query);

    if($count == 0){
        $output = "There was no search results!";

    }else{

        while ($row = mysqli_fetch_array($query)) {

            $Name = $row ['Photo'];
            $ID = $row ['UserID'];


            $output .='<div> '.$Name.'</div>';
            print ("$ID");
            echo '  
                          <tr>  
                               <td>   
                                    <img src="data:image/jpeg;charset=utf-8;base64, '.base64_encode($row['Photo'] ).'" height="200" width="200"  />  
                               </td>  
                          </tr>  
                     ';

        }

    }
}



?>