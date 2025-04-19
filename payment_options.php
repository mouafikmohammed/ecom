<div class="box">
	<?php
	$session_email=$_SESSION['customer_email'];
	$select_customer="select * from customers where customer_email='$session_email'";
	$run_cust=mysqli_query($con, $select_customer);
	$row_customer=mysqli_fetch_array($run_cust);
	$customer_id=$row_customer['customer_id'];



	  ?>
		


		<div class="rx">
	<center>
		<h1>Pay Online Using below method</h1>
		<p>If you have any questions, please feel free to <a href="../contactus.php">contact us</a>, ourcustmer service center is working for you 24/7.</p>
	</center>
	<hr>
	<div class="table-responsive">
		<table class="table table-border table-hover table-striped">
			<thead>
				<tr class="account">
					<th>Bank Account Number</th>
					<th>Paypal Id</th>
					<th>Wechat</th>
					<th>Alipay</th>
					</tr>
			</thead>
			<tbody>
				<tr class="account">
					<td>CCB : 1111222333444</td>
					<td>mouafik@gmail.com</td>
					<td><img src="images/wechat.jpg" style="width: 95px;" alt="WECHAT"></td>
					<td><img src="images/alipay.jpg" style="width: 95px;" alt="ALIPAY"></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
		<p class="lead-text-center">
			<a style="border: 1px solid black;background:#add8e6; padding: 3px;font-size: 20px;" href="order.php?c_id=<?php echo $customer_id ?>"><span>Click After You Paid</span></a>
		</p>
</div>