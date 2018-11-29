<!DOCTYPE html>
<html lang="en">
<?php require ('login-modal.php'); ?>
<?php require ('register-modal.php'); ?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Auto-diagnostic & Précommande en ligne avec Medictionnary</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
   <!-- Core Style CSS -->
    <link rel="stylesheet" href="css-diag/styles.css">
  <link href="css/style.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <style type="text/css">
    html,
    body,
    header,
    .view {
      height: 100%;
    }
	
	
	header {
		height: 100px;
	}

    @media (max-width: 740px) {
      html,
      body,
      header,
      .view {
        height: 1050px;
      }
    }

    @media (min-width: 800px) and (max-width: 850px) {
      html,
      body,
      header,
      .view {
        height: 700px;
      }
    }

    @media (min-width: 800px) and (max-width: 850px) {
              .navbar:not(.top-nav-collapse) {
                  background: #1C2331!important;
              }
          }


  </style>
</head>

<body>

  <?php require('header.php'); ?>

  <!--Main layout-->
  <main>
    <div id="autodiagnostic" class="container">

      <!--Section: Main info-->
      <section class="mt-5">

        <!--Grid row-->
        <div class="row justify-content-center text-center">
			<div class="col-12 col-lg-12 ">
					<?php require ('user-menu.php'); ?>
                </div>
          <!--Grid column-->
          <div class="col-md-8  mb-4 ">

            
						 <h2 class="h3 mt-4 mb-3">Modifier allergies</h2>
						 <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
						  <thead>
							<tr>
							  <th class="th-sm">Name
							  </th>
							  <th class="th-sm">Position
							  </th>
							  <th class="th-sm">Office
							  </th>
							  <th class="th-sm">Age
							  </th>
							  <th class="th-sm">Start date
							  </th>
							  <th class="th-sm">Salary
							  </th>
							</tr>
						  </thead>
						  <tbody>
							<tr>
							  <td>Tiger Nixon</td>
							  <td>System Architect</td>
							  <td>Edinburgh</td>
							  <td>61</td>
							  <td>2011/04/25</td>
							  <td>$320,800</td>
							</tr>
							
							<tr>
							  <td>Jenette Caldwell</td>
							  <td>Development Lead</td>
							  <td>New York</td>
							  <td>30</td>
							  <td>2011/09/03</td>
							  <td>$345,000</td>
							</tr>
							<tr>
							  <td>Yuri Berry</td>
							  <td>Chief Marketing Officer (CMO)</td>
							  <td>New York</td>
							  <td>40</td>
							  <td>2009/06/25</td>
							  <td>$675,000</td>
							</tr>
							<tr>
							  <td>Caesar Vance</td>
							  <td>Pre-Sales Support</td>
							  <td>New York</td>
							  <td>21</td>
							  <td>2011/12/12</td>
							  <td>$106,450</td>
							</tr>
							<tr>
							  <td>Shou Itou</td>
							  <td>Regional Marketing</td>
							  <td>Tokyo</td>
							  <td>20</td>
							  <td>2011/08/14</td>
							  <td>$163,000</td>
							</tr>
							<tr>
							  <td>Michelle House</td>
							  <td>Integration Specialist</td>
							  <td>Sidney</td>
							  <td>37</td>
							  <td>2011/06/02</td>
							  <td>$95,400</td>
							</tr>
							<tr>
							  <td>Suki Burks</td>
							  <td>Developer</td>
							  <td>London</td>
							  <td>53</td>
							  <td>2009/10/22</td>
							  <td>$114,500</td>
							</tr>
						
							<tr>
							  <td>Jennifer Acosta</td>
							  <td>Junior Javascript Developer</td>
							  <td>Edinburgh</td>
							  <td>43</td>
							  <td>2013/02/01</td>
							  <td>$75,650</td>
							</tr>
							<tr>
							  <td>Cara Stevens</td>
							  <td>Sales Assistant</td>
							  <td>New York</td>
							  <td>46</td>
							  <td>2011/12/06</td>
							  <td>$145,600</td>
							</tr>
							<tr>
							  <td>Hermione Butler</td>
							  <td>Regional Director</td>
							  <td>London</td>
							  <td>47</td>
							  <td>2011/03/21</td>
							  <td>$356,250</td>
							</tr>
							<tr>
							  <td>Lael Greer</td>
							  <td>Systems Administrator</td>
							  <td>London</td>
							  <td>21</td>
							  <td>2009/02/27</td>
							  <td>$103,500</td>
							</tr>
							<tr>
							  <td>Jonas Alexander</td>
							  <td>Developer</td>
							  <td>San Francisco</td>
							  <td>30</td>
							  <td>2010/07/14</td>
							  <td>$86,500</td>
							</tr>
							<tr>
							  <td>Shad Decker</td>
							  <td>Regional Director</td>
							  <td>Edinburgh</td>
							  <td>51</td>
							  <td>2008/11/13</td>
							  <td>$183,000</td>
							</tr>
							<tr>
							  <td>Michael Bruce</td>
							  <td>Javascript Developer</td>
							  <td>Singapore</td>
							  <td>29</td>
							  <td>2011/06/27</td>
							  <td>$183,000</td>
							</tr>
							<tr>
							  <td>Donna Snider</td>
							  <td>Customer Support</td>
							  <td>New York</td>
							  <td>27</td>
							  <td>2011/01/25</td>
							  <td>$112,000</td>
							</tr>
						  </tbody>
						  <tfoot>
							<tr>
							  <th>Name
							  </th>
							  <th>Position
							  </th>
							  <th>Office
							  </th>
							  <th>Age
							  </th>
							  <th>Start date
							  </th>
							  <th>Salary
							  </th>
							</tr>
						  </tfoot>
						</table>
							
				</div>
				
			
			</div>

          </div>
          <!--Grid column-->

        </div>
        <!--Grid row-->


    </div>
  </main>
  <!--Main layout-->

  <?php require ('footer.php'); ?>
</body>

</html>