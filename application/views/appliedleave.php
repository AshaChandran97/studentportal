<!DOCTYPE html>
<html>
<head>
	<title>View leave request</title>
	<style>
		table,th,td{
			border:1px solid;
			border-collapse: collapse;
		}
	</style>
</head>
<body> 
  
	<table>
		<thead>
			<tr>
				<td>Admission number</td>
				<td>Name</td>
				<th>Leave type</th>
				<th>From</th>
				<th>To</th>
				<th>Reason</th>
				<th>File</th>
				<th colspan="2">Action</th>
			</tr>
		</thead>

		<tbody>
			<?php
		if($n->num_rows()>0)
		{
			foreach($n->result() as $row)
					{
		?>
						<tr> 
							<td><?php echo $row->ad_no;?>
							<td><?php echo $row->name;?></td>
							<td><?php echo $row->leave_type;?></td>
							<td><?php echo $row->from_date;?></td>
							<td><?php echo $row->to_date?></td>
							<td><?php echo $row->reason?></td>
							<td><?php echo $row->file_upload?></td>
							
			  				<?php
			  						if($row->status==1)
			  						{
			  							?>
			  							<td>Approved</td>
			  							<td><a href="<?php echo base_url()?>main/reject/<?php echo $row->l_id;?>">reject</a></td>
			  							<?php
			  						}
			  						elseif($row->status==2)
			  						{
			  							?>
			  							<td>rejected</td>
			  							<td><a href="<?php echo base_url()?>main/approve/<?php echo $row->l_id;?>">approve</a></td>
			  							<?php
			  						}
			  						else
			  						{
			  							?>

			  					<td><a href="<?php echo base_url()?>main/approve/<?php echo $row->l_id;?>">approve</a></td>
			  					<td><a href="<?php echo base_url()?>main/reject/<?php echo $row->l_id;?>">reject</a></td>
			  				
			  				<?php
			  			}
                        		   }
			  		}
			  		?>
		

			
		</tbody>
	</table>
</body>
</html>