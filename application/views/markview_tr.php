<!-----mark view form
	   @asha
	   @5/03/2021
	   @module student
	   ---->
<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<style> 
	table,th,tr,td{
			
            border:2px solid black;
            border-collapse:collapse;
            padding: 10px;
            margin:50px;
          
            }
            .bi
            {
              background-image:url("../img/3.jpg");
              background-size:cover;
            }
	</style>
	</head>
<body class="bi">	
<table>
			<thead>
			  <th>Assesments</th>
			  <th>subject1</th>
			  <th>subject1mark</th>
			  <th>subject2</th>
			  <th>subject2mark</th>
			  <th>subject3</th>
			  <th>subject3mark</th>
			  <th>subject4</th>
			  <th>subject4mark</th>
			  <th>subject5</th>
			  <th>subject5mark</th>
			  <th>lab1</th>
			  <th>lab2</th>
			  <th>Total</th>
			  <th>Percentage</th>
			   
			  </tr>	
			</thead>
			<tbody>
				    <?php
                        if(isset($user_data))
                          {
                           foreach($user_data->result() as $row)
                            {
                    ?>
			  				<tr>
			  					<td><?php echo $row->assesment;?></td>
			  					<td><?php echo $row->sub1;?></td>
			  					<td><?php echo $row->sub1mark;?></td>
			  					<td><?php echo $row->sub2;?></td>
			  					<td><?php echo $row->sub2mark;?></td>
			  					<td><?php echo $row->sub3;?></td>
			  					<td><?php echo $row->sub3mark;?></td>
			  					<td><?php echo $row->sub4;?></td>
			  					<td><?php echo $row->sub4mark;?></td>
			  					<td><?php echo $row->sub5;?></td>
			  					<td><?php echo $row->sub5mark;?></td>
			  					<td><?php echo $row->lab1;?></td>
			  					<td><?php echo $row->lab2;?></td>
			  					<td><?php echo $row->total;?></td>
			  					<td><?php echo $row->percentage;?></td>
			  				<?php
			  			}
                        		   
			  		}
			  		?>
		
		    </tbody>


				
		   </table>
	</body>	
</html>
			  					
			  	
		