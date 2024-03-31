<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta content="text/html; charset=utf-8" />
		<title>Try it</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		<script src="https://kit.fontawesome.com/252e2148d4.js" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="style.css" />
	</head>
	
	<body bgcolor="#ccc">
		
		<script src="code.js"></script>
		<div id="add-contact" style="display: block;">
			<a onclick="addModalFun()">
				<div class="header">
					<i class="fas fa-times"></i> Close
				</div>
			</a>
			<div class="left-side">
				<div class="form">
					<form name="addContact" id="addContact" action="" method="post">
						<div class="personal-info">
							<div class="title">Personal Info</div>
							<div class="name">
								<label for="name">Name</label>
								<input type="text" name="onoma" id="name" placeholder="Name" />
							</div>
							<div class="surname">
								<label for="surname">Surname</label>
								<input type="text" name="surname" id="surname" placeholder="Surname" />
							</div>
							<div class="category">
								<label for="contact-category">Category</label>
								<select name="contact-category" id="contact-category">
									<option value="" disabled selected hidden>Choose category...</option>
									<option value="0">Option 0</option>
								</select>
							</div>
						</div>
						<div class="address-info">
							<div class="title">Address Info</div>
							<div class="address">
								<label for="address">Address</label>
								<input type="text" name="address" id="address" placeholder="Address" />
							</div>
							<div class="city">
								<label for="city">City</label>
								<input type="text" name="city" id="city" placeholder="City" />
							</div>
							<div class="law">
								<label for="law">Law</label>
								<input type="text" name="law" id="law" placeholder="Law" />
							</div>
							<div class="p-code">
								<label for="p-code">P. Code</label>
								<input type="text" name="p-code" id="p-code" placeholder="Postal Code" />
							</div>
							<div class="country">
								<label for="country">Country</label>
								<input type="text" name="country" id="country" placeholder="Country" />
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="right-side">
				<div class="title">Telephones / E-mail</div>
				<div class="add-phone-fields">
					<form name="phone-add" id="phone-add" action="" method="post">
						<div class="phone">
							<label class="label" for="phone">Tel./E-mail</label>
							<input type="tel" name="phone" id="phone" placeholder="Telephone/E-mail" />
						</div>
						<div class="category">
							<label class="label" for="tel-category">Category</label>
							<select name="tel-category" id="tel-category">
								<option value="" disabled selected hidden>Choose category...</option>
								<option value="0">Option 0</option>
							</select>
						</div>
						<div class="default">
							<input type="checkbox" name="default" id="default" />
							<label for="default">Set as default</label>
						</div>
					</form>
				</div>
				<div class="phone-list">
					<div class="buttons">
						<button class="add"><i class="fas fa-plus"></i> Add</button>
						<button class="delete"><i class="fas fa-trash-alt"></i> Delete</button>
						<button class="reset"><i class="fas fa-redo"></i> Reset</button>
					</div>
					<div class="table">
						<div class="header-table">
							<table>
								<tr>
									<th class="th-category">Category</th>
									<th class="th-phone">Phone/E-mail</th>
								</tr>
							</table>
						</div>
						<div class="phones">
							<table>
								<!--AUTOCOMPLETE-->
								<tr>
									<td>
										<label for="mobile" style="width: 100;display: block;cursor: pointer;">
											<input type="checkbox" name="mobile" id="mobile" value="+30 6948694043" />
											Mobile
										</label>
									</td>
									<td style="text-align: center;">
										<label for="mobile" style="width:100%;display: block;cursor: pointer;">
											+30 6948694043
										</label>
									</td>
								</tr>
								<!--AUTOCOMPLETE-->
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="footer">
				<div class="add-categories">
					<div class="add-contact" style="margin-bottom: 4px;">
						<a href="">Add contact category</a>
					</div>
					<div class="add-tel">
						<a href="">Add telephone/E-mail category</a>
					</div>
				</div>
				<div class="buttons">
					<button class="reset"><i class="fas fa-redo"></i> Reset</button>
					<button class="save"><i class="fas fa-save"></i> Save</button>
				</div>
			</div>
		</div>
		
	</body>
</html>