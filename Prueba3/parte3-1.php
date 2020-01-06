<!DOCTYPE html>
<html lang="es">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
			<link crossorigin="anonymous" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" rel="stylesheet">
                </link>
			<link href="prueba1.css" rel="stylesheet" type="text/css">
		</meta>
	</head>
	
	<body>
		</br></br></br>
		<h1 align="center"> Donald T. </h1>
		</br></br></br></br></br>
		
		
		<form action="" method="post" align="center">
			
			<input class="personalizado" placeholder="0" type="number" align="center" min="0" max="9" name="numero1">
			<input class="personalizado" placeholder="0" type="number" align="center" min="0" max="9" name="numero2">
			<input class="personalizado" placeholder="0" type="number" align="center" min="0" max="9" name="numero3">
			<input class="personalizado" placeholder="0" type="number" align="center" min="0" max="9" name="numero4">

	"&nbsp&nbsp"
			
			<button type="submit" class="btn btn-primary mb-2">Comprobar</button>
			
		
			
			
		</form>
				
		<div align="center">
		
		<?php 
		if (isset($_POST["numero1"]))
		{
			if (isset($_POST["numero2"]))
			{
				if (isset($_POST["numero3"]))
				{
					if (isset($_POST["numero4"]))
					{
						if ($_POST["numero1"]==1)
						{
							if ($_POST["numero2"]==9)
							{
								if ($_POST["numero3"]==4)
								{
									if ($_POST["numero4"]==6)
									{
										
										header("Location: /Prueba3/parte3-2.php");
										
									}
								}
							}
						}
					}
				}
			}
		}
		?>
		
		</div>

	</body>
</html>
