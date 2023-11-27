
<?php 
    $page="Secto";
    $eng="Secto";
    require_once("aut/bdconnect.php");
    require_once("aut/session.php");
    require_once("autocomplete.php");
?>

<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="shortcut icon" href="../img/log.png>">

    <title>Admin-Kwata &middot; <?php echo $page; ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <?php
                    include('en_tete.php');
                ?>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <?php
                    include('profil_connect.php');
                ?>
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <?php
                    include('menu.php');
                ?>
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"> Nouveau  <?php echo $page; ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             add <?php echo $eng; ?>
                             <a class="retour" href="liste_secto.php"><i class="fa fa-table"></i>Retour à la liste</a>                            
                        </div>
                        <!-- /.panel-heading -->

                        <div class="panel-body">
                    <div class="form">
                    <div id="resultat"></div>
                        <form class="form-validate form-horizontal " id="register_form" method="post" action="enregistrement.php">
                            <div class="form-group ">
                                <label for="nom" class="control-label col-lg-2">Nom du secto </label>
                                <div class="col-lg-10">
                                    <input class="form-control" name="nom" id="nom" type="text" placeholder="Secto name" />
                                </div>
                            </div>

                                    <div class="form-group ">
                                <label for="kwat" class="control-label col-lg-2">Kwata  <span class="">*</span></label>
                                <div class="col-lg-10">
                                    <input type="text" name="kwat" id="autokwata" class="form-control" required="required">
                                    <input type="hidden" name="arrond" id="idkwata" required="required">
                                </div>
                            </div>
                                      
                                        <?php
                                            if($_SESSION['pass'] != 3)
                                                {
                                          echo '<div class="form-group ">
                                                        <label for="stat" class="control-label col-lg-2">Publié </label>
                                                        <div class="col-lg-10">
                                                            <select class=" form-control" id="stat" name="statut">
                                                                <option value="0">NON</option>
                                                                <option value="1">OUI</option>
                                                            </select>
                                                        </div>
                                                    </div>';
                                                }
                                            else
                                                {
                                                    echo '<input type="hidden" name="statut" value="0"/>';
                                                }
                                        ?>
                                      
                                      <input type="hidden" name="enreg" value="secto"/>
                                      
                                      <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-10">
                                              <button class="btn btn-primary" id="secto" type="submit">Enregistrer </button>
                                              <input class="btn btn-default" type="reset" value="Annuler" />
                                          </div>
                                      </div>
                                  </form>
                              </div>
                          </div>
                      </section>
                  </div>
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>
    <script src="dist/js/jquery-1.10.2.js"></script>
    <script src="dist/js/jquery.isotope.min.js"></script>
    <script src="dist/js/jquery.autocomplete.js"></script>
    <script src="dist/js/main.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>

    var kwata = 
            {
                <?php 
                    for($i = 0; $i < $nb; $i++)
                        {
                            echo '"'.$tabkwata[$i]['iddep'].'": "'.$tabkwata[$i]['Nom'].'",'; 
                            
                        }

                ?>              
            }

    var kwataArray = $.map(kwata, function (value, key) { return { value: value, data: key }; });        
        $('#autokwata').autocomplete({
            lookup: kwataArray,
            minChars: 1,
            onSelect: function (suggestion) {
                    $('#idkwata').val( suggestion.data);
                },
            showNoSuggestionNotice: true,
            noSuggestionNotice: 'Aucun kwata trouvé !!!',
        });

 </script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference --> 
    <script>
        $("button#secto").click(function() 
            { 
                $.ajax({
                type: "POST",
                url: "enregistrement.php",
                data: $('form#register_form').serialize(),
                    success: function(data){
                        if(data!='')
                            {
                                
                                $("#resultat").html('<div class="alert alert-success" style="display: block"><a class="close" data-dismiss="alert">×</a>'+data+'</div>');
                                $("#register_form").get(0).reset();
                            }
                    }
            });         
           return false;
            }); //EOF
    </script>     

</body>

</html>